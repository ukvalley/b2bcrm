<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student; // Make sure to import the Student model
use App\Models\User;
use App\Models\UserType;

class StudentController extends Controller
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

    public function StudentBasic()
    {
        return view('recruiter.panel.student.student_basic_profile');
    }



    public function StudentBasicRegistration(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'nationality' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email',
        ]);

        // Create a new user or institution profile in your database
    $user = new User();
    $user->name =  $validatedData['full_name'];
    $user->email = $validatedData['email'];
    $user->password = bcrypt($validatedData['email']);
    // Add other user-specific fields as needed

    // Save the user
    $user->save();

    $user->userType()->associate(UserType::where('name', 'Student')->first());
    $user->save();

        // Create a new student profile and save the data
        $student = new Student();
        $student->first_name = $validatedData['full_name'];
        $student->user_id = $user->id;
        $student->date_of_birth = $validatedData['date_of_birth'];
        $student->gender = $validatedData['gender'];
        $student->nationality = $validatedData['nationality'];
        $student->address = $validatedData['address'];
        $student->phone_number = $validatedData['phone_number'];
        $student->email = $validatedData['email'];
        $student->username = $validatedData['email'];
        
        // You can add more fields and data saving logic as needed

        // Save the student profile
        $student->save();

        // Redirect to the next step of the registration process
        return redirect()->back();
    }

    // ...

    public function StudentAcademic()
    {
        return view('recruiter.panel.student.student_academic');
    }


}
