<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use App\Models\CourseBatch;

class CourseController extends Controller
{
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
        // dd(Auth::user()->id);
        $course->institution_id = Auth::user()->id;

        // Save the user
        $course->save();

        $course->addDefaultBatches();

        // Redirect to the next step of the registration process
        return redirect()->route('admin.course_Basic2', ['course_id' => $course->id]);
    }

    public function CourseBasic2($course_id)
    {

        $course = Course::findOrFail($course_id);
        return view('admin.panel.course.course_basic2', compact('course'));
    }

    public function CourceBasicResistration2(Request $request, $course_id)
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
        $course = $Course;
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



        // return redirect()->back();

        return view('admin.panel.course.course_basic3', compact('course'));
    }

    public function CourseBasic3($course_id)
    {

        $course = Course::findOrFail($course_id);
        return view('admin.panel.course.course_basic3', compact('course'));
    }

    public function CourseBasicRegistration3(Request $request, $course_id)
    {

        $validatedData = $request->validate([
            'admission_requirements' => 'nullable|string|max:65535',
            'international_students' => 'nullable|string|max:65535',
            'english_requirements' => 'nullable|string|max:65535',
            'course_dates' => 'nullable|string|max:255',
            'institution_overview' => 'nullable|string|max:65535',
            'university_ownership' => 'nullable|string|max:255',
            'institution_type' => 'nullable|string|max:65535',
            'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the student by ID or any other criteria
        $Course = Course::find($course_id);
        $course = $Course;
        $courseBatch = $Course->CourseBatches;

        // Update the student's academic information
        $Course->admission_requirements = $validatedData['admission_requirements'];
        $Course->international_students = $validatedData['international_students'];
        $Course->english_requirements = $validatedData['english_requirements'];
        $Course->institution_overview = $validatedData['institution_overview'];
        $Course->course_dates = $validatedData['course_dates'];

        $Course->university_ownership = $validatedData['university_ownership'];
        $Course->institution_type = $validatedData['institution_type'];
        // $Course->image = $request->image;
        $Course->save();

        if ($request->hasFile('image')) {
            // Delete the old avatar if it exists


            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/course'), $fileName); // Store in the root folder
            $Course->update(['image' => $fileName]);
        }
        // return view('admin.panel.course.batchesDetails', compact('course', 'courseBatch'));
        return redirect()->route('admin.batchesDetails', ['course_id' => $Course->id]);
    }

    public function batchesDetails($course_id)
    {
        $course = Course::find($course_id);
        $courseBatch = $course->CourseBatches;
        return view('admin.panel.course.batchesDetails', compact('course', 'courseBatch'));
    }

    public function batchesDetailsView()
    {
        return view('admin.panel.course.batchesDetails');
    }

    public function CourseBasicUpdate($course_id)
    {
        $course = Course::findOrFail($course_id);
        return view('admin.panel.course.course_basic_update', compact('course'));
    }

    public function CourseBasicUpdateRegistration(Request $request, $course_id)
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

        return redirect()->route('admin.course_Basic2', ['course_id' => $course->id]);
    }
}
