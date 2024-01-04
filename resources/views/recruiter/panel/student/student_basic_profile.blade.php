@extends('recruiter.panel.layout')

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


                        @include('recruiter.panel.student.nav_pill_studen')


                        <h4 class="card-title">Step 1: Personal Information</h4>
                        <p class="card-text">Please provide your personal information.</p>
                       <form class="mt-3" method="POST" action="{{ route('agent.student_basic_registration') }}">
    @csrf

    <div class="col mb-3">
        <h6>Basic Information</h6>
    </div>

    <div class="mb-3">
        <label for="full_name" class="form-label">Full Name</label>
        <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full_name" name="full_name" required>
        @error('full_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="date_of_birth" class="form-label">Date of Birth</label>
        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
        <!-- @error('date_of_birth')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror -->
    </div>

    <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
        <select class="form-select" id="gender" name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
        <!-- @error('gender')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror -->
    </div>

    <div class="mb-3">
        <label for="nationality" class="form-label">Nationality</label>
        <input type="text" class="form-control @error('nationality') is-invalid @enderror" id="nationality" name="nationality" required>
        @error('nationality')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <textarea class="form-control" id="address" name="address" rows="3"></textarea>
        <!-- @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror -->
    </div>

    <div class="mb-3">
        <label for="phone_number" class="form-label">Phone Number</label>
        <input type="tel" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" required>
        @error('phone_number')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required>
        @error('email')
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
