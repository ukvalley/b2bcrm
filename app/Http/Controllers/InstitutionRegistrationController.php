<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Institution;
use App\Models\User; // Import the Recruiter model
use App\Models\UserType; 
use App\Models\Country; 
use App\Models\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Mail\AdminMail;
use Illuminate\Support\Facades\Auth;

class InstitutionRegistrationController extends Controller
{
    //
    public function step1()
    {
        $country = Country::get();
        return view('institution.auth.step1',compact('country'));
    }

    public function step2(Request $request)
    { 
        if ($request->isMethod('get')) { 
            return view('institution.auth.step2');
        }
        
        // Validate the data for step 2
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:institutions,email|unique:users,email',
            'password' => 'required|min:8',
            'phone_number' => 'required|string|max:15',
           // 'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);
        
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // Pass the validator with errors
                ->withInput(); // Pass the old input data
        }
        // Store data in session
        $request->session()->put('institution_step1_data', $request->all());
        
        return view('institution.auth.step2');
    }

    public function step3(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('institution.auth.step4');
        }

        // Validate the data for step 3
        $validator = Validator::make($request->all(), [
            'website' => 'nullable|string|url',
            'contact_person' => 'required|string|max:255',
            'contact_email' => 'required|email',
            'contact_phone' => 'required|string|max:15',
            'institution_type' => 'required|string|max:255',
            'accreditation_status' => 'required|boolean',
            'number_of_students' => 'required|integer',
            'year_founded' => 'required|integer',
            // Add other validation rules as needed
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // Pass the validator with errors
                ->withInput(); // Pass the old input data
        }

        // Store data in session
        $request->session()->put('institution_step2_data', $request->all());

        return view('institution.auth.step3');
    }

    public function step4(Request $request)
{
    if ($request->isMethod('get')) {
        return view('institution.auth.step4');
    }

    // Validate the data for step 4
    $validator = Validator::make($request->all(), [
        'description' => 'nullable|string',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate logo upload
    ]);

    // Check if validation fails
    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator) // Pass the validator with errors
            ->withInput(); // Pass the old input data
    }

    // Check if logo is uploaded
    // if ($request->hasFile('logo')) {
    //     $uploadedFile = $request->file('logo');
    //     // Store the file in a unique directory
    //     $filePath = $uploadedFile->store('uploads', 'public'); 
    // } else {
    //     $filePath = null; // If logo is not uploaded, set filePath to null or handle accordingly
    // }

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

    $request->session()->put('institution_step4_data', $institutionData);

    return view('institution.auth.step4');
}

public function step5(Request $request)
{
    if ($request->isMethod('get')) {
        return view('institution.auth.step5');
    }

    // Validate the data for step 5
    $validator = Validator::make($request->all(), [
        'accept_terms' => 'accepted', // Ensures the checkbox is checked
        'authorized_signup' => 'accepted', // Ensures the checkbox is checked
    ]);

    // Check if validation fails
    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator) // Pass the validator with errors
            ->withInput(); // Pass the old input data
    }



    $step1Data = $request->session()->get('institution_step1_data');
    $step2Data = $request->session()->get('institution_step2_data');
    $step3Data = $request->session()->get('institution_step4_data');
    $step4Data = $request->all(); // Data from step 4


    // Create a new user or institution profile in your database
    $user = new User();
    $user->name = $step1Data['name'];
    $user->email = $step1Data['email'];
    $user->password = bcrypt($step1Data['password']);
    // Add other user-specific fields as needed

    // Save the user
    $user->save();

    $user->userType()->associate(UserType::where('name', 'Institution')->first());
    $user->save();

    // Create an institution profile associated with the user
    $institution = new Institution();
    $institution->user_id = $user->id;
    $institution->name = $step1Data['name'];
    $institution->email = $step1Data['email'];
    $institution->password = bcrypt($step1Data['password']);
    $institution->phone_number = $step1Data['phone_number'];
    // $institution->country = $step1Data['country'];
    $institution->country = '-';
    $institution->city = $step1Data['city'];
    $institution->address = $step1Data['address'];
    $institution->website = $step2Data['website'];
    $institution->contact_person = $step2Data['contact_person'];
    $institution->contact_email = $step2Data['contact_email'];
    $institution->contact_phone = $step2Data['contact_phone'];
    $institution->institution_type = $step2Data['institution_type'];
    $institution->accreditation_status = $step2Data['accreditation_status'];
    $institution->number_of_students = $step2Data['number_of_students'];
    $institution->year_founded = $step2Data['year_founded'];
    if(isset($step3Data['logo']) && !empty($step3Data['logo'])){
        $institution->logo = $step3Data['logo'];
    }else{
        $institution->logo = null;
    } 
    
    if(isset($step3Data['description']) && !empty($step3Data['description'])){
        $institution->description = $step3Data['description'];
    }else{
        $institution->description = null;
    }
    $institution->accept_terms = $request->has('accept_terms') ? 1 : 0;
    $institution->authorized_signup = $request->has('authorized_signup') ? 1 : 0;

    // Save the institution profile
    $institution->save();

        $adminUsers = User::whereHas('userType', function ($query) {
            $query->where('name', 'Admin');
        })->get();
        
        $name = $step1Data['name'];
        $usertype = 'Institution';
        $toEmail= $step1Data['email'];
        $mobile_number = $step1Data['mobile_number'];
        // dd($toEmail);
        Mail::to($toEmail)->send(new TestMail($name));

        foreach ($adminUsers as $adminUser) {
            Mail::to($adminUser->email)->send(new AdminMail($name,$usertype,$toEmail,$mobile_number));
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
    
    // Create a new user and institution profile in your database
    // Similar to what you did in step 5 of the agent registration controller

    // Clear session data
    $request->session()->forget([
        'institution_step1_data',
        'institution_step2_data',
        'institution_step3_data',
    ]);

    // Redirect to the next step or complete the registration process
    auth()->login($user);
        return redirect()->route('institution.home');
}
}
