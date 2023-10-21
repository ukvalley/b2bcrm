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
                            <select multiple data-live-search="true" name="intake[]" class="form-control selectpicker">
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
                <div class="card mt-3">
                    <div class="card-header">
                    <div>{{$course->name}}</div>
                    </div>

                    <div class="card-body">
                    <div>{{$course->level}}</div>
                    </div>
                </div>
                @endforeach
            @endif
        







</div>