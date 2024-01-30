<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Recruiter;
use App\Models\User; // Import the Recruiter model
use App\Models\UserType;

use App\Models\Country;
use App\Models\Institution;
use App\Models\Course;
use App\Models\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Mail\AdminMail;
use DB;
use Illuminate\Support\Facades\Auth;


class RecruiterRegistrationController extends Controller
{
    public function step1()
    {
        $Recruiter = new \App\Models\Recruiter();
        return view('recruiter.auth.step1');
    }

    public function step2(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('recruiter.auth.step2');
        }

        // Validate the data for step 2
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'mobile_number' => 'required|string|max:15',
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:password',
        ], [
            'confirm_password.same' => 'The password confirmation does not match.',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // Pass the validator with errors
                ->withInput(); // Pass the old input data
        }

        // Store data in session
        $request->session()->put('step1_data', $request->all());

        return view('recruiter.auth.step2');
    }

    public function step3(Request $request)
    {

        if ($request->isMethod('get')) {
            return view('recruiter.auth.step3');
        }


        // Validate the data for step 3
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string|max:255',
            'company_short_name' => 'required|string|max:50',
            'client_id' => 'required|string|max:50',
            'your_role' => 'required|string|max:255',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // Pass the validator with errors
                ->withInput(); // Pass the old input data
        }

        // Store the data in the session
        $request->session()->put('step2_data', $request->all());

        return view('recruiter.auth.step3');
    }

    public function step4(Request $request)
    {
        // Handle GET request to display the form
        if ($request->isMethod('get')) {
            return view('recruiter.auth.step4');
        }

        // Handle POST request for form submission and validation
        $data = $request->validate([
            'country_count' => 'required|numeric',
            'employee_count' => 'required|string',
            'students_destination_count' => 'required|numeric',
            'students_next_year_count' => 'required|string',
            // Add validation rules for other fields in step 3
        ]);

        // Store the data in the session or perform any other necessary actions
        $request->session()->put('step3_data', $data);

        // Redirect to the next step (step 4) or complete the registration process
        return view('recruiter.auth.step4');
    }


    public function step5(Request $request)
    {

        $request->validate([
            'accept_terms' => 'accepted', // Ensures the checkbox is checked
            'authorized_signup' => 'accepted', // Ensures the checkbox is checked
        ]);


        $step1Data = $request->session()->get('step1_data');
        $step2Data = $request->session()->get('step2_data');
        $step3Data = $request->session()->get('step3_data');
        $step4Data = $request->session()->get('step4_data');

        // Create a new user or recruiter profile in your database
        $user = new User();
        $user->name = $step1Data['name'];
        $user->email = $step1Data['email'];
        $user->password = bcrypt($step1Data['password']);
        // Add other user-specific fields as needed

        // Save the user
        $user->save();

        $user->userType()->associate(UserType::where('name', 'Agent')->first());
        $user->save();

        // Create a recruiter profile associated with the user
        $Recruiter = new Recruiter();
        $Recruiter->user_id = $user->id;
        $Recruiter->company_name = $step2Data['company_name'];
        $Recruiter->company_short_name = $step2Data['company_short_name'];
        $Recruiter->client_id = $step2Data['client_id'];
        $Recruiter->your_role = $step2Data['your_role'];
        // Add other recruiter-specific fields as needed

        $Recruiter->country_count = $step3Data['country_count'];
        $Recruiter->employee_count = $step3Data['employee_count'];
        $Recruiter->students_sent_count = $step3Data['students_destination_count'];
        $Recruiter->aimed_students_count = $step3Data['students_next_year_count'];

        $Recruiter->email = $step1Data['email'];
        $Recruiter->mobile_number = $step1Data['mobile_number'];
        // Save the recruiter profile
        $Recruiter->save();

        $adminUsers = User::whereHas('userType', function ($query) {
            $query->where('name', 'Admin');
        })->get();
        $name = $step1Data['name'];
        $usertype = 'Agent';
        $toEmail= $step1Data['email'];
        $mobile_number = $step1Data['mobile_number'];
        // dd($toEmail);
        Mail::to($toEmail)->send(new TestMail($name));

        foreach ($adminUsers as $adminUser) {
            $email = 'dhavalpatel2193@gmail.com';
            Mail::to($email)->send(new AdminMail($name,$usertype,$toEmail,$mobile_number));
            // Mail::to($adminUser->email)->send(new AdminMail($name,$usertype,$toEmail,$mobile_number));
        }

        if ($adminUsers->count() > 0) {
            foreach ($adminUsers as $adminUser) {
                $notification = new Notification();
                $notification->key = '-';
                $notification->message = 'New agent or institution registered.';
                $notification->user_id = $adminUser->id; // Replace with the actual admin user ID
                $notification->isread = false;
                $notification->save();
            }
        }
        
        // Additional logic and registration process using the collected data

        // Clear session data
        $request->session()->forget(['step1_data', 'step2_data', 'step3_data', 'step4_data']);

        auth()->login($user);
        return redirect()->route('agent.home');



        // Implement logic for step 5 form submission
        // Capture additional information and perform any required actions

        // Redirect to the next step (step 5) or complete the registration process
        //  return view('recruiter.auth.step5');
    }


    public function easyAddInstitute()
    {
        $country = Country::get();
        return view('institution.easyAddInstitute', compact('country'));
    }

    public function easyAddInstitutePost(Request $request)
    {
        // Validate the data for step 2
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'email|unique:users',
            'mobile_number' => 'string|max:15',
            'country' => 'required',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // Pass the validator with errors
                ->withInput(); // Pass the old input data
        }

        DB::beginTransaction(); // Start a database transaction


        $institution = Institution::firstOrNew(['name' => $request->input('name')]);


        if (!$institution->exists) {
            // Create a new user and institution only if it doesn't exist
            $user = new User();
            $user->name = $request->input('name');
            // Add other user-specific fields as needed

            $user->email = $request->input('email'); // You can define this function
            $user->password = bcrypt($user->email);

            $user->save();
            $user->userType()->associate(UserType::where('name', 'Institution')->first());
            $user->save();

            $institution->user_id = $user->id;
            $institution->name = $request->input('name');
            $institution->email = $user->email; // Set the email from the user
            $institution->phone_number = $request->input('phone_number');
            $institution->password = $user->password;

            $institution->logo = null;



            $country = Country::find($request->input('country'));

            // if (!$country->exists) {
            //     $country->code = $validatedData['_source']['institution_country'];
            //     $country->save();
            // }


            $institution->country = $country->id;
            //$institution->city = '[]';
            $institution->premium = 1;

            $institution->save();
        }


        $course = new Course();
        $course->country = $institution->country;
        $course->institution_id = $institution->id;
        $course->name = $request->input('name');
        $course->tuition_fee = 0;
        $course->application_fees = 0;
        $course->duration = 0;
        $course->duration_type = null;
        $course->summary = $request->input('name');
        $course->currency = null;
        $course->fees_type = null;
        $course->attendance_pattern = null;
        $course->attendance_pattern = null;
        $course->level = null;
        $course->institution_type = null;

        $course->save();



        // return 'Test email sent successfully!';

        DB::commit(); // Commit the transaction



    }
}
