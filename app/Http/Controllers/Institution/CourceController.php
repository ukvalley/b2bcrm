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
use DataTables;
use App\Models\CountryData;





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

    public function course()
    {
        return view('institution.panel.course_view.course');
    }
    public function previewCourse()
    {
        return view('institution.panel.course_view.previewCourse');
    }
    public function courseView()
    {
        return view('institution.panel.course_view.course_view');
    }
    public function courseById($course_id)
    {
        
        $course = Course::findOrFail($course_id);

        $countryData = CountryData::where($course->country)->first();
        return view('institution.panel.course_view.course_view',compact('course','countryData'));
    }

    public function getCourse(Request $request)
    {
        if ($request->ajax()) {
            $data = Course::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
       
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        // $course = Course::get();
      //  return view('institution.panel.course_view.course',compact('course'));
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
        'application_fees' => 'nullable|numeric|between:0,999999.99',
        'tuition_fee' => 'nullable|string|max:65535',
        'fees_type' => 'nullable|string|max:65535',
        'course_code' => 'nullable|string|max:65535',
        'duration' => 'nullable|string|max:65535',
        'duration_type' => 'nullable|string|max:65535',

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

        $Course->save();
        

        return redirect()->back();


            
    }

    public function CourseBasic3($course_id)
    {

        $course = Course::findOrFail($course_id);
        return view('institution.panel.course.course_basic3',compact('course'));

    }

    public function CourseBasicRegistration3 (Request $request,$course_id)
    {
        // Validation rules for the fields
        $validatedData = $request->validate([
            'admission_requirements' => 'nullable|string|max:65535',
            'international_students' => 'nullable|string|max:65535',
            'english_requirements' => 'nullable|string|max:65535',
            'course_dates' => 'nullable|string|max:255',
            'institution_overview' => 'nullable|string|max:65535',
            'university_ownership' => 'nullable|string|max:255',
            'institution_type' => 'nullable|string|max:65535',
        ]);

        // Find the student by ID or any other criteria
        $Course = Course::find($request->input('course_id'));

        // Update the student's academic information
        $Course->admission_requirements = $request->admission_requirements;
        $Course->international_students = $request->international_students;
        $Course->english_requirements = $request->english_requirements;
        $Course->institution_overview = $request->institution_overview;
        $Course->course_dates = $request->course_dates;
        
        $Course->university_ownership = $request->university_ownership;
        $Course->institution_type = $request->institution_type;
        
   
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



