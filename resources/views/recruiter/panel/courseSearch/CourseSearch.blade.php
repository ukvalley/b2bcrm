@extends('recruiter.panel.layout')

@section('content')

<!-- Begin page -->
 <!-- Begin page -->
   
         <div class="main-container container">
            <!-- welcome user -->
            


        <!-- Student Registration Step 1 Form -->
        <div class="row">
            <div class="col-12">
                



                   



                <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-auto">
                            <figure class="avatar avatar-60 rounded-10">
                                <img src="{{url('/')}}/public/images/avatar/{{$Student->avatar OR '1696936589_a-happy-indian-cartoon-a-young-male-wearing-a-suite-322338942.png'}}" alt="">
                            </figure>
                        </div>
                        <div class="col px-0 align-self-center">
                            <h3 class="mb-0 text-color-theme">{{$Student->first_name}}</h3>

                            
                            <p class="text-muted ">{{$Student->signup_city}}, {{$Student->signup_country}}</p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    
                <div class="row p-3">

                 <div class="col-md-10"> 

                <div class="row p3 mb-3">
                    <div class="col-md-4">
                    <p class="font-weight-bold"><i class="bi bi-phone-fill"></i>: <span class="text-muted">{{$Student->phone_number}}</span></p>
                    </div>
                    <div class="col-md-4">
                    <p class="font-weight-bold"><i class="bi bi-envelope-at-fill"></i>: <a href="mailto:user@example.com">{{$Student->email}}</a></p>
                    </div>
                    <div class="col-md-4">
                    <p class="font-italic"><i class="bi bi-pin-map-fill"></i>: {{$Student->address}}</p>
                    </div>


                </div>

                </div>  

                <div class="col-md-2">
                
                     <button type="button" class="btn btn-warning"  id="submitNote" data-bs-toggle="modal" data-bs-target="#myModal">
                        Add Notes
                      </button>

                </div>



            </div>

            <hr>

                



                <div style="" class="col-md-12 flex ">
                    
                  <!-- Example single danger button -->
                  
                    
                    <div class="btn-group mb-1 m3">
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Student Information
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('/')}}/agent/PreviewStudents/{{$Student->id}}">Activity & Overview</a>
                        <a class="dropdown-item" href="{{url('/')}}/agent/StudentBasicUpdate/{{$Student->id}}">Student Details</a>
                        
                      </div>
                    </div>
                    


                    
                    <div class="btn-group mb-1 m3">
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Search & Apply
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Course Search</a>
                        <a class="dropdown-item" href="#">Shortlist</a>
                        <a class="dropdown-item" href="#">Application form</a>
                       
                        <a class="dropdown-item" href="#">Documents</a>
                        <a class="dropdown-item" href="#">Review & Submit</a>
                        <a class="dropdown-item" href="#">Visa Information</a>
                      </div>
                    </div>
                    

                     <div class="btn-group mb-1 m3">
                      <button type="button" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Applications
                      </button>
                    
                    </div>
                    

               

                </div>













                


                </div>







                    
                </div>
            </div>
                    




            <x-course-filter-view :student="$Student" :courses="$courses" />












      

                    </div>

                
               

               


                
            </div>





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
