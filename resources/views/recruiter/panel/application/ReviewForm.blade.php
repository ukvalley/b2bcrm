@extends('recruiter.panel.layout')

@section('content')

<div class="main-container container">
            <!-- welcome user -->
            
            <style>
    .bordered-table {
        border-collapse: collapse;
        width: 100%;
    }

    .bordered-table th, .bordered-table td {
        border: 1px solid #000;
        padding: 8px;
        text-align: center;
    }
    .form1 { font-weight: 600;

    }


</style>

        <form class="mt-3" method="POST" action="{{ route('agent.SubmitApplicationForm') }}">
         @csrf

        <!-- Student Registration Step 1 Form -->
        <div class="row">
            <div class="col-12">
                

            @include('recruiter.panel.studentView.student_navbar')

                </div>         
            </div>




            </div>


            <div class="col-12">

            <div class="card shadow-sm">
                <div class="card-body" style="background:#3c63e2">
                <h4>{{ $ManditoryCount - $MandatoryCount1 }}
 Mandatory documents missing</h4>
                </div>
            </div>

            <br>
            <div class="card shadow-sm">
                <div class="card-body">
                <h4>Review Application</h4>
                <p>Please review all information before submitting. As soon as this form is sent, our in-country representatives will review and be in touch.</p>
               
                   
                </div>
            </div>
           
        <br> 

        <div class="card shadow-sm">
    <div class="card-body">
        <h4>Course List</h4>
        <table class="bordered-table">
            <thead>
                <tr>
                    
                    <th>Course ID</th>
                    <th>Institution</th>
                    <th>Course Title</th>
                    <th>Country</th>
                    <!-- <th>Select</th> -->
                </tr>
            </thead>
            <tbody>
                <!-- You can add table rows with data here -->
                @foreach ($Shortlist as $course)
                <tr>
                <th>{{ $course->course_id }}</th>
                
                    <th>{{ $course->institution_name }}</th>
                    <th>{{ $course->course_name }}</th>
                    <th>{{ $course->country_name }}</th>
                   
                   
                    <input type="hidden" name="selected_courses[]" value="{{ $course->course_id }}">
            <!-- Visible checkbox for styling -->
            <!-- <input type="checkbox" class="hidden-checkbox" checked> -->
            <input type="hidden" value="{{$Student->id}}" class="form-control" id="student_id" name="student_id" />
            <input type="hidden" value="{{ $course->institution_id }}" class="form-control" id="institution_id" name="institution_id" />
            <!-- <input type="hidden" name="selected_institutions[]" value="{{ $course->institution_id }}"> -->


                    </th>
                </tr>
                @endforeach
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</div>

           
        <br> 
        <div class="card shadow-sm">
        <div class="card-body">
           
            <div class="row">
                <div class="col-md-8">
                    <H3>Visa Application</H3>
                </div>
                <div class="col-md-4">
                    <a href="#req_doc" class="btn btn-default" data-bs-toggle="collapse" data-bs-target="#uploadTable">
                    Visa Application Processing
                    </a>
                </div>
               
                <div class="table-responsive collapse" id="uploadTable">
                <p class="table" id="req_doc">
    Student visa for: Canada.
    <a href="#" data-toggle="modal" data-target="#optionsModal">Edit</a>
    <br>
    <span id="selectedOption"></span>
</p>

<div class="modal" id="optionsModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select Option</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <label>
                    <input type="radio" name="visaOption" value="ProcessMyself"> I will process the Student's visa.
                </label>
                <br>
                <label>
                    <input type="radio" name="visaOption" value="UseVisaServices"> I will be using the Canada Immigration and Visa Service.
                </label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="updateOption()">Save</button>
            </div>
        </div>
    </div>
</div>
</div>


     
</div>
       
</div>
</div>
<br>
<div class="card shadow-sm">
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <H3>Application Form</H3>
        <hr>
      </div>
      
      <div class="col-md-12">
        <h5 href="#personal" data-bs-toggle="collapse" data-bs-target="#personalv"> Personal Details </h5>
        <hr>
      </div>
      
      <div class="table-responsive collapse" id="personalv">
        <div class="table" id="personal">
          <div class="card shadow-sm">
            <div class="card-body">
              <p class="form1">What is your title? *</p>
              <span>{{ old('title', $App_data->title ?? '') }}</span>
              <p class="form1">Given Name(s):</p>
              <span>{{ old('fname', $App_data->fname ?? '') }}</span>
              <p class="form1">Please enter your full name as per passport (first name , family name) *</p>
              <span>{{ old('pname', $App_data->pname ?? '') }}</span>
              <p class="form1">Preferred Name:</p>
              <span>{{ old('pname', $App_data->pname ?? '') }}</span>
              <p class="form1">Have you ever used any other names?</p>
              <span>No</span>
              <p class="form1">Date of Birth: *</p>
              <span>{{ old('dob', $App_data->dob ?? '') }}</span>
              <p class="form1">Does the applicant identify with a gender identity that does not align with their sex designation?</p>
              <span>{{ old('gender', $App_data->gender ?? '') }}</span>
              <p class="form1">Nationality (on passport):</p>
              <span>{{ old('nationality', $App_data->nationality ?? '') }}</span>
              <p class="form1">Ethnicity:</p>
              <span>{{ old('ethnicity', $App_data->ethnicity ?? '') }}</span>
              <p class="form1">Which city and country were you born in? (city, country)</p>
              <span>{{ old('born', $App_data->born ?? '') }}</span>
              <p class="form1">In which country were you born?</p>
              <span>{{ old('born', $App_data->born ?? '') }}</span>
            </div>
          </div>
          <br>
          <div class="card shadow-sm">
            <div class="card-body">
              <p class="form1">Current Postal Address (street, city state, postcode, country) *</p>
              <span>{{ old('address', $App_data->address ?? '') }}</span>
              <p class="form1">Which city do you live in?</p>
              <span>{{ old('city', $App_data->city ?? '') }}</span>
              <p class="form1">Please enter your full name as per passport (first name , family name) What State/Province/Territory do you live in?</p>
              <span>{{ old('province', $App_data->province ?? '') }}</span>
              <p class="form1">What is your street address?</p>
              <span>{{ old('address', $App_data->address ?? '') }}</span>+ <p class="form1">What is your postcode (zip code)?</p>
              <span>{{ old('postcode', $App_data->postcode ?? '') }}</span>
              <p class="form1">Is your residential address the same as your postal address?</p>
              <span></span>
              <p class="form1">What is your preferred postal address?</p>
              <span></span>
            </div>
          </div>
          <br>
          <div class="card shadow-sm">
            <div class="card-body">
              <p class="form1">Are you currently living in the country you are applying to?</p>
              <span>{{ old ('current_country', $App_data->current_country ?? '') }}</span>
            </div>
          </div>
          <br>
          <div class="card shadow-sm">
            <div class="card-body">
              <p class="form1">What is your email address? *</p>
              <span>{{ old('email', $App_data->email ?? '') }}</span>
              <p class="form1">What is your home phone number?</p>
              <span>{{ old('phone', $App_data->phone ?? '') }}</span>
              <p class="form1">What is your mobile (cell) phone number?</p>
              <span>{{ old('cell', $App_data->cell ?? '') }}</span>
              <p class="form1">What is your work phone number?</p>
              <span>{{ old('number', $App_data->number ?? '') }}</span>
              <p class="form1">What is your secondary email address?</p>
              <span>{{ old('semail', $App_data->semail ?? '') }}</span>
              <p class="form1">WhatsApp ID:</p>
              <span>{{ old('wid', $App_data->wid ?? '') }}</span>
              <p class="form1">Please list two emergency contacts below. (Indicate relationship and contact information for both.)</p>
              <span>{{ old('e_address', $App_data->e_address ?? '') }}</span>
              <p class="form1">Language of Correspondence:</p>
              <span>{{ old('lang_of_c', $App_data->lang_of_c ?? '') }}</span>
            </div>
          </div>
          <br>
          <div class="card shadow-sm">
            <div class="card-body">
              <p class="form1">Do you have a disability, impairment or medical condition which may affect your studies?</p>
              <span>{{ old('disability', $App_data->disability ?? '') }}</span>
            </div>
          </div>
          <br>
          <div class="card shadow-sm">
            <div class="card-body">
              <p class="form1">Do you identify yourself as an Aboriginal person that is, First Nations, Metis, Inuit?</p>
              <span>{{ old('title1', $Education_data->title1 ?? '') }}</span>
            </div>
          </div>
          <br>
          <div class="card shadow-sm">
            <div class="card-body">
              <p class="form1">What is the highest level of education completed by your parent 1 or guardian 1?</p>
              <span>{{ old('title2', $Education_data->title2 ?? '') }}</span>
            </div>
          </div>
          <br>
          <div class="card shadow-sm">
            <div class="card-body">
              <p class="form1">List all extracurricular activities from the time you completed high school until the present.</p>
              <span>{{ old('address2', $Education_data->address2 ?? '') }}</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <h5 href="#personal1" data-bs-toggle="collapse" data-bs-target="#personalv1">Education </h5>
        <hr>
      </div>
      <div class="table-responsive collapse" id="personalv1">
        <div class="table" id="personal1">
          <div class="card shadow-sm">
            <div class="card-body">
              <p class="form1">Are you a current or former student of this university/college/institution?</p>
              <span>{{ old('university', $Education_data->university ?? '') }}</span>
              <p class="form1">Are you applying for recognition of prior learning (RPL) i.e. credit transfer (CT) or credit from previous study?</p>
              <span>{{ old('credit_transfer', $Education_data->credit_transfer ?? '') }}</span>
              <p class="form1">Are you a past or present student of any other university? *</p>
              <span>{{ old('puniversity', $Education_data->puniversity ?? '') }}</span>
              <p class="form1">Are there any gaps in your education or employment history?</p>
              <span>{{ old('gap', $Education_data->gap ?? '') }}</span>
              <p class="form1">Have you previously applied to this university/college/institution?</p>
              <span>{{ old('pre_applied', $Education_data->pre_applied ?? '') }}</span>
              <p class="form1">Do you have a Personal Education Number (PEN)?</p>
              <span>{{ old('pen', $Education_data->pen ?? '') }}</span>
              <p class="form1">Quebec CEGEP Code Permanent:</p>
              <span>{{ old('CEGEP', $Education_data->CEGEP ?? '') }}</span>
              <p class="form1">Total number of years in an English-language school system outside of Canada</p>
              <span>{{ old('english_school', $Education_data->english_school ?? '') }}</span>
              
             

            </div>
            </div>
            <br>
            <div class="card shadow-sm">
            <div class="card-body">
            <h5>Secondary Education</h5>
            <p class="form1">If you have started, or completed secondary education then add the details here. if you've completed secondary multiple times you can add a second secondary section right after the first one.</p>
              <span>{{ old('language', $Education_data->language ?? '') }}</span>
              <p class="form1"> What date did you commence secondary studies?</p>
              <span>{{ old('s_study_date', $Education_data->s_study_date ?? '') }}</span>
              <p class="form1">What is the name of the school or institution you studied at?</p>
              <span>{{ old('school_name', $Education_data->school_name ?? '') }}</span>
              <p class="form1"> When did you complete, or do you expect to complete, your secondary studies?</p>
              <span>{{ old('completed_study', $Education_data->completed_study ?? '') }}</span>



            </div>
          </div>
          <br>
          <div class="card shadow-sm">
            <div class="card-body">
            <h5>Qualifications Currently Studying</h5>
            </div>
          </div>
          <br>

          
         
            </div>
            </div>
      <div class="col-md-12">
        <h5 href="#personal2" data-bs-toggle="collapse" data-bs-target="#personalv2"> Language
        </h5><hr>
      </div>
      <div class="table-responsive collapse" id="personalv2">
        <div class="table" id="personal2">
          <div class="card shadow-sm">
            <div class="card-body">
              <p class="form1">What is your first/main language?
</p>
              <span>{{ old('first_language', $Education_data->first_language ?? '') }}</span>
              <p class="form1">Number of languages you are proficient in:</p>
              <span>{{ old('language_known', $Education_data->language_known ?? '') }}</span>
              <p class="form1">Language and Proficiency:</p>
              <span>{{ old('proficiency', $Education_data->proficiency ?? '') }}</span>

            </div>
            </div>
            <br>
          <div class="card shadow-sm">
            <div class="card-body">
            <p class="form1">How will you demonstrate you meet English language requirements?</p>
              <span>{{ old('language_demo', $Education_data->language_demo ?? '') }}</span>
            </div>
          </div>
          <br>
          <div class="card shadow-sm">
            <div class="card-body">
            <p class="form1">Do you intend to study an English language course at this university/college/institution?</p>
              <span>{{ old('eng_course', $Education_data->eng_course ?? '') }}</span>
            </div>
          </div>
          <br>
            </div>
            </div>
      <div class="col-md-12">
        <h5 href="#personal3" data-bs-toggle="collapse" data-bs-target="#personalv3"> Administration </h5>
        <hr>
      </div>
      <div class="table-responsive collapse" id="personalv3">
        <div class="table" id="personal3">
          <div class="card shadow-sm">
            <div class="card-body">
              <p class="form1">Referee Contact Details: (We will assume permission to contact referees unless an applicant has stated otherwise.)</p>
              <span>{{ old('title', $Education_data->title ?? '') }}</span>

              <p class="form1">Please provide your agent's contact details.</p>
              <span>{{ old('agent_contact', $Education_data->agent_contact ?? '') }}</span>

              <p class="form1">In case we need any additional details on this application, whom should we reach out within your team ?</p>
              <span>{{ old('title', $Education_data->title ?? '') }}</span>

              <p class="form1">Name : *</p>
              <span>{{ old('contact_name', $Education_data->contact_name ?? '') }}</span>

              <p class="form1">Contact No : *</p>
              <span>{{ old('contact_mobile', $Education_data->contact_mobile ?? '') }}</span>

              <p class="form1">Email ID : *</p>
              <span>{{ old('contact_email', $Education_data->contact_email ?? '') }}</span>

              

            </div>
            </div>
            </div>
            </div>
       <div class="col-md-12">
        <h5 href="#personal4" data-bs-toggle="collapse" data-bs-target="#personalv4"> Course Preferences </h5><hr>
      </div>
      <div class="table-responsive collapse" id="personalv4">
        <div class="table" id="personal4">
          <div class="card shadow-sm">
            <div class="card-body">
              <p class="form1">Notes for your course selection details for administration</p>
              <span>{{ old('admission_note', $Education_data->admission_note ?? '') }}</span>

            </div>
            </div>
            </div>
            </div>


</div>
</div>
<div>
</div>


</div>

<div class="card shadow-sm">
    <div class="card-body" >
    <h3>Documents</h3>
    <hr>
    
    <div class="col-md-">
        <h5 href="#doc1" data-bs-toggle="collapse" data-bs-target="#docv1"> Missing Documents
        </h5><hr>
      </div>

      <div class="table-responsive collapse" id="docv1">
        <div class="table" id="doc1">
          <div class="card shadow-sm">
            <div class="card-body" style="color: white;
    background: cornflowerblue">
              <p class="form1">
                <b>Not yet uploaded ({{$MandatoryCount1 }} of {{$ManditoryCount}})</b>
                @foreach ($ManditoryDocuments as $Mdocument)
                <li>{{$Mdocument->name}}</li>
                @endforeach
               
               </p>
              
            </div>
          </div>
          <br>
</div></div>
      
      <div class="col-md-12">
        <h5 href="#doc2" data-bs-toggle="collapse" data-bs-target="#docv2"> Uploaded Documents
        </h5><hr>
      </div>
      <div class="table-responsive collapse" id="docv2">
            <table class="table" id="doc2">
                    <thead>
                        <tr>
                            <th>Document Type</th>
                            <th>Document Info</th>
                            <th>File Name</th>
                            <th>Institution</th>
                            <th>Status</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($Documents as $document)
        <tr>
            <td>{{ $document->documentType_id->name}}</td>
            <td>{{ $document->document_info }}</td> <!-- Adjust this to your data structure -->
            <td>{{ $document->file_name }}</td> <!-- Adjust this to your data structure -->
            <td>{{ $document->institution }}</td> <!-- Adjust this to your data structure -->
            <td class="text-success">{{ $document->status }}</td>
            
        </tr>
    @endforeach

                    </tbody>

                   

                </table>
            </div>
          <br>
</div></div>
      



<div class="card shadow-sm">
    <div class="card-body" style="text-align:right">
    <h5>Before submitting please complete all tasks

</h5>
    </div>
</div>
<div class="card shadow-sm">
    <div class="card-body" >
    <div class="col-12">
    <div class="row">
        <div class="col-md-6">
        @if ($MandatoryCount1 === 0)
    <p style="color: green">Documents Uploaded</p>
@else
    <p style="color: red">Unable to submit the application until the required documents are uploaded</p>
@endif
        </div>
        <div class="col-md-2">
        <a href="" class="btn btn-Primary">Documents </a>
        </div>
        <div class="col-md-4">
       
       <button type="submit">Submit Application</button>
        

     <!-- @if ($MandatoryCount1 === 0) -->
<!-- 
@else
    <a  class="btn btn-default  text-white" disabled>Complete Application</a>
@endif -->

        </div>
        
    </div>
</div>
</div>
</div>

</form>








        </section>
        




@endsection

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    function showOptions() {
        var modal = document.getElementById("optionsModal");
        modal.style.display = "block";
    }

    function updateOption() {
        var options = document.getElementsByName("visaOption");
        var selectedOption = document.getElementById("selectedOption");
        
        for (var i = 0; i < options.length; i++) {
            if (options[i].checked) {
                selectedOption.innerHTML = "Selected option: " + options[i].value;
                break;
            }
        }

        var modal = document.getElementById("optionsModal");
        modal.style.display = "none";
    }
</script>






