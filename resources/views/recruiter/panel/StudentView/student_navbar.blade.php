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
                        <a class="dropdown-item" href="{{route('agent.CourseSearch', ['id' => $Student->id])}}">Course Search</a>
                        <a class="dropdown-item" href="{{route('agent.ShortListView', ['id' => $Student->id])}}">Shortlist</a>
                        <a class="dropdown-item" href="{{route('agent.showApplicationForm', ['id' => $Student->id])}}">Application form</a>
                        <a class="dropdown-item" href="{{route('agent.DocumentsUpload', ['id' => $Student->id])}}">Documents</a>
                        <a class="dropdown-item" href="{{route('agent.ReviewForm', ['id' => $Student->id])}}">Review & Submit</a>
                        <a class="dropdown-item" href="{{route('agent.ViewVisaApplication', ['id' => $Student->id])}}">Visa Information</a>
                      </div>
                    </div>
                    

                     <div class="btn-group mb-1 m3">
                      <button type="button" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Applications
                      </button>
                    
                    </div>
                    

               

  </div>