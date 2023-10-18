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


                        <h4 class="card-title"> Course Information</h4>
                        <p class="card-text">Please provide Course information.</p>
                       <form class="mt-3" method="POST" action="{{ route('institution.course_basic_registration2',['course_id' => $course->id]) }}">
    @csrf

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<!-- 
    <div class="col mb-3">
        <h6>Basic Information</h6>
    </div> -->

    <div class="mb-3">
        <label for="code" class="form-label">CIVS Code</label>
        <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" required>
        @error('code')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="currency" class="form-label">Currency</label>
        <input type="text" class="form-control @error('currency') is-invalid @enderror" id="currency" name="currency" required>
        @error('currency')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="application_fees" class="form-label">Application Fees</label>
        <input type="text" class="form-control @error('application_fees') is-invalid @enderror" id="application_fees" name="application_fees" required>
        @error('application_fees')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="tuition_fees" class="form-label">Tution Fees</label>
        <input type="text" class="form-control @error('tuition_fees') is-invalid @enderror" id="tuition_fees" name="tuition_fees" required>
        @error('tuition_fees')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    

    <div class="mb-3">
        <label for="fees_types" class="form-label">Fees Type</label>
        <select class="form-select @error('fees_types') is-invalid @enderror" id="fees_types" name="fees_types" required>
            <option value="semister">Semister</option>
            <option value="yearly" >Yearly</option>
        </select>
        @error('fees_types')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="course_code" class="form-label">Course Code</label>
        <input type="text" class="form-control @error('course_code') is-invalid @enderror" id="course_code" name="course_code" required>
        @error('course_code')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    

    <div class="mb-3">
        <label for="duration" class="form-label">Duration</label>
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
