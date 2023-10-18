@extends('recruiter.panel.layout')

@section('content')

<!-- Begin page -->
 <!-- Begin page -->
    
         <div class="main-container container">
            <!-- welcome user -->
            


        <!-- Student Registration Step 1 Form -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">


                       @include('recruiter.panel.student.nav_pill_studen')



                        <h4 class="card-title">Step 2: Academic Information</h4>
                        <p class="card-text">Please provide your personal information.</p>
                        <form method="POST" action="{{ route('agent.student_academic_registration', ['id' => $student->id]) }}">

    @csrf

    <!-- Academic Information Section -->


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    

    <!-- Current School/College/University Name -->
    <div class="mb-3">
        <label for="current_school" class="form-label">Current School/College/University Name</label>
        <input type="text" class="form-control" id="current_school" name="current_school" value="{{ old('current_school', $student->current_school) }}" required>
        @error('current_school')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- Field of Study -->
<div class="mb-3">
    <label for="field_of_study" class="form-label">Field of Study</label>
    <select class="form-select" id="field_of_study" name="field_of_study" required>
        <option value="" selected disabled>Select Field of Study</option>
        @foreach ($educationTypes as $type)
            <option value="{{ $type->name }}" {{ old('field_of_study', $student->field_of_study) === $type->name ? 'selected' : '' }}>{{ $type->name }}</option>
        @endforeach
    </select>
    @error('field_of_study')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


    <!-- Expected Graduation Year -->
    <div class="mb-3">
        <label for="expected_graduation_year" class="form-label">Expected Graduation Year</label>
        <input type="number" class="form-control" id="expected_graduation_year" name="expected_graduation_year" value="{{ old('expected_graduation_year', $student->expected_graduation_year) }}" required>
        @error('expected_graduation_year')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- Academic Interests -->
    <div class="mb-3">
        <label for="academic_interests" class="form-label">Academic Interests</label>
        <textarea class="form-control" id="academic_interests" name="academic_interests" rows="4" required>{{ old('academic_interests', $student->academic_interests) }}</textarea>
        @error('academic_interests')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- GPA or Academic Scores -->
    <div class="mb-3">
        <label for="gpa" class="form-label">Academic Scores</label>
        <input type="text" class="form-control" id="gpa" name="gpa" value="{{ old('gpa', $student->gpa) }}" required>
        @error('gpa')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- Languages Spoken -->
    <div class="mb-3">
        <label for="languages_spoken" class="form-label">Languages Spoken</label>
        <textarea class="form-control" id="languages_spoken" name="languages_spoken" rows="2">{{ old('languages_spoken', $student->languages_spoken) }}</textarea>
        @error('languages_spoken')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- Language Proficiency Levels -->
    <div class="mb-3">
        <label for="language_proficiency_levels" class="form-label">Language Proficiency Levels</label>
        <textarea class="form-control" id="language_proficiency_levels" name="language_proficiency_levels" rows="2">{{ old('language_proficiency_levels', $student->language_proficiency_levels) }}</textarea>
        @error('language_proficiency_levels')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- Test Scores -->
    <div class="mb-3">
        <label for="test_scores" class="form-label">Test Scores</label>
        <textarea class="form-control" id="test_scores" name="test_scores" rows="2">{{ old('test_scores', $student->test_scores) }}</textarea>
        @error('test_scores')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- Test Dates -->
    <div class="mb-3">
        <label for="test_dates" class="form-label">Test Dates</label>
        <textarea class="form-control" id="test_dates" name="test_dates" rows="2">{{ old('test_dates', $student->test_dates) }}</textarea>
        @error('test_dates')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- Submit Button -->
    <div class="mb-3 z-index-11">
    <button type="submit" class="btn btn-default btn-lg w-100">Save Academic Information</button>
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