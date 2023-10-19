@extends('institution.panel.layout')

@section('content')

<!-- Begin page -->
 <!-- Begin page -->
   
        <!-- Header ends -->
         <div class="main-container container">
            


        <!-- Student Registration Step 1 Form -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">


                        @include('institution.panel.course.nav_pill_course')


                        <h4 class="card-title"> Personal Information</h4>
                        <p class="card-text">Please provide Details information.</p>
                       <form class="mt-3" method="POST" action="{{ route('institution.course_basic_registration3',['course_id' => $course->id]) }}">
    @csrf

    <div class="col mb-3">
        <h6>Basic Information</h6>
    </div>

    <div class="mb-3">
        <label for="summary" class="form-label">Summary</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="summary" name="summary" required>
        @error('summary')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="attendance_pattern" class="form-label">Attendance Pattern</label>
        <input type="text" class="form-control @error('attendance_pattern') is-invalid @enderror" id="attendance_pattern" name="attendance_pattern" required>
        @error('attendance_pattern')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="learning_objectives" class="form-label">Learning Objectives</label>
        <input type="text" class="form-control @error('learning_objectives') is-invalid @enderror" id="learning_objectives" name="learning_objectives" required>
        @error('learning_objectives')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>


    <div class="mb-3">
        <label for="outcomes" class="form-label">Outcomes</label>
        <input type="text" class="form-control @error('outcomes') is-invalid @enderror" id="outcomes" name="outcomes" required>
        @error('outcomes')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="course_particulars" class="form-label">Course Particulars</label>
        <input type="text" class="form-control @error('course_particulars') is-invalid @enderror" id="course_particulars" name="course_particulars" required>
        @error('course_particulars')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="course_particulars" class="form-label">Admission Requirment</label>
        <input type="text" class="form-control @error('course_particulars') is-invalid @enderror" id="course_particulars" name="course_particulars" required>
        @error('course_particulars')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    
    
    <div class="mb-3 z-index-11">
        <button type="submit" class="btn btn-default btn-lg w-100">Submit</button>
    </div>
</form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main page content ends -->
</div>
</main>
<!-- Page ends -->

@endsection
