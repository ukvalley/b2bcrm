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

                    <h4 class="card-title"> Requirments</h4>
                    <!-- <p class="card-text">Please provide Details information.</p> -->
                    <form class="mt-3" method="POST"
                        action="{{ route('institution.course_basic_registration3',['course_id' => $course->id]) }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="validation-errors">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="admission_requirements" class="form-label">Admission Requirments</label>
                            <input type="text"
                                class="form-control @error('admission_requirements') is-invalid @enderror"
                                value="{{$course->admission_requirements}}" id="admission_requirements"
                                name="admission_requirements" required>
                            @error('admission_requirements')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="international_students" class="form-label">International Student</label>
                            <select class="form-select @error('international_students') is-invalid @enderror"
                                id="international_students" name="international_students" required>
                                <option value="yes" @if($course->international_students == "yes") selected @endif>Yes
                                </option>
                                <option value="no" @if($course->international_students == "no") selected @endif >No
                                </option>
                            </select>
                            @error('international_students')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="english_requirements" class="form-label">English Requirement</label>
                            <input type="text" class="form-control @error('english_requirements') is-invalid @enderror"
                                value="{{$course->english_requirements}}" id="english_requirements"
                                name="english_requirements" required>
                            @error('english_requirements')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="course_dates" class="form-label">Course Date</label>
                            <input type="Date" class="form-control @error('course_dates') is-invalid @enderror"
                                value="{{$course->course_dates}}" id="course_dates" name="course_dates" required>
                            @error('course_dates')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="institution_overview" class="form-label">Institution Overview</label>
                            <input type="text" class="form-control @error('institution_overview') is-invalid @enderror"
                                value="{{$course->institution_overview}}" id="institution_overview"
                                name="institution_overview" required>
                            @error('institution_overview')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="university_ownership" class="form-label">University Ownership</label>
                            <input type="text" class="form-control @error('	university_ownership') is-invalid @enderror"
                                value="{{$course->university_ownership}}" id="university_ownership"
                                name="university_ownership" required>
                            @error('university_ownership')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="institution_type" class="form-label">University Type</label>
                            <input type="text" class="form-control @error('institution_type') is-invalid @enderror"
                                value="{{$course->institution_type}}" id="institution_type" name="institution_type"
                                required>
                            @error('institution_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Profile Image</label>

                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="image" name="image">
                                <label class="input-group-text" for="image">Upload</label>
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
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