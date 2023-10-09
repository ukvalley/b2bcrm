<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Recruiter;
use App\Models\User; // Import the Recruiter model
use App\Models\UserType; 

class RecruiterRegistrationController extends Controller
{
    public function step1()
    {
        $Recruiter = new \App\Models\Recruiter();
        return view('auth.recruiter.step1');
    }

    public function step2(Request $request)
    {
        if ($request->isMethod('get')) {
        return view('auth.recruiter.step2');
    }

        // Validate the data for step 2
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'mobile_number' => 'required|string|max:15',
            'password' => 'required|min:8',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // Pass the validator with errors
                ->withInput(); // Pass the old input data
        }

        // Store data in session
        $request->session()->put('step1_data', $request->all());

        return view('auth.recruiter.step2');
    }

    public function step3(Request $request)
    {

        if ($request->isMethod('get')) {
        return view('auth.recruiter.step3');
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

        return view('auth.recruiter.step3');
    }

    public function step4(Request $request)
{
    // Handle GET request to display the form
    if ($request->isMethod('get')) {
        return view('auth.recruiter.step4');
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
    return view('auth.recruiter.step4');
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
        // Save the recruiter profile
        $Recruiter->save();

        // Additional logic and registration process using the collected data

        // Clear session data
        $request->session()->forget(['step1_data', 'step2_data', 'step3_data', 'step4_data']);

        auth()->login($user);
        return redirect()->route('home');



        // Implement logic for step 5 form submission
        // Capture additional information and perform any required actions

        // Redirect to the next step (step 5) or complete the registration process
      //  return view('auth.recruiter.step5');
    }
}
