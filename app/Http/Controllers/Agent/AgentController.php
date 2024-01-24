<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Timezone;
use Illuminate\Support\Facades\Storage;
use App\Models\CountryData;
use App\Models\ApplicationForm;
use App\Models\DocumentsUpload;
use App\Models\Documents;
use App\Models\Shortlist;
use App\Models\Note;
use App\Models\Task;
use App\Models\Timeline;
use App\Models\Course;
use App\Models\Institution;
use App\Models\ApplicationPersonal;
use Illuminate\Support\Facades\Artisan;
use App\Models\News;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;






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
     * Show t    application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */




    public function index()
    {
        // return view('home');
        $totalInstitutions = institution::count();
        $id = Auth::id();
        $totalStudents = Student::where('Lead_parent', $id)->count();
        // $totalStudents = Student::count();
        $totalCourses = Course::count();

        $institutions = Institution::latest('created_at')->take(6)->get();

        $institutions_prime = Institution::where('premium', '=', 1)->inRandomOrder()->take(6)->get();

        $news = News::latest('created_at')->take(6)->get();
        $youtube = CountryData::where('youtube_link', '<>', null)->latest('created_at')->take(6)->get();

        $application_submitted = ApplicationForm::distinct('student_id')->count();
        $lodge_institution = Student::where('lodge_institution', '<>', 'completed')->count();

        $offer_received = Student::where('offer_received', '=', 'completed')->count();

        $visa_granted = Student::where('visa_granted', '=', 'completed')->count();

        $student_commenced = Student::where('student_commenced', '=', 'completed')->count();


        $application_not_submitted = ApplicationPersonal::where('id', '<>', 'id')->count();

        $lodge_not_institution = Student::where('lodge_institution', '<>', 'pending')->count();

        $offer_not_recieved = Student::where('offer_received', '=', 'pending')->count();

        $visa_not_granted = Student::where('visa_granted', '=', 'pending')->count();


        $student_not_commenced = Student::where('student_commenced', '=', 'pending')->count();

        $studentCount = Student::count();

        $insights['total_student'] = $studentCount;
        $insights['application_submitted'] = $application_submitted;

        $insights['application_not_submitted'] = $studentCount - $application_submitted;

        $insights['lodge_institution'] = $lodge_institution;
        $insights['offer_received'] = $offer_received;
        $insights['visa_granted'] = $visa_granted;
        $insights['student_commenced'] = $student_commenced;

        //  $insights['application_not_submitted'] = $application_not_submitted;
        $insights['lodge_not_institution'] = $lodge_not_institution;
        $insights['offer_not_received'] = $offer_not_recieved;
        $insights['visa_not_granted'] = $visa_not_granted;
        $insights['student_not_commenced'] = $student_not_commenced;


        return view('recruiter.panel.dashboard', compact('institutions', 'insights', 'institutions_prime', 'totalInstitutions', 'totalStudents', 'totalCourses'));
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
            'email' => 'required',
            'client_id' => 'required|string|max:255',
            'your_role' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate avatar upload
            'timezone' => 'required|string|exists:timezones,timezone', // Validate timezone exists in the timezones table
        ]);



        $user = auth()->user();
        $recruiter = auth()->user()->recruiter;

        if ($request->input('email') !== $user->email && User::where('email', $request->input('email'))->exists()) {
            return redirect()->route('agent.edit')->withErrors(['email' => 'The entered email is already in use. Please choose a different one.']);
        }

        // Update email in the users table

        $user->update([
            'email' => $request->input('email'),
        ]);


        // Get the currently authenticated recruiter


        $recruiter->update([
            'email' => $request->input('email'),
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
            'password_confirmation' => 'required',
        ]);

        $user = Auth::user();

        if (Hash::check($request->current_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);

            if ($user->recruiter) {
                $user->recruiter->update([
                    'password' => Hash::make($request->password),
                ]);
            }

            return redirect()->route('agent.editPassword')->with('success', 'Password changed successfully.');
        } else {
            return back()->withErrors(['error' => 'Incorrect current password.'])->withInput();
        }
    }



    public function countries()
    {
        $CountryData = CountryData::get();
        return view('recruiter.panel.countries.countries', compact('CountryData'));
    }

    public function country_details($id)
    {
        $countryData = CountryData::find($id);
        $news = $countryData->news()->get();
        $links = $countryData->links()->get();
        return view('recruiter.panel.countries.country_details', compact('countryData', 'news', 'links'));
    }


    public function course_all()
    {

        return view('recruiter.panel.courseSearch.course_all');
    }
}
