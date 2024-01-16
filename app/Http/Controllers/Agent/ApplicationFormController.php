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
use App\Models\Documents;
use App\Models\DocumentsUpload;
use App\Models\News;
use App\Models\ApplicationForm;
use App\Models\Recruiter;
use Auth;


use App\Models\Visa;
use App\Models\Shortlist;

use App\Models\Institution;

use App\Models\ApplicationPersonal;

use App\Models\ApplicationEducation;
use App\DataTables\StudentsDataTable;
use App\Models\Note;
use App\Models\Task;
use App\Models\Timeline;
use App\Models\Course;

class ApplicationFormController extends Controller
{
    //

    public function showApplicationForm($id)
    {
        $Student = Student::find($id);

        if ($Student) {
            $App_data = ApplicationPersonal::where('student_id', $Student->id)->firstOrNew();
            // You can set any additional properties for the new record here if needed.
            $App_data->student_id = $Student->id; // For example

            // Save the record
            $App_data->save();

            $Education_data = $Student->ApplicationEducation; // Assuming a relationship is set up

        } else {
            // Handle the case where the Student with the given ID doesn't exist
        }


        return view('recruiter.panel.application.application', compact('Student', 'App_data', 'Education_data'));
    }

    //basic application form
    public function personalApplicationForm(Request $request)
    {

        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required',
            'fname' => 'required',
            'pname' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'ethnicity' => 'required',
            'born' => 'required',
            'address' => 'required',
            'city' => 'required',
            'province' => 'required',
            'postcode' => 'required',
            'current_country' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'cell' => 'required',
            'number' => 'required',
            'semail' => 'required',
            'wid' => 'required',
            'lang_of_c' => 'required',


        ]);



        // print_r($validatedData ); die();

        // Create a new user or institution profile in your database
        $personal = ApplicationPersonal::where('student_id', '=', $request->input('student_id'))->first();
        $personal->title =  $validatedData['title'];
        $personal->fname =  $validatedData['fname'];
        $personal->pname =  $validatedData['pname'];
        $personal->dob =  $validatedData['dob'];
        $personal->gender =  $validatedData['gender'];
        $personal->nationality =  $validatedData['nationality'];
        $personal->ethnicity =  $validatedData['ethnicity'];
        $personal->born =  $validatedData['born'];
        $personal->address =  $validatedData['address'];
        $personal->city =  $validatedData['city'];
        $personal->province =  $validatedData['province'];
        $personal->postcode =  $validatedData['postcode'];
        $personal->current_country =  $validatedData['current_country'];
        $personal->email =  $validatedData['email'];
        $personal->phone =  $validatedData['phone'];
        $personal->cell =  $validatedData['cell'];
        $personal->number =  $validatedData['number'];
        $personal->semail =  $validatedData['semail'];
        $personal->wid =  $validatedData['wid'];
        $personal->lang_of_c =  $validatedData['lang_of_c'];


        // Add other user-specific fields as needed

        // Save the user
        $personal->save();


        return redirect()->back();
    }



    //education


    public function educationUpdate(Request $request)

    {
        $id = $request->input('student_id');

        $validatedData = $request->validate([


            'title1' => 'required',
            'title2' => 'required',
            'address2' => 'required',
            'university' => 'required',
            'credit_transfer' => 'required',
            'puniversity' => 'required',
            'gap' => 'required',
            'pre_applied' => 'required',
            'pen' => 'required',
            'CEGEP' => 'required',
            'english_school' => 'required',
            'language' => 'required',
            'main_language' => 'required',
            's_study_date' => 'required',
            'school_name' => 'required',
            'completed_study' => 'required',
            'course_title' => 'required',
            'result' => 'required',
            'equivalence' => 'required',
            'currently_studying' => 'required',
            'previous_study' => 'required',
            's_country' => 'required',
            's_institution' => 'required',
            'completed_successfully' => 'required',
            'study_fultime' => 'required',
            'experience' => 'required',
            'employment_status' => 'required',


        ]);

        //    print_r($validatedData);die();

        $Student = Student::find($id);

        if ($Student) {
            $App_data = ApplicationEducation::where('student_id', $Student->id)->firstOrNew();
            // You can set any additional properties for the new record here if needed.
            $App_data->student_id = $Student->id; // For example

            // Save the record

            $App_data->title1 =  $validatedData['title1'];
            $App_data->title2 =  $validatedData['title2'];
            $App_data->address2 =  $validatedData['address2'];
            $App_data->university =  $validatedData['university'];
            $App_data->credit_transfer =  $validatedData['credit_transfer'];
            $App_data->puniversity =  $validatedData['puniversity'];
            $App_data->gap =  $validatedData['gap'];
            $App_data->pre_applied =  $validatedData['pre_applied'];
            $App_data->pen =  $validatedData['pen'];
            $App_data->CEGEP =  $validatedData['CEGEP'];
            $App_data->english_school =  $validatedData['english_school'];
            $App_data->language =  $validatedData['language'];
            $App_data->main_language =  $validatedData['main_language'];
            $App_data->s_study_date =  $validatedData['s_study_date'];
            $App_data->school_name =  $validatedData['school_name'];
            $App_data->completed_study =  $validatedData['completed_study'];
            $App_data->course_title =  $validatedData['course_title'];
            $App_data->result =  $validatedData['result'];
            $App_data->equivalence =  $validatedData['equivalence'];
            $App_data->currently_studying =  $validatedData['currently_studying'];
            $App_data->previous_study =  $validatedData['previous_study'];
            $App_data->s_country =  $validatedData['s_country'];
            $App_data->s_institution =  $validatedData['s_institution'];
            $App_data->completed_successfully =  $validatedData['completed_successfully'];
            $App_data->study_fultime =  $validatedData['study_fultime'];
            $App_data->personal_id =  $request->input('personalId');

            $App_data->experience =  $validatedData['experience'];
            $App_data->employment_status =  $validatedData['employment_status'];



            $App_data->save();
        } else {
            // Handle the case where the Student with the given ID doesn't exist
        }


        return redirect()->back();
    }


    //language
    public function languageUpdate(Request $request)

    {
        $id = $request->input('student_id');

        $validatedData = $request->validate([

            'first_language' => 'required',
            'language_known' => 'required',
            'proficiency' => 'required',
            'language_demo' => 'required',
            'eng_course' => 'required',


        ]);


        //    print_r($validatedData);die();

        $Student = Student::find($id);

        if ($Student) {
            $App_data = ApplicationEducation::where('student_id', $Student->id)->firstOrNew();
            // You can set any additional properties for the new record here if needed.
            $App_data->student_id = $Student->id; // For example


            $App_data->first_language =  $validatedData['first_language'];
            $App_data->language_known =  $validatedData['language_known'];
            $App_data->proficiency =  $validatedData['proficiency'];
            $App_data->language_demo =  $validatedData['language_demo'];
            $App_data->eng_course =  $validatedData['eng_course'];



            $App_data->update();
        } else {
            // Handle the case where the Student with the given ID doesn't exist
        }
        return redirect()->back();
    }

    //administration
    public function adminstrationUpdate(Request $request)

    {
        $id = $request->input('student_id');



        $validatedData = $request->validate([
            'r_contact_details' => 'required',
            'agent_contact' => 'required',
            'contact_name' => 'required',
            'contact_mobile' => 'required',
            'contact_email' => 'required',
            'passport' => 'required',
            'passport_number' => 'required',
            'visa' => 'required',
            'visa_apply_note' => 'required',
            'married' => 'required',
            'citizenship' => 'required',
            'app_submitted_from' => 'required',
            'status_in_canada' => 'required',
            'sponcership_gov' => 'required',
            'receive_scholarship' => 'required',
            'medical_agreement' => 'required',


        ]);
        //    print_r($validatedData );die;
        $Student = Student::find($id);

        if ($Student) {
            $App_data = ApplicationEducation::where('student_id', $Student->id)->firstOrNew();
            // You can set any additional properties for the new record here if needed.
            $App_data->student_id = $Student->id; // For example

            $App_data->r_contact_details =  $validatedData['r_contact_details'];
            $App_data->agent_contact =  $validatedData['agent_contact'];
            $App_data->contact_name =  $validatedData['contact_name'];
            $App_data->contact_mobile =  $validatedData['contact_mobile'];
            $App_data->contact_email =  $validatedData['contact_email'];
            $App_data->passport =  $validatedData['passport'];
            $App_data->passport_number =  $validatedData['passport_number'];
            $App_data->visa =  $validatedData['visa'];
            $App_data->visa_apply_note =  $validatedData['visa_apply_note'];
            $App_data->married =  $validatedData['married'];
            $App_data->citizenship =  $validatedData['citizenship'];
            $App_data->app_submitted_from =  $validatedData['app_submitted_from'];
            $App_data->status_in_canada =  $validatedData['status_in_canada'];
            $App_data->sponcership_gov =  $validatedData['sponcership_gov'];
            $App_data->receive_scholarship =  $validatedData['receive_scholarship'];
            $App_data->medical_agreement =  $validatedData['medical_agreement'];


            $App_data->update();
        } else {
            // Handle the case where the Student with the given ID doesn't exist
        }
        return redirect()->back();
    }

    //preference
    public function preferenceUpdate(Request $request,)

    {
        $id = $request->input('student_id');


        $validatedData = $request->validate([
            'admission_note' => 'required',

        ]);

        $Student = Student::find($id);

        if ($Student) {
            $App_data = ApplicationEducation::where('student_id', $Student->id)->firstOrNew();
            // You can set any additional properties for the new record here if needed.
            $App_data->student_id = $Student->id; // For example

            $App_data->admission_note =  $validatedData['admission_note'];


            $App_data->update();
        } else {
            // Handle the case where the Student with the given ID doesn't exist
        }
        return redirect()->back();
    }






    public function DocumentsUpload($id)
    {
        $Student = Student::find($id);
        $documentTypes = Documents::get();
        $documentsA1 = DocumentsUpload::where('student_uid', $Student->id)->where('docType', '=', 'A1')->with('documentType_id')->get();
        $countA1 = $documentsA1->count();
        $documentsA2 = DocumentsUpload::where('student_uid', $Student->id)->where('docType', '=', 'A2')->with('documentType_id')->get();
        $countA2 = $documentsA2->count();
        $documentsB1 = DocumentsUpload::where('student_uid', $Student->id)->where('docType', '=', 'B1')->with('documentType_id')->get();
        $countB1 = $documentsB1->count();
        $documentsB2 = DocumentsUpload::where('student_uid', $Student->id)->where('docType', '=', 'B2')->with('documentType_id')->get();
        $countB2 = $documentsB2->count();
        $documentsC1 = DocumentsUpload::where('student_uid', $Student->id)->where('docType', '=', 'C1')->with('documentType_id')->get();
        $countC1 = $documentsC1->count();
        $documentsC2 = DocumentsUpload::where('student_uid', $Student->id)->where('docType', '=', 'C2')->with('documentType_id')->get();
        $countC2 = $documentsC2->count();
        $documentsD1 = DocumentsUpload::where('student_uid', $Student->id)->where('docType', '=', 'D1')->with('documentType_id')->get();
        $countD1 = $documentsD1->count();
        $recruiter = Recruiter::where('user_id', Auth::user()->id)->first();
        // print_r($documents);die();
        return view('recruiter.panel.application.Documents', compact('Student', 'documentTypes', 'documentsA1', 'countA1', 'documentsA2', 'countA2', 'documentsB1', 'countB1', 'documentsB2', 'countB2', 'documentsC1', 'countC1', 'documentsC2', 'countC2', 'recruiter'));
    }


    public function uploadDocument(Request $request)
    {



        $request->validate([
            'documentType' => 'required',
            'document' => 'required',
        ]);
        // $selectedDocumentType = $request->input('documentType');
        // print_r(  $selectedDocumentType );die();


        $docType = Documents::where('id', $request->input('documentType'))->first();

        $document = new DocumentsUpload();
        $document->document_type_id = $request->input('documentType');
        $document->docType =  $docType->type;

        $document->student_uid = $request->input('student');

        $document->status = 'Uploaded';

        $storagePath = public_path('images/document');
        $document->file_name = $request->file('document')->move($request->file('document')->getClientOriginalName());

        $document->save();

        return redirect()->back()->with('success', 'Document uploaded successfully');
    }



    public function updatedocument(Request $request, $id)
    {
        // Update the document based on the form data in $request.

        $document = DocumentsUpload::find($id);

        // Add authorization and validation as needed.

        // Update document data and save it.
        $storagePath = public_path('images/document');
        $document->file_name = $request->file('update_file')->move($request->file('update_file')->getClientOriginalName());

        $document->update();

        return redirect()->back()->with('success', 'Document updated successfully');
    }

    public function deleteDocument($id)
    {
        $document = DocumentsUpload::find($id);

        if (!$document) {
            return redirect()->back()->with('error', 'Document not found');
        }

        // Delete the document from the database
        $document->delete();

        return redirect()->back()->with('success', 'Document deleted successfully');
    }


    //Review

    public function ReviewForm($id)
    {
        $Student = Student::find($id);
        $recruiter = Recruiter::where('user_id', Auth::user()->id)->first();


        if ($Student) {
            $App_data = ApplicationPersonal::where('student_id', $Student->id)->firstOrNew();
            // You can set any additional properties for the new record here if needed.
            $App_data->student_id = $Student->id; // For example

            // Save the record
            $App_data->save();

            $Education_data = $Student->ApplicationEducation; // Assuming a relationship is set up

            $Shortlist = Shortlist::join('courses', 'shortlists.course_id', '=', 'courses.id')
                ->join('institutions', 'courses.institution_id', '=', 'institutions.id')
                ->join('countries', 'institutions.country', '=', 'countries.id')
                ->select('courses.id as course_id', 'courses.name as course_name', 'institutions.id as institution_id', 'institutions.name as institution_name', 'countries.name as country_name')
                ->where('shortlists.student_id', $Student->id)
                ->get();

            $courseIds = Shortlist::where('student_id', '=', $Student->id)->get();
            // print_r( $courseIds);die();
            $Documents = DocumentsUpload::where('student_uid', $Student->id)->get();
            //$ManditoryDocuments = Documents::where('manditory', '=', 'm')->get();
            $ManditoryDocuments = [];
            //$ManditoryCount = Documents::where('manditory', '=', 'm')->count();
            $ManditoryCount = 0;
            $SelectedCourse = ApplicationForm::where('student_id', '=', $Student->id)->get();

            // $MandatoryCount1 = Documents::where('manditory', 'm')
            //     ->join('document_uploads', 'documents.id', '=', 'document_uploads.document_type_id')
            //     ->where('document_uploads.student_uid', $Student->id)
            //     ->count();
            $MandatoryCount1 = 0;

            // print_r($Shortlist );die();

        } else {
            // Handle the case where the Student with the given ID doesn't exist
        }


        return view('recruiter.panel.application.ReviewForm', compact('Student', 'App_data', 'Education_data', 'SelectedCourse', 'Shortlist', 'courseIds', 'Documents', 'ManditoryDocuments', 'ManditoryCount', 'MandatoryCount1', 'recruiter'));
    }


    public function ViewVisaApplication($id)
    {
        $Student = Student::find($id);

        $recruiter = Recruiter::where('user_id', Auth::user()->id)->first();

        $Visa = Visa::where('student_id', '=', $Student->id)->firstOrNew();


        return view('recruiter.panel.application.VisaApplication', compact('Student', 'Visa', 'recruiter'));
    }


    public function VisaApplicationForm(Request $request)
    {
        //   print_r('Migration Not Available');die();
        // Validate the form data
        $validatedData = $request->validate([
            'current_visa' => 'required',
            'current_visa_application' => 'required',
            'criminal_activity' => 'required',
            'old_visa' => 'required',
            'sibling' => 'required',
            'married' => 'required',
            'spouse' => 'required',
            'child' => 'required',
            'funding' => 'required',
            's_fund' => 'required',
            'r_sponcer' => 'required',
            'award' => 'required',
            's_occupation' => 'required',
            'visa_funding' => 'required',
            'student_id' => 'required',


        ]);



        // print_r($validatedData ); die();

        // Create a new user or institution profile in your database
        $visa = Visa::where('student_id', '=', $request->input('student_id'))->firstOrNew();
        $visa->current_visa =  $validatedData['current_visa'];
        $visa->current_visa_application =  $validatedData['current_visa_application'];
        $visa->criminal_activity =  $validatedData['criminal_activity'];
        $visa->old_visa =  $validatedData['old_visa'];
        $visa->sibling =  $validatedData['sibling'];
        $visa->married =  $validatedData['married'];
        $visa->spouse =  $validatedData['spouse'];
        $visa->child =  $validatedData['child'];
        $visa->funding =  $validatedData['funding'];
        $visa->s_fund =  $validatedData['s_fund'];
        $visa->r_sponcer =  $validatedData['r_sponcer'];
        $visa->award =  $validatedData['award'];
        $visa->s_occupation =  $validatedData['s_occupation'];
        $visa->visa_funding =  $validatedData['visa_funding'];
        $visa->student_id =  $validatedData['student_id'];





        // Add other user-specific fields as needed

        // Save the user
        $visa->save();


        return redirect()->back();
    }


    public function VisaUpdate(Request $request)

    {
        $id = $request->input('student_id');


        $Student = Student::find($id);

        if ($Student) {
            $visa = Visa::where('student_id', $Student->id)->firstOrNew();
            // You can set any additional properties for the new record here if needed.
            $visa->note =  $request->input('note');
            $visa->update();
        } else {
            // Handle the case where the Student with the given ID doesn't exist
        }
        return redirect()->back();
    }


    public function SubmitApplicationForm(Request $request)
    {
        // Validate the request data as needed
        $request->validate([
            'selected_courses' => 'required|array',
            'selected_courses.*' => 'integer', // Ensure each selected course ID is an integer
        ]);

        // Get the selected course IDs from the request
        $selectedCourseIds = $request->input('selected_courses');


        // Check if the selected courses already exist in the application form table
        $existingCourseIds = ApplicationForm::where('student_id', $request->input('student_id'))
            ->whereIn('course_id', $selectedCourseIds)
            ->pluck('course_id')
            ->toArray();

        // Filter out courses that already exist in the application form
        $newCourseIds = array_diff($selectedCourseIds, $existingCourseIds);

        // Insert the selected course IDs into your application form table for new courses

        foreach ($newCourseIds as $courseId) {
            // You can use your Eloquent model to insert the data
            ApplicationForm::create([
                'student_id' => $request->input('student_id'),
                'course_id' => $courseId,
                'institution_id' => $request->input('institution_id'),
                // Other fields you need to insert
            ]);
        }



        // Redirect or return a response as needed
        return redirect()->back()->with('success', 'Application Submitted successfully');
    }



    public function DashboardDataCount()
    {

        $ApplicationSubmitted = ApplicationForm::count();


        print_r($ApplicationSubmitted);
        die();
        return view('recruiter.panel.dashboard', compact());
    }
}
