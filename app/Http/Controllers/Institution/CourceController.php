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
use App\Models\Institution;
use App\Models\News;
use App\Models\Links;
use App\Models\Batch;
use App\Models\CourseBatch;
use DB;


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
        $country = Country::get();
        return view('institution.panel.course.course_basic_profile', compact('country'));
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
        $course = Course::find($course_id);

        $institution = $course->institution;
        $country = $institution->Countries;
        // $countryData = CountryData::where('country_name', '=', $country->name)->first();
        $news = [];
        $links = [];
        if (isset($countrydata)) {
            $news = $countryData->news;
            $links = $countryData->links;
        }

        return view('institution.panel.course_view.course_view', compact('course',  'news', 'links'));
    }

    public function getCourse(Request $request)
    {

        if ($request->ajax()) {
            if (Auth::user()->userType->name == 'admin') {
                $data = Course::select('*')->get();
            }else {
                $data = Course::select('courses.*', 'i.name as institution_name')
                ->join('institutions as i', 'i.id', '=', 'courses.institution_id')
                ->where('i.user_id', Auth::user()->id)
                ->get();
            
            }
            $data = Course::select('courses.*', 'i.name as institution_name')
            ->join('institutions as i', 'i.id', '=', 'courses.institution_id')
            ->where('i.user_id', Auth::user()->id)
            ->get();
        
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

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
        $course->institution_id = Auth::user()->institution->id;

        // Save the user
        $course->save();

        $course->addDefaultBatches();

        // Redirect to the next step of the registration process
        return redirect()->route('institution.course_Basic2', ['course_id' => $course->id]);
    }

    // ...

    public function CourseBasic2($course_id)
    {

        $course = Course::findOrFail($course_id);
        return view('institution.panel.course.course_basic2', compact('course'));
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


        // return redirect()->route('institution.course_Basic3', ['course_id' => $Course->id]);
        return view('institution.panel.course.course_basic3', compact('course'));
        // return redirect()->back();


    }

    public function CourseBasic3($course_id)
    {

        $course = Course::findOrFail($course_id);
        return view('institution.panel.course.course_basic3', compact('course'));
    }
    public function batchesDetails($course_id)
    {
        $course = Course::find($course_id);
        $courseBatch = $course->CourseBatches;
        return view('institution.panel.course.batchesDetails', compact('course', 'courseBatch'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Active,Inactive,Batch_full',
        ]);

        $courseBatch = CourseBatch::find($id);

        if (!$courseBatch) {
            return redirect()->back()->with('error', 'Item not found.');
        }

        $courseBatch->status = $request->input('status');
        $courseBatch->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    }

    public function batchesDetailsView()
    {
        return view('institution.panel.course.batchesDetails');
    }

    public function CourseBasicRegistration3(Request $request, $course_id)
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
            'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the student by ID or any other criteria
        $Course = Course::find($course_id);
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
        // return view('institution.panel.course.batchesDetails', compact('Course', 'courseBatch'));
        return redirect()->route('institution.batchesDetails', ['course_id' => $Course->id]);

        // return redirect()->back()->with('success', 'Course information updated successfully');
    }

    public function CourseBasicUpdate($course_id)
    {
        $course = Course::findOrFail($course_id);
        return view('institution.panel.course.course_basic_update', compact('course'));
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

        return redirect()->back();
    }

    public function processJson1()
    {
        return view('institution.jsonprocess');
    }

    // public function processJson(Request $request)
    // {
    //     $json = $request->input('json_data');
    //     $dataArray = json_decode($json, true); // Convert JSON to an associative array
    //    // $dataArray = $json;

    //    // print_r($json); die();

    //     if ($dataArray) {
    //         // Now you can iterate over the array and store it in the 'courses' table
    //         foreach ($dataArray as $validatedData) {
    //             // Create a new course and fill it with the data

    //             $institution = Institution::where('name','=',$validatedData['Destination Country'])->first();

    //            if(isset($institution))
    //            {

    //            }
    //            else
    //            {
    //             $user = new User();
    //             $user->name = $validatedData['Institution Name'];

    //             $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; // List of uppercase letters
    //             $randomLetters = substr(str_shuffle($letters), 0, 2); // Get 2 random letters

    //             $randomNumber = mt_rand(1000, 9999); // Get a random 4-digit number

    //             $result = $randomLetters . $randomNumber; // Concatenate the random letters and number


    //             $user->email = $result."@gmail.com";
    //             $user->password = bcrypt($result);
    //             // Add other user-specific fields as needed

    //             // Save the user
    //             $user->save();

    //             $user->userType()->associate(UserType::where('name', 'Institution')->first());
    //             $user->save();

    //             // Create an institution profile associated with the user
    //             $institution = new Institution();
    //             $institution->user_id = $user->id;
    //             $institution->name = $validatedData['Institution Name'];
    //             $institution->email = $result."@gmail.com";
    //             $institution->phone_number = "88888888888";
    //             $institution->password = bcrypt($result);
    //             $Country = Country::where('name','=',$validatedData['Destination Country'])->first();

    //             if(isset($Country))
    //             {
    //                 $institution->country = $Country->id;
    //             }
    //             else{
    //                 $Country = new Country;
    //                 $Country->name = $validatedData['Destination Country'];
    //                 $Country->code = $validatedData['Destination Country'];
    //                 $Country->save();
    //                 $institution->country = $Country->id;
    //             }

    //             $institution->city = $validatedData['Nearest City'];

    //             $institution->save();
    //            }


    //             $Course = new Course();



    //             if(isset($Country))
    //             {
    //                 $Course->country = $Country->id;
    //             }


    //             $Course->institution_id =  $institution->id;
    //             $Course->name =  $validatedData['Course Name'];
    //             // $Course->level = $validatedData['level'];
    //             // $Course->course_code = $validatedData['course_code'];
    //             // $Course->currency = $validatedData['currency'];
    //             $Course->tuition_fee = $validatedData['Tuition Fees'];
    //             $Course->application_fees = $validatedData['Application Fee'];
    //             // $Course->fees_type = $validatedData['fees_type'];
    //             $Course->duration = $validatedData['Course Duration'];
    //             // $Course->duration_type = $validatedData['duration_type'];
    //             // $Course->code = $validatedData['code'];
    //             // $Course->summary = $validatedData['summary'];
    //             // $Course->attendance_pattern = $validatedData['attendance_pattern'];

    //             // $Course->learning_objectives = $validatedData['learning_objectives'];
    //             // $Course->outcomes = $validatedData['outcomes'];
    //             // $Course->course_particulars = $validatedData['course_particulars'];
    //             $Course->admission_requirements = $validatedData['Entry Requirements'];
    //             // $Course->international_students = $validatedData['international_students'];
    //             // $Course->english_requirements = $validatedData['english_requirements'];
    //             // $Course->institution_overview = $validatedData['institution_overview'];
    //             // $Course->course_dates = $validatedData['course_dates'];
    //             // $Course->key_selling_points = $validatedData['key_selling_points'];
    //             // $Course->university_ownership = $validatedData['university_ownership'];

    //             $Course->save(); // Save the course to the database
    //         }}
    //         //jsonprocess
    //         return redirect()->back();

    //         // return redirect()->back()->with('success', 'JSON data processed and courses added.');
    //     //}

    //     // return redirect()->back()->with('error', 'Invalid JSON data.');
    // }



    public function processJson(Request $request)
    {
        ini_set('memory_limit', '-1');

        $json = $request->input('json_data');
        $dataArray = json_decode($json, true); // Convert JSON to an associative array

        if ($dataArray) {
            try {
                DB::beginTransaction(); // Start a database transaction

                foreach ($dataArray as $validatedData) {
                    $institution = Institution::firstOrNew(['name' => $validatedData['Destination Country']]);

                    if (!$institution->exists) {
                        // Create a new user and institution only if it doesn't exist
                        $user = new User();
                        $user->name = $validatedData['Institution Name'];
                        // Add other user-specific fields as needed

                        $user->email = $this->generateUniqueEmail(); // You can define this function
                        $user->password = bcrypt($user->email);

                        $user->save();
                        $user->userType()->associate(UserType::where('name', 'Institution')->first());
                        $user->save();

                        $institution->user_id = $user->id;
                        $institution->name = $validatedData['Institution Name'];
                        $institution->email = $user->email; // Set the email from the user
                        $institution->phone_number = '88888888888';
                        $institution->password = $user->password;

                        $country = Country::firstOrNew(['name' => $validatedData['Destination Country']]);

                        if (!$country->exists) {
                            $country->code = $validatedData['Destination Country'];
                            $country->save();
                        }

                        $institution->country = $country->id;
                        $institution->city = $validatedData['Nearest City'];

                        $institution->save();
                    }

                    $course = new Course();
                    $course->country = $institution->country;
                    $course->institution_id = $institution->id;
                    $course->name = $validatedData['Course Name'];
                    $course->tuition_fee = $validatedData['Tuition Fees'];
                    $course->application_fees = $validatedData['Application Fee'];
                    $course->duration = $validatedData['Course Duration'];
                    $course->admission_requirements = $validatedData['Entry Requirements'];

                    $course->save(); // Save the course to the database
                }

                DB::commit(); // Commit the transaction

                return redirect()->back()->with('success', 'JSON data processed and courses added.');
            } catch (\Exception $e) {
                DB::rollBack(); // Rollback the transaction in case of an error
                print_r($e);
                die();
                //return redirect()->back()->with('error', 'Error processing JSON data.');
            }
        }

        return redirect()->back()->with('error', 'Invalid JSON data.');
    }

    // Function to generate a unique email
    private function generateUniqueEmail()
    {
        $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; // List of uppercase letters
        $randomLetters = substr(str_shuffle($letters), 0, 2); // Get 2 random letters
        $randomNumber = mt_rand(1000, 9999); // Get a random 4-digit number
        $result = $randomLetters . $randomNumber; // Concatenate the random letters and number

        return $result . '@gmail.com';
    }
}
