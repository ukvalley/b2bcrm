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
        return view('admin.panel.dashboard');
    }

    public function EditProfile()
    {
         // Get the currently authenticated recruiter
        $recruiter = auth()->user()->recruiter;
        $timezones = TimeZone::get();

       // print_r($recruiter);
       // die();

        return view('recruiter.panel.profile.edit_profile', compact('recruiter','timezones'));

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
        return view('recruiter.panel.countries.countries',compact('CountryData'));

    }

    public function country_details($id)
    {
        $CountryData = CountryData::find($id);
        $news = $CountryData->news()->get();
        $links = $CountryData->links()->get();
        return view('recruiter.panel.countries.country_details',compact('CountryData','news','links'));

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
        return view('admin.panel.student.view',compact('student'));
    }

    public function getinstitutions(Request $request)
    {
        $institutions = Institution::all();
        return response()->json(['data' => $institutions]);
    }

    public function institutions()
    {
        return view('admin.panel.institution.index');
    }

    public function institutionById($institution_id)
    {
        $institution = Institution::find($institution_id);
        return view('admin.panel.institution.view',compact('institution'));
    }

    public function editInstitutionById($institution_id)
    {
        $institution = Institution::find($institution_id);
        return view('admin.panel.institution.editInstitution',compact('institution'));
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
        return view('admin.panel.agent.view',compact('agent'));
    }
    public function agentEdit($agent_id)
    {
        $agent = Recruiter::find($agent_id);
        return view('admin.panel.agent.edit',compact('agent'));
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



    

}
