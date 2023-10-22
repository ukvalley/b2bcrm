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


                        <h4 class="card-title">Step 1: Basic Information</h4>
                        <p class="card-text">Please provide your Course Information.</p>
                       <form class="mt-3" method="POST" action="{{ route('institution.course_basic_registration') }}">
    @csrf

    <div class="col mb-3">
        <h6>Basic Information</h6>
    </div>

    <div class="mb-3">
        <label for="full_name" class="form-label">Course Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="level" class="form-label">Level</label>
        <select class="form-select @error('level') is-invalid @enderror" id="level" name="level" required>
            <option value="diploma">Diploma</option>
            <option value="degree">Degree</option>
        </select>
        @error('level')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="full_name" class="form-label">Course Code</label>
        <input type="text" class="form-control @error('course_code') is-invalid @enderror" id="course_code" name="course_code" required>
        @error('course_code')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    

    <div class="mb-3">
        <label for="full_name" class="form-label">Duration</label>
        <input type="text" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration" required>
        @error('duration')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="duration_type" class="form-label">Duration Type</label>
        <select class="form-select @error('duration_type') is-invalid @enderror" id="duration_type" name="duration_type" required>
            <option value="year">Year</option>
            <option value="month">Month</option>
            <option value="week">Week</option>

        </select>
        @error('duration_type')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    

    

    <div class="mb-3 z-index-11">
        <button type="submit" class="btn btn-default btn-lg w-100">Next</button>
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
