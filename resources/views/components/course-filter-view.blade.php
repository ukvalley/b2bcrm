<div class="mt-5 mb-5">
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.9/css/bootstrap-select.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.9/js/bootstrap-select.min.js"></script>

    
        <div class="card">
             <div class="card-body">
            <form method="GET">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" name="search" class="form-control" placeholder="Search courses">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
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




        
            @if($courses)
                @foreach($courses as $course)
                




                <div class="row mt-3">
                    <div class="col-12 card bg-info" >
                    <div class="card-header"><i class="bi bi-book" style="margin-right: 5px;"></i>{{$course->name}}</div>
                    <div class="row  bg-light text-dark">
                    <div class="col-md-3 bg-light d-flex  align-items-center">
                        <img  src="https://civs.online/wp-content/uploads/2023/01/CIVS-White-01-1024x285.png" alt="Logo" style="width: 100%; height: 60%; padding:5px">
                    </div> 

                    <div class="col-md-9">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-bank" style="margin-right: 5px;"></i> {{$course->institution->name}}</h5>
                        <p class="card-text"><i class="bi bi-globe-americas" style="margin-right: 5px;"></i>{{$course->institution->country}}
                        &nbsp&nbsp<i class="bi bi-clock" style="margin-right: 5px;"></i> {{$course->duration}} {{$course->duration_type}}
                    </p>

                        <p class="card-text"><i class="bi bi-cash" style="margin-right: 5px;"></i>{{$course->application_fees}} {{$course->fees_type}}</p>
                    </div>
                    </div>
                    </div>
                   
                    </div>
                
                </div>



                @endforeach
            @endif


            
        



<script>
    $(document).ready(function() {
        $('.selectpicker').selectpicker();
    });
</script>




</div>