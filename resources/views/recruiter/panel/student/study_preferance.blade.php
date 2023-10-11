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



            


        <!-- Student Registration Step 1 Form -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">

                        <h4 class="card-title">Add/Edit Student</h4>
                        <hr>

                       @include('recruiter.panel.student.nav_pill_studen')



                        <h4 class="card-title">Step 3: Study Preferance</h4>
                        <p class="card-text">Please provide your Study Preferance.</p>

                        <hr>
    

<form method="POST" action="{{ route('agent.StudentStudyPreferanceRegstration', ['id' => $student->id]) }}">
    @csrf
    @method('POST')

    <!-- Intended Area of Study -->
    <div class="mb-3">
    <label for="intended_area_of_study" class="form-label">Intended Area of Study</label>
    <select class="form-select" id="intended_area_of_study" name="intended_area_of_study" required>
        <option value="">Select Area of Study</option>
        @foreach ($StudyTypes as $studyType)
            <option value="{{ $studyType->id }}"
                {{ old('intended_area_of_study', $student->intended_area_of_study) == $studyType->id ? 'selected' : '' }}>
                {{ $studyType->name }}
            </option>
        @endforeach
    </select>
    @error('intended_area_of_study')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


    <!-- Intended Course Level -->
   <div class="mb-3">
    <label for="intended_course_level" class="form-label">Intended Course Level</label>
    <select class="form-select" id="intended_course_level" name="intended_course_level" required>
        <option value="" disabled>Select Intended Course Level</option>
        @foreach(\App\Models\CourseType::all() as $courseType)
            <option value="{{ $courseType->name }}" {{ old('intended_course_level', $student->intended_course_level) === $courseType->name ? 'selected' : '' }}>
                {{ $courseType->name }}
            </option>
        @endforeach
    </select>
    @error('intended_course_level')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


    <!-- Courses or Fields Comments -->
    <div class="mb-3">
        <label for="courses_or_fields_comments" class="form-label">Courses or Fields Comments</label>
        <textarea class="form-control" id="courses_or_fields_comments" name="courses_or_fields_comments" rows="4">{{ old('courses_or_fields_comments', $student->courses_or_fields_comments) }}</textarea>
        @error('courses_or_fields_comments')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- Career Paths -->
    <div class="mb-3">
        <label for="career_paths" class="form-label">Career Paths</label>
        <textarea class="form-control" id="career_paths" name="career_paths" rows="4">{{ old('career_paths', $student->career_paths) }}</textarea>
        @error('career_paths')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- Intended Institution -->
    <div class="mb-3">
        <label for="intended_institution" class="form-label">Intended Institution</label>
        <input type="text" class="form-control" id="intended_institution" name="intended_institution" value="{{ old('intended_institution', $student->intended_institution) }}" required>
        @error('intended_institution')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

   <div class="mb-3">
    <label for="intended_intake_quarter" class="form-label">Intended Intake Quarter</label>
    <select class="form-select" id="intended_intake_quarter" name="intended_intake_quarter" required>
        <option value="" disabled>Select Intended Intake Quarter</option>
        <option value="Q1" {{ old('intended_intake_quarter', $student->intended_intake_quarter) === 'Q1' ? 'selected' : '' }}>Q1 Jan-Feb-Mar</option>
        <option value="Q2" {{ old('intended_intake_quarter', $student->intended_intake_quarter) === 'Q2' ? 'selected' : '' }}>Q2 Apr-May-Jun</option>
        <option value="Q3" {{ old('intended_intake_quarter', $student->intended_intake_quarter) === 'Q3' ? 'selected' : '' }}>Q3 Jul-Aug-Sep</option>
        <option value="Q4" {{ old('intended_intake_quarter', $student->intended_intake_quarter) === 'Q4' ? 'selected' : '' }}>Q4 Oct-Nov-Dec</option>
    </select>
    @error('intended_intake_quarter')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


    <!-- Intended Intake Year -->
    <div class="mb-3">
    <label for="intended_intake_year" class="form-label">Intended Intake Year</label>
    <select class="form-select" id="intended_intake_year" name="intended_intake_year" required>
        <option value="" disabled>Select Intended Intake Year</option>
        @php
            $currentYear = date('Y');
        @endphp
        @for ($i = $currentYear; $i <= $currentYear + 10; $i++)
            <option value="{{ $i }}" {{ old('intended_intake_year', $student->intended_intake_year) === $i ? 'selected' : '' }}>
                {{ $i }}
            </option>
        @endfor
    </select>
    @error('intended_intake_year')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


    <!-- Intended Intake Comments -->
    <div class="mb-3">
        <label for="intended_intake_comments" class="form-label">Intended Intake Comments</label>
        <textarea class="form-control" id="intended_intake_comments" name="intended_intake_comments" rows="4">{{ old('intended_intake_comments', $student->intended_intake_comments) }}</textarea>
        @error('intended_intake_comments')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- Funding Source -->
    <div class="mb-3">
        <label for="funding_source" class="form-label">Funding Source</label>
        <input type="text" class="form-control" id="funding_source" name="funding_source" value="{{ old('funding_source', $student->funding_source) }}" required>
        @error('funding_source')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- Intended Destination 1 -->
<div class="mb-3">
    <label for="intended_destination_1" class="form-label">Intended Destination 1</label>
    <select class="form-select" id="intended_destination_1" name="intended_destination_1" required>
        <option value="" disabled>Select Intended Destination 1</option>
        @foreach($countries as $country)
            <option value="{{ $country->id }}" {{ old('intended_destination_1', $student->intended_destination_1) == $country->id ? 'selected' : '' }}>
                {{ $country->name }}
            </option>
        @endforeach
    </select>
    @error('intended_destination_1')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- Intended Destination 2 -->
<div class="mb-3">
    <label for="intended_destination_2" class="form-label">Intended Destination 2</label>
    <select class="form-select" id="intended_destination_2" name="intended_destination_2" required>
        <option value="" disabled>Select Intended Destination 2</option>
        @foreach($countries as $country)
            <option value="{{ $country->id }}" {{ old('intended_destination_2', $student->intended_destination_2) == $country->id ? 'selected' : '' }}>
                {{ $country->name }}
            </option>
        @endforeach
    </select>
    @error('intended_destination_2')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- Intended Destination 3 -->
<div class="mb-3">
    <label for="intended_destination_3" class="form-label">Intended Destination 3</label>
    <select class="form-select" id="intended_destination_3" name="intended_destination_3" required>
        <option value="" disabled>Select Intended Destination 3</option>
        @foreach($countries as $country)
            <option value="{{ $country->id }}" {{ old('intended_destination_3', $student->intended_destination_3) == $country->id ? 'selected' : '' }}>
                {{ $country->name }}
            </option>
        @endforeach
    </select>
    @error('intended_destination_3')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

    <!-- Intended Destination Comments -->
    <div class="mb-3">
        <label for="intended_destination_comments" class="form-label">Intended Destination Comments</label>
        <textarea class="form-control" id="intended_destination_comments" name="intended_destination_comments" rows="4">{{ old('intended_destination_comments', $student->intended_destination_comments) }}</textarea>
        @error('intended_destination_comments')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- Submit Button -->
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
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
