<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Timezone;
use Illuminate\Support\Facades\Storage;
use App\Models\CountryData;
use App\Models\Student;
use App\Models\Recruiter;
use App\Models\Institution;
use DataTables;
use App\Models\User;
use App\Models\Course;
use App\Models\Country;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use App\Models\UserType;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;



class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        $totalInstitutions = institution::count();
        $totalAgents = Recruiter::count();
        $totalStudents = Student::count();
        $totalCourses = Course::count();
        return view('admin.panel.dashboard', compact('totalInstitutions', 'totalAgents', 'totalStudents', 'totalCourses'));
    }

    public function EditProfile()
    {
        // Get the currently authenticated recruiter
        $admin = auth()->user();
        // dd($admin);


        // print_r($recruiter);
        // die();

        return view('admin.panel.profile.edit_profile', compact('admin'));
    }
    public function UpdateProfile(Request $request)
    {
        // Validate the update data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',

        ]);

        // Get the currently authenticated recruiter
        try {
            $admin = auth()->user();

            $admin->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),

            ]);

            return redirect()->route('admin.edit')->with('success', 'Profile updated successfully!');
        } catch (QueryException $e) {
            // Handle duplicate email error
            $errorCode = $e->errorInfo[1];

            if ($errorCode == 1062) {
                // Error code 1062 corresponds to a duplicate entry violation
                return redirect()->route('admin.edit')->with('error', 'Email already taken. Please choose a different email.');
            }

            // If it's a different database error, you can handle it accordingly
            return redirect()->route('admin.edit')->with('error', 'An error occurred while updating the profile.');
        }
    }
    public function editPassword()
    {
        return view('admin.panel.profile.update_password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = Auth::user();

        if (Hash::check($request->current_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('admin.editPassword')->with('success', 'Password changed successfully.');
        } else {
            return back()->withErrors(['current_password' => 'Incorrect current password.'])->withInput();
        }
    }


    public function countries()
    {
        $CountryData = CountryData::get();
        return view('recruiter.panel.countries.countries', compact('CountryData'));
    }

    public function country_details($id)
    {
        $CountryData = CountryData::find($id);
        $news = $CountryData->news()->get();
        $links = $CountryData->links()->get();
        return view('recruiter.panel.countries.country_details', compact('CountryData', 'news', 'links'));
    }

    public function getstudents(Request $request)
    {
        $students = Student::leftJoin('users', 'students.Lead_parent', '=', 'users.id')
            ->select('students.*', 'users.name as agent_name')
            ->get();

        return response()->json(['data' => $students]);
    }

    public function students()
    {
        return view('admin.panel.student.index');
    }

    public function studentById($student_id)
    {
        $student = Student::join('users', 'students.Lead_parent', '=', 'users.id')
            ->where('students.id', $student_id)
            ->select('students.*', 'users.name as agent_name')
            ->first();
        // $student = Student::find($student_id);
        if (isset($student->intended_destination_1) && !empty($student->intended_destination_1)) {
            $country = Country::find($student->intended_destination_1);
            if (isset($country) && !empty($country)) {
                $student->intended_destination_1 = $country->name;
            }
        }

        if (isset($student->intended_destination_2) && !empty($student->intended_destination_2)) {
            $country = Country::find($student->intended_destination_2);
            if (isset($country) && !empty($country)) {
                $student->intended_destination_2 = $country->name;
            }
        }

        if (isset($student->intended_destination_3) && !empty($student->intended_destination_3)) {
            $country = Country::find($student->intended_destination_3);
            if (isset($country) && !empty($country)) {
                $student->intended_destination_3 = $country->name;
            }
        }
        return view('admin.panel.student.view', compact('student'));
    }

    public function studentEdit($student_id)
    {
        $student = Student::find($student_id);
        return view('admin.panel.student.edit', compact('student'));
    }

    public function studentupdate(Request $request, $student_id)
    {
        $student = Student::where('id', $student_id);

        $data = [
            'first_name' => $request->input('first_name'),
            'date_of_birth' => $request->input('date_of_birth'),
            'gender' => $request->input('gender'),
            'nationality' => $request->input('nationality'),
            'address' => $request->input('address'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'current_school' => $request->input('current_school'),
            'field_of_study' => $request->input('field_of_study'),
        ];

        student::where('id', $student_id)->update($data);

        return redirect()->route('admin.students', ['student_id' => $student_id])->with('success', 'Student updated successfully.');
    }

    public function getinstitutions(Request $request)
    {
        // $institutions = Institution::all();
        // return response()->json(['data' => $institutions]);

        $countryId = $request->input('country_id');
        // Fetch institutions based on the selected country ID
        if ($countryId) {
            $institutions = Institution::where('country', $countryId)->get();
        } else {
            $institutions = Institution::all();
        }

        return response()->json(['data' => $institutions]);
    }

    public function institutions()
    {
        $country = Country::all();
        return view('admin.panel.institution.index', compact('country'));
    }

    public function institutionById($institution_id)
    {
        $institution = Institution::find($institution_id);
        return view('admin.panel.institution.view', compact('institution'));
    }

    public function editInstitutionById($institution_id)
    {
        $institution = Institution::find($institution_id);
        return view('admin.panel.institution.editInstitution', compact('institution'));
    }

    public function updateInstitutionById(Request $request, $institution_id)
    {

        // dd($request->all());

        // Find the institution by ID
        $institution = Institution::findOrFail($institution_id);

        // dd($institution);


        // Update the institution data
        $institution->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'city' => $request->input('city'),
            'address' => $request->input('address'),
            'website' => $request->input('website'),
            'contact_person' => $request->input('contact_person'),
            'contact_email' => $request->input('contact_email'),
            'contact_phone' => $request->input('contact_phone'),
            'institution_type' => $request->input('institution_type'),
            'number_of_students' => $request->input('number_of_students'),
            'year_founded' => $request->input('year_founded'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('admin.institutionView', ['institution_id' => $institution_id])->with('success', 'Institution updated successfully.');
    }

    public function getagents(Request $request)
    {
        $agents = Recruiter::all();
        return response()->json(['data' => $agents]);
    }

    public function agents()
    {
        return view('admin.panel.agent.index');
    }

    public function agentById($agent_id)
    {
        $agent = Recruiter::find($agent_id);
        return view('admin.panel.agent.view', compact('agent'));
    }
    public function agentEdit($agent_id)
    {
        $agent = Recruiter::find($agent_id);
        return view('admin.panel.agent.edit', compact('agent'));
    }

    public function agentUpdate(Request $request, $agent_id)
    {
        // dd($request->all());

        // Find the institution by ID
        $agent = Recruiter::findOrFail($agent_id);

        // dd($institution);


        // Update the institution data
        $agent->update([

            'company_name' => $request->input('company_name'),
            'email' => $request->input('email'),
            'mobile_number' => $request->input('mobile_number'),
            'company_short_name' => $request->input('company_short_name'),
            'client_id' => $request->input('client_id'),
            'your_role' => $request->input('your_role'),
            'country_count' => $request->input('country_count'),
            'employee_count' => $request->input('employee_count'),
            'students_sent_count' => $request->input('students_sent_count'),
            'aimed_students_count' => $request->input('aimed_students_count'),

        ]);

        DB::table('users')
            ->join('recruiters', 'users.id', '=', 'recruiters.user_id')
            ->where('recruiters.id', $agent_id)
            ->update([
                'users.email' => $request->input('email'),

                // Add other fields as needed
            ]);

        return redirect()->route('admin.agentView', ['agent_id' => $agent_id])->with('success', 'Agent updated successfully.');
    }

    public function exportCSV(Request $request)
    {

        $fileName = 'students.csv';
        $Students = Student::leftJoin('users', 'students.Lead_parent', '=', 'users.id')
            ->select('students.*', 'users.name as agent_name')
            ->get();
        foreach ($Students as $student) {
            if (isset($student->intended_destination_1) && !empty($student->intended_destination_1)) {
                $country = Country::find($student->intended_destination_1);
                if (isset($country) && !empty($country)) {
                    $student->intended_destination_1 = $country->name;
                }
            }

            if (isset($student->intended_destination_2) && !empty($student->intended_destination_2)) {
                $country = Country::find($student->intended_destination_2);
                if (isset($country) && !empty($country)) {
                    $student->intended_destination_2 = $country->name;
                }
            }

            if (isset($student->intended_destination_3) && !empty($student->intended_destination_3)) {
                $country = Country::find($student->intended_destination_3);
                if (isset($country) && !empty($country)) {
                    $student->intended_destination_3 = $country->name;
                }
            }
        }

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('SrNo.', 'Name', 'email', 'phone_number', 'Country', 'Agent Name', 'Address', 'nationality');

        $callback = function () use ($Students, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            $counter = 1;
            foreach ($Students as $Student) {
                $row['SrNo'] = $counter;
                $row['first_name']  = $Student->first_name;
                $row['email']  = $Student->email;

                $row['phone_number']    = $Student->phone_number;
                $row['Country']    = $Student->signup_country;
                $row['Agent Name']    = $Student->agent_name;
                $row['nationality']  = $Student->nationality;
                $row['Address']  = $Student->address;

                fputcsv($file, array($row['SrNo'], $row['first_name'], $row['email'],  $row['phone_number'], $row['Country'], $row['Agent Name'], $row['Address'], $row['nationality']));
                $counter++;
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function agentexportCSV(Request $request)
    {

        $fileName = 'agent.csv';
        $Agents = Recruiter::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('SrNo.', 'Company Name', 'Company Short Name', 'Email', 'Mobile', 'Cliet id', 'Role', 'Country Count', 'Student Sent Count');

        $callback = function () use ($Agents, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            $counter = 1;
            foreach ($Agents as $Agent) {
                $row['SrNo'] = $counter;
                $row['Company Name']  = $Agent->company_name;
                $row['Company Short Name']  = $Agent->company_short_name;
                $row['Email']    = $Agent->email;
                $row['Mobile']    = $Agent->mobile_number;
                $row['Cliet id']  = $Agent->client_id;
                $row['Role']  = $Agent->your_role;
                $row['Country Count']  = $Agent->country_count;
                $row['Student Sent Count']  = $Agent->students_sent_count;


                fputcsv($file, array($row['SrNo'], $row['Company Name'], $row['Company Short Name'], $row['Email'], $row['Mobile'], $row['Cliet id'], $row['Role'], $row['Country Count'], $row['Student Sent Count']));
                $counter++;
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }


    public function agentdestroy($agent_id)
    {
        $recruiter = Recruiter::findOrFail($agent_id);
        if (isset($recruiter) && !empty($recruiter)) {
            // $students = Student::where('lead_parent', $agent_id)->get();
            // foreach ($students as $student) {
            //     $studentExist = Student::where('lead_parent', $student->user_id)->get();
            //     foreach ($studentExist as $stud) {
            //         $stud->delete();
            //     }
            //     $student->delete();
            // }
            $user = User::findOrFail($recruiter->user_id);
            $recruiter->delete();
            $user->delete();
        }
        return back()->with('success', 'Agent deleted successfully.');
    }

    public function registration()
    {
        // $Recruiter = new \App\Models\Recruiter();
        return view('admin.panel.addagent.registration');
    }

    public function registrationStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'mobile_number' => 'required|string|max:15',
            'company_name' => 'required|string|max:255',
            'company_short_name' => 'required|string|max:50',
            'client_id' => 'required|string|max:50',
            'your_role' => 'required|string|max:255',
            'country_count' => 'required|numeric',
            'employee_count' => 'required|string',
            'students_destination_count' => 'required|numeric',
            'students_next_year_count' => 'required|string'
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // Pass the validator with errors
                ->withInput(); // Pass the old input data
        }
        $password= $this->generatePassword();;
        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password =$password;
        // Add other user-specific fields as needed

        // Save the user
        $user->save();

        $user->userType()->associate(UserType::where('name', 'Agent')->first());
        $user->save();

        Mail::to($request['email'])->send(new TestMail($request['name'], $request['email'], $password));

        $Recruiter = new Recruiter();
        $Recruiter->user_id = $user->id;
        $Recruiter->company_name = $request['company_name'];
        $Recruiter->company_short_name = $request['company_short_name'];
        $Recruiter->client_id = $request['client_id'];
        $Recruiter->your_role = $request['your_role'];
        // Add other recruiter-specific fields as needed

        $Recruiter->country_count = $request['country_count'];
        $Recruiter->employee_count = $request['employee_count'];
        $Recruiter->students_sent_count = $request['students_destination_count'];
        $Recruiter->aimed_students_count = $request['students_next_year_count'];

        $Recruiter->email = $request['email'];
        $Recruiter->mobile_number = $request['mobile_number'];
        // Save the recruiter profile
        $Recruiter->save();
        return redirect()->route('admin.agents')->with('success', 'Recruiter added successfully.');
    }
    
    function generatePassword($length = 12) {
        // Define character sets
        $lowercase = 'abcdefghijklmnopqrstuvwxyz';
        $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';
        $specialChars = '!@#$%^&*()-_+=<>?';
    
        // Concatenate all character sets
        $allChars = $lowercase . $uppercase . $numbers . $specialChars;
    
        // Get the total length of all characters
        $charsLength = strlen($allChars);
    
        // Initialize the password variable
        $password = '';
    
        // Generate random password using the character set
        for ($i = 0; $i < $length; $i++) {
            // Get a random index to retrieve a character from the set
            $randomIndex = rand(0, $charsLength - 1);
    
            // Append the randomly selected character to the password
            $password .= $allChars[$randomIndex];
        }
    
        return $password;
    }
    public function addinstitution()
    {
        return view('admin.panel.addinstitution.institutionregistration');
    }

    public function institutionstore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:institutions,email|unique:users,email',
            'phone_number' => 'required|string|max:15',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'website' => 'nullable|string|url',
            'contact_person' => 'required|string|max:255',
            'contact_email' => 'required|email',
            'contact_phone' => 'required|string|max:15',
            'institution_type' => 'required|string|max:255',
            'accreditation_status' => 'required|boolean',
            'number_of_students' => 'required|integer',
            'year_founded' => 'required|integer',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // Pass the validator with errors
                ->withInput(); // Pass the old input data
        }

        $imageName = '';
        if (isset($request->logo) && !empty($request->logo)) {
            
            $image = $request->file('logo');
            $imageName = time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('institute_img'), $imageName);
        }
        

        // Store data in session
        $institutionData = [
            'logo' => $imageName,
            'description' => $request->input('description'),
        ];

        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        // Add other user-specific fields as needed

        // Save the user
        $user->save();

        $user->userType()->associate(UserType::where('name', 'Institution')->first());
        $user->save();

        Mail::to($request['email'])->send(new TestMail($request['name']));

        $institution = new Institution();
        $institution->user_id = $user->id;
        $institution->name = $request['name'];
        $institution->email = $request['email'];
        $institution->password = bcrypt($request['password']);
        $institution->phone_number = $request['phone_number'];
        // $institution->country = $step1Data['country'];
        $institution->country = '-';
        $institution->city = $request['city'];
        $institution->address = $request['address'];
        $institution->website = $request['website'];
        $institution->contact_person = $request['contact_person'];
        $institution->contact_email = $request['contact_email'];
        $institution->contact_phone = $request['contact_phone'];
        $institution->institution_type = $request['institution_type'];
        $institution->accreditation_status = $request['accreditation_status'];
        $institution->number_of_students = $request['number_of_students'];
        $institution->year_founded = $request['year_founded'];
        if(isset($request['logo']) && !empty($request['logo'])){
            $institution->logo = $request['logo'];
        }else{
            $institution->logo = null;
        } 
        
        if(isset($request['description']) && !empty($request['description'])){
            $institution->description = $request['description'];
        }else{
            $institution->description = null;
        }

        // Save the institution profile
        $institution->save();

        return redirect()->route('admin.institutions')->with('success', 'Institution added successfully.'); 
    }
}
