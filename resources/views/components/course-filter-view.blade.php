<div class="mt-5 mb-5">
    

    <div class="container mt-5 mb-5">
        <div class="card">
             <div class="card-body">
            <form method="GET">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" name="search" class="form-control" placeholder="Search courses">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" name="country" class="form-control" placeholder="Country">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="intake" class="form-control">
                                <option value="">Select Intake</option>
                                <option value="January">January</option>
                                <option value="May">May</option>
                                <option value="September">September</option>
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

        </div>


        
            @if($courses)
                @foreach($courses as $course)
                <div class="card">
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