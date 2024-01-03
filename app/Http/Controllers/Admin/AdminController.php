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
        $totalAgents = User::where('user_type_id', 2)->count();
        $totalStudents = Student::count();
        $totalCourses = Course::count();
        return view('admin.panel.dashboard', compact('totalInstitutions', 'totalAgents', 'totalStudents', 'totalCourses'));
    }

    public function EditProfile()
    {
        // Get the currently authenticated recruiter
        $recruiter = auth()->user()->recruiter;
        $timezones = TimeZone::get();

        // print_r($recruiter);
        // die();

        return view('recruiter.panel.profile.edit_profile', compact('recruiter', 'timezones'));
    }
    public function UpdateProfile(Request $request)
    {
        // Validate the update data
        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_short_name' => 'required|string|max:255',
            'client_id' => 'required|string|max:255',
            'your_role' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate avatar upload
            'timezone' => 'required|string|exists:timezones,timezone', // Validate timezone exists in the timezones table
        ]);




        // Get the currently authenticated recruiter

        $recruiter = auth()->user()->recruiter;

        $recruiter->update([
            'company_name' => $request->input('company_name'),
            'company_short_name' => $request->input('company_short_name'),
            'client_id' => $request->input('client_id'),
            'your_role' => $request->input('your_role'),
            'timezone' => $request->input('timezone'), // Assign the selected timezone
        ]);

        if ($request->hasFile('avatar')) {
            // Delete the old avatar if it exists
            if ($recruiter->avatar) {
                Storage::disk('public')->delete($recruiter->avatar);
            }



            $file = $request->file('avatar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/avtar'), $fileName); // Store in the root folder







            $recruiter->update(['avatar' => $fileName]);
        }



        return redirect()->route('agent.edit')->with('success', 'Profile updated successfully!');
    }


    public function editPassword()
    {
        return view('recruiter.panel.profile.update_password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (Hash::check($request->current_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('user.editPassword')->with('success', 'Password changed successfully.');
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
        $students = Student::all();
        return response()->json(['data' => $students]);
    }

    public function students()
    {
        return view('admin.panel.student.index');
    }

    public function studentById($student_id)
    {
        $student = Student::find($student_id);
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
        $country=Country::all();
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
            'company_short_name' => $request->input('company_short_name'),
            'client_id' => $request->input('client_id'),
            'your_role' => $request->input('your_role'),
            'country_count' => $request->input('country_count'),
            'employee_count' => $request->input('employee_count'),
            'students_sent_count' => $request->input('students_sent_count'),
            'aimed_students_count' => $request->input('aimed_students_count'),

        ]);

        return redirect()->route('admin.agentView', ['agent_id' => $agent_id])->with('success', 'Agent updated successfully.');
    }

    public function exportCSV(Request $request)
    {
        
        $fileName = 'students.csv';
        $Students = Student::all();

                $headers = array(
                    "Content-type"        => "text/csv",
                    "Content-Disposition" => "attachment; filename=$fileName",
                    "Pragma"              => "no-cache",
                    "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                    "Expires"             => "0"
                );

                $columns = array('SrNo.','Name','email', 'date_of_birth', 'Address' ,'phone_number','nationality');

                $callback = function() use($Students, $columns) {
                    $file = fopen('php://output', 'w');
                    fputcsv($file, $columns);
                    $counter=1;
                    foreach ($Students as $Student) {
                        $row['SrNo'] = $counter;
                        $row['first_name']  = $Student->first_name;
                        $row['email']  = $Student->email;
                        $row['date_of_birth']    = $Student->date_of_birth;
                        $row['address']    = $Student->address;
                        $row['nationality']  = $Student->nationality;
                        $row['phone_number']  = $Student->phone_number;

                        fputcsv($file, array($row['SrNo'], $row['first_name'],$row['email'], $row['date_of_birth'], $row['address'],$row['phone_number'],$row['nationality']));
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

                $columns = array('SrNo.','Company Name','Company Short Name', 'Email', 'Mobile' ,'Cliet id','Role','Country Count','Student Sent Count');

                $callback = function() use($Agents, $columns) {
                    $file = fopen('php://output', 'w');
                    fputcsv($file, $columns);
                    $counter=1;
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
                       

                        fputcsv($file, array($row['SrNo'], $row['Company Name'],$row['Company Short Name'], $row['Email'], $row['Mobile'],$row['Cliet id'],$row['Role'],$row['Country Count'],$row['Student Sent Count']));
                        $counter++;
                    }

                    fclose($file);
                };

            return response()->stream($callback, 200, $headers);
        }
}
