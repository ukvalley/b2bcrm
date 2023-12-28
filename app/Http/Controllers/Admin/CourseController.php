<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function CourseBasic()
    {
        $country = Country::get();
        return view('admin.panel.course.course_basic_profile', compact('country'));
    }

    public function  CourseBasicRegistration(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required',
            'course_code' => 'required',
            'duration' => 'required|string|max:15',
            'country' => 'required',
        ]);

        // Create a new user or institution profile in your database
        $course = new Course();
        $course->name =  $validatedData['name'];
        $course->level = $validatedData['level'];
        $course->course_code = $validatedData['course_code'];
        $course->duration = $validatedData['duration'];
        $course->country = $validatedData['country'];
        // Add other user-specific fields as needed
        $course->institution_id = Auth::user()->admin->id;

        // Save the user
        $course->save();

        $course->addDefaultBatches();

        // Redirect to the next step of the registration process
        return redirect()->route('admin.course_Basic2', ['course_id' => $course->id]);
    }

    public function CourseBasic2($course_id)
    {
        
        $course = Course::findOrFail($course_id);
        return view('admin.panel.course.course_basic2',compact('course'));
    }

    public function CourceBasicResistration2(Request $request,$course_id)
    {

        $validatedData = $request->validate([
        'code' => 'nullable|string|max:255',
        'currency' => 'nullable|string|max:255',
        'application_fees' => 'nullable|numeric|between:0,999999.99',
        'tuition_fee' => 'nullable|string|max:65535',
        'fees_type' => 'nullable|string|max:65535',
        'course_code' => 'nullable|string|max:65535',
        'duration' => 'nullable|string|max:65535',
        'duration_type' => 'nullable|string|max:65535',
        'summary' => 'nullable|string|max:65535',
        'attendance_pattern' => 'nullable|string|max:65535',
        ]);

        $Course = Course::find($course_id);

        $Course->code = $request->code;
        $Course->currency = $request->currency;
        $Course->application_fees = $request->application_fees;
        $Course->tuition_fee = $request->tuition_fee;
        $Course->fees_type = $request->fees_type;
        $Course->course_code = $request->course_code;
        $Course->duration = $request->duration;
        $Course->duration_type = $request->duration_type;
        $Course->summary = $request->summary;
        $Course->attendance_pattern = $request->attendance_pattern;

        $Course->save();

        

        return redirect()->back();


            
    }
}
