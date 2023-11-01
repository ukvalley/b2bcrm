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
        return view('recruiter.panel.application.application',compact('Student'));
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
            'e_address' => 'required',
            'lang_of_c' => 'required',
            'disablility' => 'required',
           
        ]);
      

// print_r($validatedData ); die();

        // Create a new user or institution profile in your database
    $personal = new ApplicationPersonal();
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
    $personal->e_address =  $validatedData['e_address'];
    $personal->lang_of_c =  $validatedData['lang_of_c'];
    $personal->disability =  $validatedData['disablility'];
    // Add other user-specific fields as needed

    // Save the user
    $personal->save();

    // $education = new ApplicationEducation();
    // $education->personal_id =  $personal->id;
    // $education->title1 =  $validatedData['title1'];
    // $education->title2 =  $validatedData['title2'];
    // $education->address2 =  $validatedData['address2'];

    // $education->save();
        // Redirect to the next step of the registration process
        return redirect()->back();
    }





    //education

    
    public function educationUpdate(Request $request,$personal_id)
    
    {  
        $validatedData = $request->validate([
            'title1' => 'required|string|max:255',
            'title2' => 'required|string|max:255',
            'address2' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'credit_transfer' => 'required|string|max:255',
            'puniversity'=> 'required|string|max:255',
            'gap'=> 'required|string|max:255',
            'pre_applied'=> 'required|string|max:255',
            'pen'=> 'required|string|max:255',
            'CEGEP'=> 'required|string|max:255',
            'english_school'=> 'required|string|max:255',
            'language'=> 'required|string|max:255',
            'main_language'=> 'required|string|max:255',
            's_study_date'=> 'required|string|max:255',
            'school_name'=> 'required|string|max:255',
            'completed_study'=> 'required|string|max:255',
            'course_title'=> 'required|string|max:255',
            'result'=> 'required|string|max:255',
            'equivalence'=> 'required|string|max:255',
            'currently_studying'=> 'required|string|max:255',
            'previous_study'=> 'required|string|max:255',
            's_country' => 'required|string|max:255',
            's_institution' => 'required|string|max:255',
            'completed_successfully' => 'required|string|max:255',
            'study_fultime' => 'required|string|max:255',
         
 
       ]);
       
       $education = ApplicationEducation::find($personal_id);

       $education->title1 =  $validatedData['title1'];
        $education->title2 =  $validatedData['title2'];
        $education->address2 =  $validatedData['address2'];
        $education->university =  $validatedData['university'];
        $education->credit_transfer =  $validatedData['credit_transfer'];
        $education->puniversity =  $validatedData['puniversity'];
        $education->gap =  $validatedData['gap'];
        $education->pre_applied =  $validatedData['pre_applied'];
        $education->pen =  $validatedData['pen'];
        $education->CEGEP =  $validatedData['CEGEP'];
        $education->english_school =  $validatedData['english_school'];
        $education->language =  $validatedData['language'];
        $education->main_language =  $validatedData['main_language'];
        $education->s_study_date =  $validatedData['s_study_date'];
        $education->school_name =  $validatedData['school_name'];
        $education->completed_study =  $validatedData['completed_study'];
        $education->course_title =  $validatedData['course_title'];
        $education->result =  $validatedData['result'];
        $education->equivalence =  $validatedData['equivalence'];
        $education->currently_studying =  $validatedData['currently_studying'];
        $education->previous_study =  $validatedData['previous_study'];
        $education->s_country =  $validatedData['s_country'];
        $education->s_institution =  $validatedData['s_institution'];
        $education->completed_successfully =  $validatedData['completed_successfully'];
        $education->study_fultime =  $validatedData['study_fultime'];


       $education->update();
        return redirect()->back();
    }

//language
    public function languageUpdate(Request $request,$personal_id)
    
    {  
        $validatedData = $request->validate([
            'experience' => 'required|string|max:255',
            'employment_status' => 'required|string|max:255',
            'first_language' => 'required|string|max:255',
            'language_known' => 'required|string|max:255',
            'proficiency' => 'required|string|max:255',
            'language_demo' => 'required|string|max:255',
            'eng_course' => 'required|string|max:255',
         
 
       ]);
       
       $education = ApplicationEducation::find($personal_id);

       $education->experience =  $validatedData['experience'];
       $education->employment_status =  $validatedData['employment_status'];
       $education->first_language =  $validatedData['first_language'];
       $education->language_known =  $validatedData['language_known'];
       $education->proficiency =  $validatedData['proficiency'];
       $education->language_demo =  $validatedData['language_demo'];
       $education->eng_course =  $validatedData['eng_course'];


       $education->update();
        return redirect()->back();
    }

//administration
    public function adminstrationUpdate(Request $request,$personal_id)
    
    {  
        $validatedData = $request->validate([
            'r_contact_details' => 'required|string|max:255',
            'agent_contact' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'contact_mobile' => 'required|string|max:255',
            'contact_email' => 'required|string|max:255',
            'passport' => 'required|string|max:255',
            'passport_number' => 'required|string|max:255',
            'visa' => 'required|string|max:255',
            'visa_apply_note' => 'required|string|max:255',
            'married' => 'required|string|max:255',
            'citizenship' => 'required|string|max:255',
            'app_submitted_from' => 'required|string|max:255',
            'status_in_canada' => 'required|string|max:255',
            'sponcership_gov' => 'required|string|max:255',
            'receive_scholarship' => 'required|string|max:255',
            'medical_agreement' => 'required|string|max:255',
         
 
       ]);
       
       $education = ApplicationEducation::find($personal_id);
       $education->r_contact_details =  $validatedData['r_contact_details'];
       $education->agent_contact =  $validatedData['agent_contact'];
       $education->contact_name =  $validatedData['contact_name'];
       $education->contact_mobile =  $validatedData['contact_mobile'];
       $education->contact_email =  $validatedData['contact_email'];
       $education->passport =  $validatedData['passport'];
       $education->passport_number =  $validatedData['passport_number'];
       $education->visa =  $validatedData['visa'];
       $education->visa_apply_note =  $validatedData['visa_apply_note'];
       $education->married =  $validatedData['married'];
       $education->citizenship =  $validatedData['citizenship'];
       $education->app_submitted_from =  $validatedData['app_submitted_from'];
       $education->status_in_canada =  $validatedData['status_in_canada'];
       $education->sponcership_gov =  $validatedData['sponcership_gov'];
       $education->receive_scholarship =  $validatedData['receive_scholarship'];
       $education->medical_agreement =  $validatedData['medical_agreement'];


       $education->update();
        return redirect()->back();
    }


    //preference
    public function preferenceUpdate(Request $request,$personal_id)
    
    {  
        $validatedData = $request->validate([
            'admission_note' => 'required|string|max:255',

       ]);
       
       $education = ApplicationEducation::find($personal_id);
       $education->admission_note =  $validatedData['admission_note'];


       $education->update();
        return redirect()->back();
    }






    public function DocumentsUpload($id)
    {
        $Student = Student::find($id);
        return view('recruiter.panel.application.Documents',compact('Student'));
    }


}
