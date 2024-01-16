@extends('recruiter.panel.layout')

@section('content')

<!-- Begin page -->
<!-- Begin page -->
<div class="main-container container">

  <div class="row">
    <div class="col-12">


      @include('recruiter.panel.studentView.student_navbar')

    </div>
  </div>





  <br>
  <div class="card shadow-sm">
    <div class="card-body">
      <h4>Visa Information</h4>
      <p>Complete this form when the student is ready to apply for a visa. It is not needed as part of your application to an institution.

      <p>Note: Remember to click the save button to save the information in each section.</p>
      <p>Countries : Canada.</p>
      </p>


    </div>
  </div>

  <br>




  <div id="accordion">
    <div class="card">
      <div class="card-header">
        <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
          Administration
        </a>
      </div>


      <div id="collapseOne" class="collapse" data-bs-parent="#accordion">
        <div class="card-body">
          <form class="mt-3" method="POST" action="{{ route('agent.VisaApplicationForm') }}">
            @csrf


            <input type="hidden" name="student_id" value="{{$Student->id}}">

            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif


            <div class="checkbox">
              <label><b>Do you currently hold a visa in any country or to which you are applying?(required)</b></label><br>
              <input class="check" id="current_visa" name="current_visa" type="radio" value="Not_Applicable" {{ old('current_visa', $Visa->current_visa) == 'Not_Applicable' ? 'checked' : '' }}>
              <b>Not Applicable</b><br>
              <input class="check" id="Yes" name="current_visa" type="radio" value="Yes" value="Not_Applicable" {{ old('current_visa', $Visa->current_visa) == 'Yes' ? 'checked' : '' }}>
              <b>Yes</b><br>
              <input class="check" id="No" name="current_visa" type="radio" value="No" value="Not_Applicable" {{ old('current_visa', $Visa->current_visa) == 'No' ? 'checked' : '' }}>
              <b>No</b><br>

            </div>
            @error('current_visa')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>

            <label for="current_visa_application"><b>When do you intend to apply for a current visa for the country you are applying to?</b></label>
            <input class="form-control" type="text" id="current_visa_application" value="{{ old('current_visa_application', $Visa->current_visa_application ?? '') }}" name="current_visa_application" placeholder="As soon as possible" required="">
            @error('current_visa_application')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror


            <label for="criminal_activity"><b>Have you and/or your dependants (including your spouse) ever been convicted of any criminal activity?</b></label>
            <textarea class="form-control" type="text" id="criminal_activity" name="criminal_activity">{{ old('criminal_activity', $Visa->criminal_activity ?? '') }}</textarea>
            @error('criminal_activity')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror


            <div class="checkbox">
              <label><b>Have you previously held a visa in any country or to which you are applying?(required)
                </b></label><br>
              <input class="check" id="old_visa" name="old_visa" type="radio" value="No" {{ old('old_visa', $Visa->old_visa) == 'No' ? 'checked' : '' }}>
              <b>No</b><br>
              <input class="check" id="old_visa" name="old_visa" type="radio" value="Yes" {{ old('old_visa', $Visa->eng_course) == 'yes' ? 'checked' : '' }}>
              <b>Yes</b><br>


            </div>
            @error('old_visa')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>

            <div class="checkbox">
              <label><b>Do you have an immediate family member (parent/sibling) residing in the countries to which you are applying?(required)
                </b></label><br>
              <input class="check" id="sibling" name="sibling" type="radio" value="Not_Applicable" {{ old('sibling', $Visa->sibling) == 'Not_Applicable' ? 'checked' : '' }}>
              <b>Not Applicable</b><br>
              <input class="check" id="sibling" name="sibling" type="radio" value="No" {{ old('sibling', $Visa->sibling) == 'No' ? 'checked' : '' }}>
              <b>No</b><br>
              <input class="check" id="sibling" name="sibling" type="radio" value="Yes" {{ old('sibling', $Visa->sibling) == 'No' ? 'checked' : '' }}>
              <b>Yes</b><br>
            </div>
            @error('sibling')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>

            <hr>
            <label for="married"><b>Are you currently married? Date of Marriage:(required)</b></label>
            <input class="form-control" type="text" id="married" value="{{ old('married', $Visa->married ?? '') }}" name="married" placeholder="Yes/No ,Date of Marriage " required="">
            @error('married')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror


            <div class="checkbox">
              <label><b>Do you intend to bring your spouse with you?(required)

                </b></label><br>
              <input class="check" id="spouse" name="spouse" type="radio" value="Not_Applicable" {{ old('spouse', $Visa->spouse) == 'Not_Applicable' ? 'checked' : '' }}>
              <b>Not Applicable</b><br>
              <input class="check" id="spouse" name="spouse" type="radio" value="No" {{ old('spouse', $Visa->spouse) == 'No' ? 'checked' : '' }}>
              <b>No</b><br>
              <input class="check" id="spouse" name="spouse" type="radio" value="Yes" {{ old('spouse', $Visa->spouse) == 'Yes' ? 'checked' : '' }}>
              <b>Yes</b><br>
            </div>
            @error('spouse')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>
            <div class="checkbox">
              <label><b>Do you have any children?

                </b></label><br>
              <input class="check" id="child" name="child" type="radio" value="Not_Applicable" {{ old('child', $Visa->child) == 'Not_Applicable' ? 'checked' : '' }}>
              <b>Not Applicable</b><br>
              <input class="check" id="child" name="child" type="radio" value="No" {{ old('child', $Visa->child) == 'No' ? 'checked' : '' }}>
              <b>No</b><br>
              <input class="check" id="child" name="child" type="radio" value="Yes" {{ old('child', $Visa->child) == 'Yes' ? 'checked' : '' }}>
              <b>Yes</b><br>
            </div>
            @error('child')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>

            <hr>



            <label for="funding"><b>How are you funding your university studies?</b></label>
            <select class="form-control" id="funding" name="funding" value="{{ old('funding', $Visa->funding ?? '') }}">
              <option value="Self"> Self</option>
              <option value="Loan"> Loan </option>
              <option value="Funding">Funding</option>
              <option value="Scholarship/Sponsorship Goverment">Scholarship/Sponsorship Goverment</option>
              <option value="Scholarship/Sponsorship Private">Scholarship/Sponsorship Private</option>
              <option value="Family"> Family</option>
              <option value="Other"> Other</option>


            </select>
            @error('funding')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror



            <div class="checkbox">
              <label><b>Do you have sufficient funds to support your studies and living expenses while studying?
                </b></label><br>

              <input class="check" id="s_fund" name="s_fund" type="radio" value="No" {{ old('s_fund', $Visa->s_fund) == 'No' ? 'checked' : '' }}>
              <b>No</b><br>
              <input class="check" id="s_fund" name="s_fund" type="radio" value="Yes" {{ old('s_fund', $Visa->s_fund) == 'Yes' ? 'checked' : '' }}>
              <b>Yes</b><br>
            </div>
            @error('s_fund')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>

            <hr>

            <label for="r_sponcer"><b>Have you applied for or received sponsorship from your home government or any other foreign agency?</b></label>
            <input class="form-control" type="text" id="r_sponcer" value="{{ old('r_sponcer', $Visa->r_sponcer ?? '') }}" name="r_sponcer" placeholder="Yes/No" required="">
            @error('r_sponcer')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror


            <div class="checkbox">
              <label><b>Have you been awarded a scholarship or sponsorship?
                  ?
                </b></label><br>

              <input class="check" id="award" name="award" type="radio" value="No" {{ old('award', $Visa->award) == 'No' ? 'checked' : '' }}>
              <b>No</b><br>
              <input class="check" id="award" name="award" type="radio" value="Yes" {{ old('award', $Visa->award) == 'Yes' ? 'checked' : '' }}>
              <b>Yes</b><br>
            </div>
            @error('award')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>
            <label for="s_occupation"><b>Please provide the occupation of your sponsor.</b></label>
            <input class="form-control" type="text" id="s_occupation" value="{{ old('s_occupation', $Visa->s_occupation ?? '') }}" name="s_occupation" placeholder="Yes/No" required="">
            @error('s_occupation')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror



            <label for="visa_funding"><b>How will your sponsor show funding/other for your visa?</b></label>
            <select class="form-control" id="visa_funding" name="visa_funding" value="{{ old('visa_funding', $Visa->visa_funding ?? '') }}">
              <option value="1"> Funds available in fixed deposits/savings account/current account/NRFC account</option>
              <option value="2"> Personal loan for education purpose from a reputed financial institution approved by the central bank and disbursed to fixed deposits/savings account/current account/NRFC account </option>
              <option value="3">Mortgage loan for education purpose from a reputed financial institution approved by the central bank and disbursed to fixed deposits/savings account/current account/NRFC account</option>
              <option value="other"> Other</option>


            </select>
            @error('visa_funding')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="col-lg-12" style="text-align: right;">


              <button type="submit" class="btn btn-success" id="save-edit"><i class="fa-solid fa-floppy-disk"></i> Save and Continue</button>


            </div>
          </form>

        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <a class="btn" data-bs-toggle="collapse" href="#collapseOne1">
            Course Preferences
          </a>
        </div>
        <div id="collapseOne1" class="collapse" data-bs-parent="#accordion">
          <div class="card-body">
            <form class="mt-3" method="POST" action="{{ route('agent.VisaUpdate') }}">
              @csrf
              @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
              <input type="hidden" name="student_id" value="{{$Student->id}}">

              <label for="note"><b>Notes for your course selection details for administration</b></label>
              <textarea class="form-control" type="text" id="note" name="note">{{ old('note', $Visa->note ?? '') }}</textarea>
              @error('note')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror

              <div class="col-lg-12" style="text-align: right;">


                <button type="submit" class="btn btn-success" id="save-edit"><i class="fa-solid fa-floppy-disk"></i> Save and Continue</button>


              </div>
            </form>

          </div>
        </div>

      </div>
      <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Notes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{route('agent.StudentAddNotes')}}" method="POST" id="addNotesForm">

                    @csrf
                    <div class="form-group">
                        <label for="notesContent">Notes Content</label>
                        <textarea class="form-control" id="notesContent" name="notesContent" rows="5" style="height: 200px;"></textarea>
                    </div>

                    <div class="form-group">

                        <input type="hidden" value="{{$Student->id}}" class="form-control" id="student_id" name="student_id" />
                        <input type="hidden" value="{{$recruiter->id}}" class="form-control" id="recruiter_id" name="recruiter_id" />
                    </div>

                    <div class="form-group">
                        <label for="communicationMedium">Select Communication Medium</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="communicationMedium" id="whatsapp" value="whatsapp">
                            <label class="form-check-label" for="whatsapp">Whatsapp</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="communicationMedium" id="messages" value="messages">
                            <label class="form-check-label" for="messages">Messages</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="communicationMedium" id="email" value="email">
                            <label class="form-check-label" for="email">Email</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="communicationMedium" id="faceToFace" value="faceToFace">
                            <label class="form-check-label" for="faceToFace">Face to Face</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="communicationMedium" id="videoCall" value="videoCall">
                            <label class="form-check-label" for="videoCall">Video Call</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="communicationMedium" id="other" value="other">
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>



            </div>

        </div>
    </div>
</div>
    </div>

    <!-- Page ends -->

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Include DataTables script -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script src="path/to/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>



    <script>
      // JavaScript validation
      document.getElementById("addNotesForm").addEventListener("submit", function(event) {
        const notesContent = document.getElementById("notesContent").value;
        const communicationMedium = document.querySelector('input[name="communicationMedium"]:checked');

        if (!notesContent || !communicationMedium) {
          alert("Both fields are required.");
          event.preventDefault();
        }
      });
    </script>

    <script>
      // JavaScript validation
      document.getElementById("addNotesForm").addEventListener("submit", function(event) {
        const notesContent = document.getElementById("notesContent").value;
        const communicationMedium = document.querySelector('input[name="communicationMedium"]:checked');

        if (!notesContent || !communicationMedium) {
          alert("Both fields are required.");
          event.preventDefault();
        }
      });
    </script>

    @endsection