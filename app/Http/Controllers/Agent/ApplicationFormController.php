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

        if ($Student) {
    $App_data = ApplicationPersonal::where('student_id', $Student->id)->firstOrNew();
    // You can set any additional properties for the new record here if needed.
    $App_data->student_id = $Student->id; // For example

            // Save the record
            $App_data->save();
        } else {
                  // Handle the case where the Student with the given ID doesn't exist
        }

        
        return view('recruiter.panel.application.application',compact('Student','App_data'));
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
    $personal = ApplicationPersonal::where('student_id','=',$request->input('student_id'))->first();
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

        

//     public function personalApplicationFormUpdate(Request $request,)
    
//     {  

//         // Validate the form data
//         $validatedData = $request->validate([
//             'title' => 'required',
//             'fname' => 'required',
//             'pname' => 'required',
//             'dob' => 'required',
//             'gender' => 'required',
//             'nationality' => 'required',
//             'ethnicity' => 'required',
//             'born' => 'required',
//             'address' => 'required',
//             'city' => 'required',
//             'province' => 'required',
//             'postcode' => 'required',
//             'current_country' => 'required',
//             'email' => 'required',
//             'phone' => 'required',
//             'cell' => 'required',
//             'number' => 'required',
//             'semail' => 'required',
//             'wid' => 'required',
//             'e_address' => 'required',
//             'lang_of_c' => 'required',
//             'disablility' => 'required',
   
           
//         ]);

//         $validatedData2 = $request->validate([
//             'title1' => 'required',
//             'title2' => 'required',
//             'address2' => 'required',
           
//         ]);
      

// // print_r($validatedData ); die();

//         // Create a new user or institution profile in your database
//     $personal = new ApplicationPersonal();
//     $personal->title =  $validatedData['title'];
//     $personal->fname =  $validatedData['fname'];
//     $personal->pname =  $validatedData['pname'];
//     $personal->dob =  $validatedData['dob'];
//     $personal->gender =  $validatedData['gender'];
//     $personal->nationality =  $validatedData['nationality'];
//     $personal->ethnicity =  $validatedData['ethnicity'];
//     $personal->born =  $validatedData['born'];
//     $personal->address =  $validatedData['address'];
//     $personal->city =  $validatedData['city'];
//     $personal->province =  $validatedData['province'];
//     $personal->postcode =  $validatedData['postcode'];
//     $personal->current_country =  $validatedData['current_country'];
//     $personal->email =  $validatedData['email'];
//     $personal->phone =  $validatedData['phone'];
//     $personal->cell =  $validatedData['cell'];
//     $personal->number =  $validatedData['number'];
//     $personal->semail =  $validatedData['semail'];
//     $personal->wid =  $validatedData['wid'];
//     $personal->lang_of_c =  $validatedData['lang_of_c'];
//     $personal->disability =  $validatedData['disablility'];
   
//     // Add other user-specific fields as needed

//     // Save the user
//     $personal->save();

//     $education = new ApplicationEducation();
//     $education->personal_id =  $personal->id;
//     $education->title1 =  $validatedData2['title1'];
//     $education->title2 =  $validatedData2['title2'];
//     $education->address2 =  $validatedData2['address2'];

//     $education->save();
//         // Redirect to the next step of the registration process
//         return redirect()->back();
//     }







    //education

    
    public function educationUpdate(Request $request)
    
    {   $id=$request->input('student_id');

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


            $App_data->update();
        } else {
                  // Handle the case where the Student with the given ID doesn't exist
        }

        
        return redirect()->back();
    }
    

//language
    public function languageUpdate(Request $request)
    
    {   
         $id=$request->input('student_id');

        $validatedData = $request->validate([
            'experience' => 'required|string|max:255',
            'employment_status' => 'required|string|max:255',
            'first_language' => 'required|string|max:255',
            'language_known' => 'required|string|max:255',
            'proficiency' => 'required|string|max:255',
            'language_demo' => 'required|string|max:255',
            'eng_course' => 'required|string|max:255',
         
 
       ]);
       
       
       $Student = Student::find($id);

        if ($Student) {
    $App_data = ApplicationEducation::where('student_id', $Student->id)->firstOrNew();
    // You can set any additional properties for the new record here if needed.
    $App_data->student_id = $Student->id; // For example


       $App_data->experience =  $validatedData['experience'];
       $App_data->employment_status =  $validatedData['employment_status'];
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
       $id=$request->input('student_id');



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
       
       $Student = Student::find($id);

        if ($Student) {
    $App_data = ApplicationEducation::where('student_id', $Student->id)->firstOrNew();
    // You can set any additional properties for the new record here if needed.
    $App_data->student_id = $Student->id; // For example

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


       $App_data->update();
    } else {
              // Handle the case where the Student with the given ID doesn't exist
    }
    return redirect()->back();
}

    //preference
    public function preferenceUpdate(Request $request,)
    
    {         $id=$request->input('student_id');


        $validatedData = $request->validate([
            'admission_note' => 'required|string|max:255',

       ]);
       
       $Student = Student::find($id);

        if ($Student) {
    $App_data = ApplicationEducation::where('student_id', $Student->id)->firstOrNew();
    // You can set any additional properties for the new record here if needed.
    $App_data->student_id = $Student->id; // For example

       $education->admission_note =  $validatedData['admission_note'];


       $App_data->update();
    } else {
              // Handle the case where the Student with the given ID doesn't exist
    }
    return redirect()->back();
}






    public function DocumentsUpload($id)
    {
        $Student = Student::find($id);
        return view('recruiter.panel.application.Documents',compact('Student'));
    }


}
