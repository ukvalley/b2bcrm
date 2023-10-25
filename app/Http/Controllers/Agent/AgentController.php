<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Timezone;
use Illuminate\Support\Facades\Storage;
use App\Models\CountryData;

use App\Models\Institution;
use Illuminate\Support\Facades\Artisan;
use App\Models\News;
use App\Models\Student;





class AgentController extends Controller
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

       $institutions = Institution::latest('created_at')->take(6)->get();
       $news = News::latest('created_at')->take(6)->get();
       $youtube = CountryData::where('youtube_link','<>',null)->latest('created_at')->take(6)->get();

       $application_submitted = Student::where('application_submitted','=','completed')->count();

       $lodge_institution = Student::where('lodge_institution','<>','completed')->count();

       $offer_received = Student::where('offer_received','=','completed')->count();

       $visa_granted = Student::where('visa_granted','=','completed')->count();

        $student_commenced = Student::where('student_commenced','=','completed')->count();


       $application_not_submitted = Student::where('application_submitted','=','pending')->count();

       $lodge_not_institution = Student::where('lodge_institution','<>','pending')->count();

       $offer_not_recieved = Student::where('offer_received','=','pending')->count();

       $visa_not_granted = Student::where('visa_granted','=','pending')->count();


       $student_not_commenced = Student::where('student_commenced','=','pending')->count();

       $insights['application_submitted'] = $application_submitted;
       $insights['lodge_institution'] = $lodge_institution;
       $insights['offer_received'] = $offer_received;
       $insights['visa_granted'] = $visa_granted;
       $insights['student_commenced'] = $student_commenced;

       $insights['application_not_submitted'] = $application_not_submitted;
       $insights['lodge_not_institution'] = $lodge_not_institution;
       $insights['offer_not_received'] = $offer_not_recieved;
       $insights['visa_not_granted'] = $visa_not_granted;
       $insights['student_not_commenced'] = $student_not_commenced;



        return view('recruiter.panel.dashboard', compact('institutions','insights'));

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
        $countryData = CountryData::find($id);
        $news = $countryData->news()->get();
        $links = $countryData->links()->get();
        return view('recruiter.panel.countries.country_details',compact('countryData','news','links'));

    }


    

}
