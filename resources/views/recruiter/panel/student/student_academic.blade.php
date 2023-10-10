@extends('recruiter.panel.layout')

@section('content')

<!-- Begin page -->
 <!-- Begin page -->
    <main class="">

        <!-- Header -->
        <header class="header position-fixed">
            <div class="row">
                <div class="col-auto">
                    <a href="javascript:void(0)" target="_self" class="btn btn-light btn-44 menu-btn">
                        <i class="bi bi-list"></i>
                    </a>
                </div>
                <div class="col align-self-center text-center">
                    <img src="https://civs.online/wp-content/uploads/2023/01/CIVS-White-01-1024x285.png" width="200px" alt="">
                    
                </div>
                <div class="col-auto">
                    <a href="notifications.html" target="_self" class="btn btn-light btn-44">
                        <i class="bi bi-bell"></i>
                        <span class="count-indicator"></span>
                    </a>
                </div>
            </div>
        </header>
        <!-- Header ends -->
         <div class="main-container container">
            <!-- welcome user -->
            <div class="row mb-4">
                <div class="col-auto">
                    <div class="avatar avatar-50 shadow rounded-10">
                        <img src="{{url('/')}}/theme/img/user1.jpg" alt="">
                    </div>
                </div>
                <div class="col align-self-center ps-0">
                    <h4 class="text-color-theme"><span class="fw-normal">Hi</span>, {{ Auth::user()->name }}!</h4>
                    <p class="text-muted">Welcome back, we're happy to have you here!</p>
                </div>
            </div>


        <!-- Student Registration Step 1 Form -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title">Step 2: Academic Information</h4>
                        <p class="card-text">Please provide your personal information.</p>
                        <form method="POST" action="{{ route('agent.student_academic_registration') }}">
    @csrf

    <!-- Academic Information Section -->
    

    <!-- Current School/College/University Name -->
    <div class="mb-3">
        <label for="current_school" class="form-label">Current School/College/University Name</label>
        <input type="text" class="form-control" id="current_school" name="current_school" value="{{ old('current_school') }}" required>
    </div>

    <!-- Field of Study -->
    <div class="mb-3">
        <label for="field_of_study" class="form-label">Field of Study</label>
        <input type="text" class="form-control" id="field_of_study" name="field_of_study" value="{{ old('field_of_study') }}" required>
    </div>

    <!-- Expected Graduation Year -->
    <div class="mb-3">
        <label for="expected_graduation_year" class="form-label">Expected Graduation Year</label>
        <input type="number" class="form-control" id="expected_graduation_year" name="expected_graduation_year" value="{{ old('expected_graduation_year') }}" required>
    </div>

    <!-- Academic Interests -->
    <div class="mb-3">
        <label for="academic_interests" class="form-label">Academic Interests</label>
        <textarea class="form-control" id="academic_interests" name="academic_interests" rows="4" required>{{ old('academic_interests') }}</textarea>
    </div>

    <!-- GPA or Academic Scores -->
    <div class="mb-3">
        <label for="gpa" class="form-label">GPA or Academic Scores</label>
        <input type="text" class="form-control" id="gpa" name="gpa" value="{{ old('gpa') }}" required>
    </div>

    <!-- Languages Spoken -->
    <div class="mb-3">
        <label for="languages_spoken" class="form-label">Languages Spoken</label>
        <textarea class="form-control" id="languages_spoken" name="languages_spoken" rows="2">{{ old('languages_spoken') }}</textarea>
    </div>

    <!-- Language Proficiency Levels -->
    <div class="mb-3">
        <label for="language_proficiency_levels" class="form-label">Language Proficiency Levels</label>
        <textarea class="form-control" id="language_proficiency_levels" name="language_proficiency_levels" rows="2">{{ old('language_proficiency_levels') }}</textarea>
    </div>

    <!-- Test Scores -->
    <div class="mb-3">
        <label for="test_scores" class="form-label">Test Scores</label>
        <textarea class="form-control" id="test_scores" name="test_scores" rows="2">{{ old('test_scores') }}</textarea>
    </div>

    <!-- Test Dates -->
    <div class="mb-3">
        <label for="test_dates" class="form-label">Test Dates</label>
        <textarea class="form-control" id="test_dates" name="test_dates" rows="2">{{ old('test_dates') }}</textarea>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Save Academic Information</button>
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
