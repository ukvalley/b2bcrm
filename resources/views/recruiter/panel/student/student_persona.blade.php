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

                        <h4 class="card-title">Add/Edit Student</h4>
                        <hr>

                       @include('recruiter.panel.student.nav_pill_studen')



                        <h4 class="card-title">Step 3: Student Persona</h4>
                        <p class="card-text">Please provide your persona information.</p>

                        <hr>
    

                        <form method="POST" action="{{ route('agent.student_persona_registration', ['id' => $student->id]) }}">
    @csrf

    <!-- Extracurricular Activities -->
    <div class="mb-3">
        <label for="extracurricular_activities" class="form-label">Extracurricular Activities</label>
        <input type="text" class="form-control" id="extracurricular_activities" name="extracurricular_activities" placeholder="Enter extracurricular activities" value="{{ old('extracurricular_activities', $student->extracurricular_activities) }}">
        <!-- @error('extracurricular_activities')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror -->
    </div>

    <!-- Leadership Roles -->
    <div class="mb-3">
        <label for="leadership_roles" class="form-label">Leadership Roles</label>
        <input type="text" class="form-control" id="leadership_roles" name="leadership_roles" placeholder="Enter leadership roles" value="{{ old('leadership_roles', $student->leadership_roles) }}">
        <!-- @error('leadership_roles')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror -->
    </div>

    <!-- Interests and Hobbies -->
    <div class="mb-3">
        <label for="interests_and_hobbies" class="form-label">Interests and Hobbies</label>
        <input type="text" class="form-control" id="interests_and_hobbies" name="interests_and_hobbies" placeholder="Enter interests and hobbies" value="{{ old('interests_and_hobbies', $student->interests_and_hobbies) }}">
        <!-- @error('interests_and_hobbies')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror -->
    </div>

    <!-- Desired Major -->
    <div class="mb-3">
        <label for="desired_major" class="form-label">Desired Major</label>
        <input type="text" class="form-control" id="desired_major" name="desired_major" placeholder="Enter desired major" value="{{ old('desired_major', $student->desired_major) }}">
        <!-- @error('desired_major')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror -->
    </div>

    <!-- Future Career Goals -->
    <div class="mb-3">
        <label for="future_career_goals" class="form-label">Future Career Goals</label>
        <input type="text" class="form-control" id="future_career_goals" name="future_career_goals" placeholder="Enter future career goals" value="{{ old('future_career_goals', $student->future_career_goals) }}">
        <!-- @error('future_career_goals')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror -->
    </div>

    

    <!-- Additional Information -->
    <div class="mb-3">
        <label for="additional_information" class="form-label">Additional Information</label>
        <input type="text" class="form-control" id="additional_information" name="additional_information" placeholder="Enter additional information" value="{{ old('additional_information', $student->additional_information) }}">
    </div>

    <div class="form-group mt-3">
        <button type="submit" class="btn btn-default btn-lg w-100 mt-3">Submit</button>
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
