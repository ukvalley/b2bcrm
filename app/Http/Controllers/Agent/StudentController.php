<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student; // Make sure to import the Student model
use App\Models\User;
use App\Models\UserType;
use App\Models\EducationType;
use App\Models\StudyType;
use App\Models\Country;



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
            'email' => 'required|email|unique:users'
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
        return redirect()->route('agent.student_academic', ['student_id' => $student->id]);
    }

    // ...

    public function StudentAcademic($student_id)
    {
        
        $student = Student::findOrFail($student_id);
        $educationTypes = EducationType::get();
        return view('recruiter.panel.student.student_academic',compact('student','educationTypes'));
    }

    public function StudentAcademicRegistration(Request $request)
    {

        $validatedData = $request->validate([
        'current_school' => 'nullable|string|max:255',
        'field_of_study' => 'nullable|string|max:255',
        'expected_graduation_year' => 'nullable|integer|min:1900|max:' . (date('Y') + 10),
        'academic_interests' => 'nullable|string|max:65535',
        'gpa' => 'nullable|string|max:65535',
        'languages_spoken' => 'nullable|string|max:65535',
        'language_proficiency_levels' => 'nullable|string|max:65535',
        'test_scores' => 'nullable|string|max:65535',
        'test_dates' => 'nullable|string|max:65535',
        ]);

        

        $Student =Student::find($request->input('id'));

        $Student->current_school = $request->current_school;
        $Student->field_of_study = $request->field_of_study;
        $Student->expected_graduation_year = intval($request->input('expected_graduation_year'));
        $Student->gpa = $request->gpa;
        $Student->languages_spoken = $request->languages_spoken;
        $Student->language_proficiency_levels = $request->language_proficiency_levels;
        $Student->test_scores = $request->test_scores;
        $Student->test_dates = $request->test_dates;
        $Student->academic_interests = $request->academic_interests;

        $Student->save();
        

        return redirect()->back();


            
    }

    public function StudentPersona($student_id)
    {
        $student = Student::findOrFail($student_id);
        return view('recruiter.panel.student.student_persona',compact('student'));

    }

    public function StudentPersonaRegistration(Request $request)
    {
        // Validation rules for the fields
        $validatedData = $request->validate([
            'extracurricular_activities' => 'nullable|string|max:65535',
            'leadership_roles' => 'nullable|string|max:65535',
            'interests_and_hobbies' => 'nullable|string|max:65535',
            'desired_major' => 'nullable|string|max:255',
            'future_career_goals' => 'nullable|string|max:65535',
            'additional_information' => 'nullable|string|max:65535',
        ]);

        // Find the student by ID or any other criteria
        $Student = Student::find($request->input('id'));

        // Update the student's academic information
        $Student->extracurricular_activities = $request->extracurricular_activities;
        $Student->leadership_roles = $request->leadership_roles;
        $Student->interests_and_hobbies = $request->interests_and_hobbies;
        $Student->desired_major = $request->desired_major;
        $Student->future_career_goals = $request->future_career_goals;
        $Student->additional_information = $request->additional_information;
        

        $Student->save();

        return redirect()->back()->with('success', 'Academic information updated successfully');
    }


    public function StudentStudyPreferance($student_id)
    {
        $student = Student::findOrFail($student_id);
        $countries = Country::get();
        $StudyTypes = StudyType::get();
        return view('recruiter.panel.student.study_preferance',compact('student','StudyTypes','countries'));
    }


    public function StudentStudyPreferanceRegstration(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'intended_area_of_study' => 'required|string|max:255',
            'intended_course_level' => 'required|string|max:255',
            'courses_or_fields_comments' => 'nullable|string|max:65535',
            'career_paths' => 'nullable|string|max:65535',
            'intended_institution' => 'required|string|max:255',
            'intended_intake_quarter' => 'required|string|max:255',
            'intended_intake_year' => 'required|integer|min:' . date('Y') . '|max:' . (date('Y') + 10),
            'intended_intake_comments' => 'nullable|string|max:65535',
            'funding_source' => 'required|string|max:255',
            'intended_destination_1' => 'required|string|max:255',
            'intended_destination_2' => 'nullable|string|max:255',
            'intended_destination_3' => 'nullable|string|max:255',
            'intended_destination_comments' => 'nullable|string|max:65535',
        ]);

        // Create a new Student instance and fill it with the validated data
        $student = Student::find($request->input('id'));
        $student->fill($validatedData);

        // Save the student to the database
        $student->save();

        // Redirect back to the previous page or a specific route
        return redirect()->back()->with('success', 'Student data has been successfully saved.');
    }
    


}
