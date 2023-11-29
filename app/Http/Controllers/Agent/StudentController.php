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
use App\Models\PersonaDetail;
use App\Models\Timezone;
use App\Models\Currency;
use App\Models\CountryData;

use App\Models\News;

use App\Models\Institution;
use App\DataTables\StudentsDataTable;
use App\Models\Note;
use App\Models\Task;
use App\Models\Timeline;
use App\Models\Course;
use App\Models\Shortlist;
use Auth;






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

        $this->logTimelineEntry($student, "Student Enrolled and Collected Personal Information");

        $student->addDefaultTasks();

        // Redirect to the next step of the registration process
        return redirect()->route('agent.student_academic', ['student_id' => $student->id]);
    }

    // ...

    public function StudentAcademic($student_id)
    {

        $student = Student::findOrFail($student_id);
        $educationTypes = EducationType::get();
        return view('recruiter.panel.student.student_academic', compact('student', 'educationTypes'));
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



        $Student = Student::find($request->input('id'));

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

        $this->logTimelineEntry($Student, "Collected Academic Information");

        return redirect()->route('agent.student_persona', ['student_id' => $Student->id]);
    }

    public function StudentPersona($student_id)
    {
        $student = Student::findOrFail($student_id);
        return view('recruiter.panel.student.student_persona', compact('student'));
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

        $this->logTimelineEntry($Student, "Collected Persona Information");

        return redirect()->route('agent.StudentLeadTracking', ['student_id' => $Student->id]);
        // return redirect()->back()->with('success', 'Academic information updated successfully');
    }


    public function StudentStudyPreferance($student_id)
    {
        $student = Student::findOrFail($student_id);
        $countries = Country::get();
        $StudyTypes = StudyType::get();
        return view('recruiter.panel.student.study_preferance', compact('student', 'StudyTypes', 'countries'));
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

        $this->logTimelineEntry($student, "Updated Study Preferences");

        // Redirect back to the previous page or a specific route
        return redirect()->route('agent.StudentPersonalDetail', ['student_id' => $student->id]);
        // return redirect()->back()->with('success', 'Student data has been successfully saved.');
    }



    public function StudentLeadTracking($student_id)
    {
        $student = Student::findOrFail($student_id);
        $countries = Country::get();
        $user_id = Auth::id(); // Replace this with the desired user_id
        $user_name = Auth::user()->name;

        $students = Student::where('Lead_parent', $user_id)
            ->pluck('first_name', 'user_id');
        // array_push($student,[$user_id, $user_id]);


        $students[$user_id] = $user_name;
// dd($students);
        
        return view('recruiter.panel.student.student_lead_tracking', compact('student', 'countries', 'students'));
    }


    public function StudentLeadTrackingRegstration(Request $request)
    {

        // Validate the incoming data
        $validatedData = $request->validate([
            'lead_status' => 'required|string|max:255',
            'prospect_rating' => 'required|string|max:255',
            'preferred_appointment_date' => 'date',
            'preferred_appointment_time' => 'date_format:H:i',
            'lead_source' => 'string|max:255',
            'candidate_comments' => 'string',
            'signup_country' => 'string|max:255',
            'signup_city' => 'string|max:255',
            'signup_state_province' => 'string|max:255',
            'Lead_parent' => 'string|max:255',
        ]);

        // Create a new Student instance and fill it with the validated data
        $student = Student::find($request->input('id'));
        $student->fill($validatedData);
        $student->Lead_parent = $request->input('lead_parent');
        // Save the student to the database
        $student->save();

        $this->logTimelineEntry($student, "Lead Information Updated");

        // Redirect back to the previous page or a specific route
        // return redirect()->back()->with('success', 'Student data has been successfully saved.');
        return redirect()->route('agent.StudentStudyPreferance', ['student_id' => $student->id]);
    }



    public function StudentPersonalDetail($student_id)
    {
        $student = Student::findOrFail($student_id);
        $personaDetail = $student->personaDetail ?? new PersonaDetail();

        //  var_dump($student->personaDetail); // Check the value of $student->personaDetail


        $personaDetail = $student->personaDetail ?? new PersonaDetail();
        //  var_dump($personaDetail); // Check the value of $personaDetail


        $timezones = TimeZone::get();
        $currency = Currency::get();
        //   print_r($personaDetail->address1); die();
        $countries = Country::get();
        return view('recruiter.panel.student.studen_personal_detail', compact('student', 'countries', 'personaDetail', 'timezones', 'currency'));
    }



    public function StudentPersonalDetailRegistration(Request $request)
    {
        $student = Student::findOrFail($request->input('id'));

        // print_r($student); die();

        $validatedData = $request->validate([
            'address1' => 'required|string',
            'address2' => 'nullable|string',
            'city' => 'required|string',
            'state_province' => 'required|string',
            'country' => 'required|string', // Validate that the selected country exists in the "countries" table.
            'postcode' => 'required|string',
            'date_of_birth' => 'required|date',
            'marital_status' => 'required|string',
            'timezone' => 'required|string',
            'currency' => 'required|string',
            'image_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image upload if needed.
        ]);

        // die();



        $personaDetail = $student->personaDetail ?? new PersonaDetail();
        $personaDetail->student_id = $student->id;
        $personaDetail->fill($validatedData);
        $student->personaDetail()->save($personaDetail);

        $this->logTimelineEntry($student, "Personal Details Updated");



        if ($request->hasFile('image_profile')) {
            // Delete the old avatar if it exists




            $file = $request->file('image_profile');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/avtar'), $fileName); // Store in the root folder





            $personaDetail->update(['image_profile' => $fileName]);
        }


        return redirect()->back();
    }


    public function StudentBasicUpdate($student_id)
    {
        $student = Student::findOrFail($student_id);
        return view('recruiter.panel.student.student_basic_update', compact('student'));
    }

    public function StudentBasicUpdateRegistration(Request $request)
    {

        // Validate the form data
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'nationality' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
        ]);


        $student =  Student::find($request->input('id'));
        $student->first_name = $validatedData['full_name'];
        $student->date_of_birth = $validatedData['date_of_birth'];
        $student->gender = $validatedData['gender'];
        $student->nationality = $validatedData['nationality'];
        $student->address = $validatedData['address'];
        $student->phone_number = $validatedData['phone_number'];

        // You can add more fields and data saving logic as needed

        // Save the student profile
        $student->save();

        $this->logTimelineEntry($student, "Basic Information Updated");


        return redirect()->back();
    }


    public function getStudents(Request $request)
    {
        return (new StudentsDataTable())->ajax();
    }


    public function Students(Request $request)
    {
        return view('recruiter.panel.studentView.students');
    }

    public function PreviewStudents($id)
    {
        $Student = Student::find($id);

        // $Student->addDefaultTasks();

        $notes = $Student->Notes()->orderBy('created_at', 'desc')->get();
        $messages = $Student->Messages;
        $tasks = $Student->Tasks()->orderBy('created_at', 'desc')->get();
        $timeline = $Student->Timeline()->orderBy('created_at', 'desc')->get();

        // print_r($timeline); die();

        return view('recruiter.panel.studentView.PreviewStudents', compact('Student', 'notes', 'messages', 'tasks', 'timeline'));
    }



    public function StudentAddNotes(Request $request)
    {

        $validatedData = $request->validate([
            'notesContent' => 'required|string|max:2550',
            'communicationMedium' => 'required',
            'student_id' => 'required',
            'recruiter_id' => 'required',
        ]);


        $Note = new Note;
        $Note->student_id = $validatedData['student_id'];
        $Note->recruiter_id = $validatedData['recruiter_id'];
        $Note->content = $validatedData['notesContent'];
        $Note->student_id = $validatedData['student_id'];
        $Note->communicationMedium = $validatedData['communicationMedium'];

        $Note->save();

        $Student = Student::find($validatedData['student_id']);

        $this->logTimelineEntry($Student, "New Note Added");


        return redirect()->back();
    }

    // task completed feature
    public function complete(Task $task)
    {
        $task->update(['completed' => !$task->completed]);

        $student = Student::find($task->student_id);

        $this->logTimelineEntry($student, "Task Stuatus Updated");

        return redirect()->back();
    }


    // timeline entry

    public function logTimelineEntry($student, $action)
    {
        $timelineEntry = new Timeline([
            'student_id' => $student->id,
            'action' => $action,
        ]);

        $timelineEntry->save();
    }




    // course search controller

    public function CourseSearch($id)
    {
        $Student = Student::find($id);

        // $Student->addDefaultTasks();

        $notes = $Student->Notes()->orderBy('created_at', 'desc')->get();
        $messages = $Student->Messages;
        $tasks = $Student->Tasks()->orderBy('created_at', 'desc')->get();
        $timeline = $Student->Timeline()->orderBy('created_at', 'desc')->get();
        $courses = Course::get();


        // print_r($timeline); die();





        return view('recruiter.panel.courseSearch.CourseSearch', compact('Student', 'notes', 'messages', 'tasks', 'timeline', 'courses'));
    }



    public function CourseDetails($id)
    {
        $course = Course::find($id);

        $institution = $course->institution;
        $country = $institution->Countries;
        $countryData = CountryData::where('country_name', '=', $country->name)->first();
        $news = [];
        $links = [];
        if (isset($countrydata)) {
            $news = $countryData->news;
            $links = $countryData->links;
        }


        return view('recruiter.panel.courseSearch.CourseDetails', compact('course', 'countryData', 'news', 'links'));
    }

    public function courseById($course_id)
    {

        $course = Course::findOrFail($course_id);

        $institution = Institution::where('id', $course->institution_id)->first();
        $c = Country::where('id', $institution->country)->first();

        $countryData = CountryData::where('country_name', $institution->country)->first();
        $news = News::where('country_id', $c->id)->get();
        $links = Institution::where('id', $c->id)->get();

        return view('recruiter.panel.courseSearch.CourseDetails', compact('course', 'countryData', 'news', 'links'));
    }



    // add course to favourite

    public function addCourse(Request $request)
    {
        // Validate the request if necessary

        $studentId = $request->input('student_id');

        // Assuming you have a logged-in student

        $courseId = $request->input('course_id');

        // Check if the course is already in the shortlist for this student
        if (Shortlist::where('student_id', $studentId)->where('course_id', $courseId)->exists()) {
            Shortlist::where('course_id', '=', $courseId)->where('student_id', '=', $studentId)->delete();
            return redirect()->back()->with('success', 'Removed From Shortlist.');
        }

        // Create a new Shortlist record
        Shortlist::create([
            'student_id' => $studentId,
            'course_id' => $courseId,
        ]);

        return redirect()->back()->with('success', 'Course added to your shortlist.');
    }



    //Shortlist

    public function ShortListView($id)
    {
        $Student = Student::find($id);
        $Shortlist = Shortlist::join('courses', 'shortlists.course_id', '=', 'courses.id')
            ->join('institutions', 'courses.institution_id', '=', 'institutions.id')
            ->join('countries', 'institutions.country', '=', 'countries.id')
            ->select('courses.name as course_name', 'institutions.name as institution_name', 'countries.name as country_name')
            ->where('shortlists.student_id', $Student->id)
            ->get();


        return view('recruiter.panel.courseSearch.ShortList', compact('Student', 'Shortlist'));
    }

   
    
    

  
}
