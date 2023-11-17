<div class="mt-5 mb-5">
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.9/css/bootstrap-select.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.9/js/bootstrap-select.min.js"></script>

    
        <div class="card mb-3">
             <div class="card-body">
            <form method="GET">
                @csrf
                <div class="row">
                    <div class="col-md-12">

                        <h6 class="mb-3">Search Courses</h6>

                        <div class="form-group">
                            <input type="text" name="search" class="form-control" placeholder="Search courses">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Select Countries</label> <br>
                            <select multiple data-live-search="true"  name="country[]" class="form-control selectpicker">
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Select Intakes</label> <br>
                            <select multiple data-live-search="true" name="intake[]" class="selectpicker">
                                <option value="">Select Intake</option>
                                @foreach($batches as $batch)
                                <option value="{{$batch->id}}">{{$batch->year}} | {{$batch->quarter}} {{$batch->months}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <span class="text-muted mt-3">Showing Results based on your Data.</span> 




        
            @if($courses)
                @foreach($courses as $course)
                




                <div class="row mt-3">
                    <div class="col-12 card bg-gray" >
                        
                    <div class="card-header">
                        <a href="{{url('/')}}/agent/CourseDetails/{{$course->id}}">

                        <i class="bi bi-book" style="margin-right: 5px;"></i>

                        {{$course->name}} @if($course->institution->premium == 1) |  <span class="bg-green" style="text-dark;">Premium</span> @endif

                        </a>


                    @if(isset($student))
                    <div class="float-end">
                       <form method="POST" action="{{ route('agent.shortlist.add') }}">
                        @csrf
                        <input type="hidden" name="student_id" value="{{ $student->id }}">
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        @if ($student->shortlistedCourses->contains($course->id))
                       <button class="btn btn-outline-warning" type="submit">  <i class="bi bi-heart-fill"></i> Remove from Shortlist </button>
                       @else
                    
                       <button class="btn btn-outline-danger" type="submit">  <i class="bi bi-heart"></i> Add to Shortlist </button>
                       @endif

                     </form>

                    </div>
                    @endif
                    </div>

                    
                    




                    <div class="row  bg-white text-dark">
                    <div class="col-md-3 d-flex  align-items-center">
                        

                     <div class="image-container1">
                        @if(isset($course->institution->logo))
                        <img src="https://app.adventus.io/publicimages/{{$course->institution->logo}}" alt="Your Image" class="centered-image1">
                        @else
                        <img src="https://cdn.vectorstock.com/i/preview-1x/82/99/no-image-available-like-missing-picture-vector-43938299.jpg" alt="Your Image" class="centered-image1">

                        @endif
                     </div>
                 </div>

                    <div class="col-md-9">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-bank" style="margin: 5px;"></i> {{$course->institution->name}}</h5>
                        <p class="card-text"><i class="bi bi-globe-americas" style="margin: 5px;"></i>{{$course->institution->Countries->name}} <br>
                        <i class="bi bi-clock" style="margin: 5px;"></i> {{$course->duration}} {{$course->duration_type}} &nbsp&nbsp <i class="bi bi-cash" style="margin: 5px;"></i>{{$course->application_fees}} {{$course->currency}} | {{$course->fees_type}}
                    </p>

                       
                    </div>
                    </div>
                    </div>
                   
                    </div>
                
                </div>



                @endforeach
                <div class="row mt-3 text-center">
               {{$courses->links()}} 
               </div>
            @endif





            


            
        



<script>
    $(document).ready(function() {
        $('.selectpicker').selectpicker();
    });
</script>




</div>