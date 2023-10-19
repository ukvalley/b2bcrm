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
                        
                        <div class="col px-0 align-self-center">
                            <h3 class="mb-0 text-color-theme">{{$course->name}}</h3>

                            
                            <p class="text-muted ">{{$course->level}}, {{$course->course_code}}</p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    
                <div class="row p-3">

                 <div class="col-md-10"> 

                <div class="row p3 mb-3">
                    <div class="col-md-4">
                    <p class="font-weight-bold"><i class="bi bi-phone-fill"></i>: <span class="text-muted">{{$course->currency}}</span></p>
                    </div>
                    <div class="col-md-4">
                    <p class="font-weight-bold"><i class="bi bi-envelope-at-fill"></i>: <a href="mailto:user@example.com">{{$course->email}}</a></p>
                    </div>
                    <div class="col-md-4">
                    <p class="font-italic"><i class="bi bi-pin-map-fill"></i>: {{$course->address}}</p>
                    </div>


                </div>

                </div>  

                <div class="col-md-2">
                
                     <button type="button" class="btn btn-warning"  id="submitNote">
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
                    





      

                    </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h3>Activity</h3>
                    </div>

                    <div class="card-body">
                        <div class="col-md-12 flex scroll-container">
                            <div class="d-flex flex-nowrap">
                            <button class="btn btn-outline-primary m3">Message</button>
                            <button class="btn btn-outline-primary m3">Task</button>
                            <button class="btn btn-outline-primary m3">Notes</button>
                            <button class="btn btn-outline-primary m3">Timeline</button>
                            </div>
                        </div>


                        <div class="col-md-12" id="messgae">
                            
                        </div>
                        
                    </div>
                </div>
               


                <div class="card mt-3">
                    <div class="card-header">
                   <h3>Overview</h3> 
                </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 p-3"><p class=""><span class="text-muted"> Email: </span> <br> <span class="font-weight-bold">{{$Student->email}}</span> </p> 
                            </div>

                            <div class="col-md-6 p-3"><p class=""><span class="text-muted"> Phone: </span> <br> <span class="font-weight-bold">{{$Student->phone_number}}</span> </p> 
                            </div>

                            <div class="col-md-6 p-3"><p class=""><span class="text-muted"> Nationality: </span> <br> <span class="font-weight-bold">{{$Student->nationality}}</span> </p> 
                            </div>

                            <div class="col-md-6 p-3"><p class=""><span class="text-muted"> Address: </span> <br> <span class="font-weight-bold">{{$Student->address}}</span> </p> 
                            </div>


                            <div class="col-md-6 p-3"><p class=""><span class="text-muted"> CIVS Student ID: </span> <br> <span class="font-weight-bold">{{$Student->id}}</span> </p> 
                            </div>

                            <div class="col-md-6 p-3"><p class=""><span class="text-muted"> Lead Status: </span> <br> <span class="font-weight-bold">{{$Student->lead_status}}</span> </p> 
                            </div>


                            <div class="col-md-6 p-3"><p class=""><span class="text-muted"> Prospect Ratings: </span> <br> <span class="font-weight-bold">{{$Student->prospect_rating}}</span> </p> 
                            </div>

                            



                        </div>


                    </div>
                </div>
            </div>





            <div id="addNoteModal" class="modal">
            <div class="modal-content">
                <h4>Add Note</h4>
                <form id="noteForm">
                    <div class="input-field">
                        <select id="medium" name="medium">
                            <option value="" disabled selected>Select Conversation Medium</option>
                            <option value="Phone">Phone</option>
                            <option value="Email">Email</option>
                            <option value="In-Person">In-Person</option>
                        </select>
                        <label for="medium">Conversation Medium</label>
                    </div>
                    <div class="input-field">
                        <textarea id="note" name="note" class="materialize-textarea"></textarea>
                        <label for="note">Note</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
                <a href="#" class="waves-effect waves-light btn" id="submitNote">Submit</a>
            </div>
        </div>


        <div id="addNoteModal" class="modal">
    <div class="modal-content">
        <h4>Add Note</h4>
        <form id="noteForm">
            <div class="input-field">
                <select id="medium" name="medium">
                    <option value="" disabled selected>Select Conversation Medium</option>
                    <option value="Phone">Phone</option>
                    <option value="Email">Email</option>
                    <option value="In-Person">In-Person</option>
                </select>
                <label for="medium">Conversation Medium</label>
            </div>
            <div class="input-field">
                <textarea id="note" name="note" class="materialize-textarea"></textarea>
                <label for="note">Note</label>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
        <a href="#" class="waves-effect waves-light btn" id="submitNote">Submit</a>
    </div>
</div>








    <!-- Main page content ends -->
</div>
</main>
<!-- Page ends -->

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Include DataTables script -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function () {
    $('.modal').modal();
});
    </script>



@endsection
