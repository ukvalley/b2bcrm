<?php

namespace App\Http\Controllers\Institution;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Student; // Make sure to import the Student model
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

use App\Models\UserType;
use App\Models\EducationType;
use App\Models\StudyType;
use App\Models\Country;
use App\Models\PersonaDetail;
use App\Models\Timezone;
use App\Models\Currency;
use App\DataTables\StudentsDataTable;





class CourceController extends Controller
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

    public function CourseBasic()
    {
        return view('institution.panel.course.course_basic_profile');
    }



    public function  CourseBasicRegistration(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required',
            'course_code' => 'required',
            'duration' => 'required|string|max:15',
        ]);

// Create a new user or institution profile in your database
    $course = new Course();
    $course->name =  $validatedData['name'];
    $course->level = $validatedData['level'];
    $course->course_code = $validatedData['course_code'];
    $course->duration = $validatedData['duration'];
    // Add other user-specific fields as needed
    $course->institution_id = Auth::user()->institution->id;

    // Save the user
    $course->save();


    
   
     
        

        // Redirect to the next step of the registration process
        return redirect()->route('institution.course_Basic2', ['course_id' => $course->id]);
    }

    // ...

    public function CourseBasic2($course_id)
    {
        
        $course = Course::findOrFail($course_id);
        return view('institution.panel.course.course_basic2',compact('course'));
    }

    public function CourceBasicResistration2(Request $request,$course_id)
    {

        $validatedData = $request->validate([
        'code' => 'nullable|string|max:255',
        'currency' => 'nullable|string|max:255',
        'application_fees' => 'nullable|',
        'tuition_fee' => 'nullable|string|max:65535',
        'fees_type' => 'nullable|string|max:65535',
        'course_code' => 'nullable|string|max:65535',
        'duration' => 'nullable|string|max:65535',
        'duration_type' => 'nullable|string|max:65535',
        ]);

        

        $Course =Course::find($course_id);

        $Course->code = $request->code;
        $Course->currency = $request->currency;
        $Course->application_fees = $request->application_fees;
        $Course->tuition_fee = $request->tuition_fee;
        $Course->fees_type = $request->fees_type;
        $Course->course_code = $request->course_code;
        $Course->duration = $request->duration;
        $Course->duration_type = $request->duration_type;

        $Course->save();
        

        return redirect()->back();


            
    }

    public function CourseBasic3($course_id)
    {

        $course = Course::findOrFail($course_id);
        return view('institution.panel.course.course_basic3',compact('course'));

    }

    public function CourceBasicResistration3(Request $request,$course_id)
    {
        // Validation rules for the fields
        $validatedData = $request->validate([
            'summary' => 'nullable|string|max:65535',
            'attendance_pattern' => 'nullable|string|max:65535',
            'learning_objectives' => 'nullable|string|max:65535',
            'outcomes' => 'nullable|string|max:255',
            'course_particulars' => 'nullable|string|max:65535',
        ]);

        // Find the student by ID or any other criteria
        $Course = Course::find($request->input('id'));

        // Update the student's academic information
        $Course->summary = $request->extracurriculsummaryar_activities;
        $Course->attendance_pattern = $request->attendance_pattern;
        $Course->learning_objectives = $request->learning_objectives;
        $Course->outcomes = $request->outcomes;
        $Course->course_particulars = $request->course_particulars;
        

        $Course->save();

        return redirect()->back()->with('success', 'Course information updated successfully');
    }

public function CourseBasicUpdate($course_id)
{
    $course = Course::findOrFail($course_id);
    return view('institution.panel.course.course_basic_update',compact('course'));

}


public function CourseBasicUpdateRegistration(Request $request,$course_id)
{

    
       


        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required',
            'course_code' => 'required',
            'duration' => 'required|string|max:15',
            'duration_type' => 'required',
        ]);

// Create a new user or institution profile in your database
    $course =  Course::find($course_id);
    $course->name =  $validatedData['name'];
    $course->level = $validatedData['level'];
    $course->course_code = $validatedData['course_code'];
    $course->duration = $validatedData['duration'];
    $course->duration_type = $validatedData['duration_type'];
    $course->save();

    return redirect()->back();

}


 


}



