@extends('recruiter.panel.layout')

@section('content')

<!-- Begin page -->
 <!-- Begin page -->
   
         <div class="main-container container">
            <!-- welcome user -->
            


        <!-- Student Registration Step 1 Form -->
        <div class="row">
            <div class="col-12">
                



                   



                

                



                @include('recruiter.panel.studentView.student_navbar')













                


                </div>







                    
            </div>
            </div>

           



            












      

                    </div>

                
               

               

 


                    <div class="card">
  <h5 class="card-header">ShortLists</h5>
  <div class="card-body">
    <p>Click the shortlist button on any course in your "Saved Courses" to add it to your Shortlist, then rank them in order of preference using the arrows.</p>
  </div>

  <div class="card">
   <div class="col-md-12">
    <div class="row">

    <div class="col-md-3 d-flex justify-content-center align-items-center">
    <img src="{{url('/')}}/theme/icons/message-empty-state.png" style="width: 50%;" alt="">
</div>
    <div class="col-md-6">
        <h4>Master of Business Administration (Levene MBA)</h3><br>
        <h5>University of Regina</h5>
        <h5>Canada</h5>
        
    </div>
    <div class="col-md-3">
        <br>
        <button type="button" class="btn btn-outline-primary btn-sm">Shortlist</button>
        
        </div>
    </div>
    <hr>

    <div class="row">

    <div class="col-md-3">
      <h5>Tuition Fee </h5>CAD 14,000 per term
      </div>
    <div class="col-md-3">
       
        <h5>Mode </h5>On Campus
    </div>
    <div class="col-md-3">
        <h5>Duration </h5>16 months
        </div>
        <div class="col-md-3">
          <h5>Preferred Intake</h5>
September 2024
        </div>
    </div>
    
   </div>
 
</div>
</div>
      

</div>

<!-- shortlist card -->






            <!-- Modal -->
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
            
            <input type="hidden" value="{{$Student->id}}" class="form-control" id="student_id" name="student_id"/>
            <input type="hidden" value="{{Auth::User()->id}}" class="form-control" id="recruiter_id" name="recruiter_id"/>
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


        








    <!-- Main page content ends -->
</div>
</main>
<!-- Page ends -->

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Include DataTables script -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script src="path/to/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>



<script>
    // JavaScript validation
    document.getElementById("addNotesForm").addEventListener("submit", function (event) {
        const notesContent = document.getElementById("notesContent").value;
        const communicationMedium = document.querySelector('input[name="communicationMedium"]:checked');

        if (!notesContent || !communicationMedium) {
            alert("Both fields are required.");
            event.preventDefault();
        }
    });
</script>



@endsection
