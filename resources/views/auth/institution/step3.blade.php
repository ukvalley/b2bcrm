{{-- resources/views/recruiter_registration/step3.blade.php --}}
@extends('auth.recruiter.layout') {{-- Extend your main layout if applicable --}}

@section('content') {{-- Define the content section --}}
<main class="container-fluid h-100">
    <div class="row h-100">
        <div class="col-12 text-center mb-auto px-0">
            <header class="header">
                <div class="row">
                    <div class="col-auto">
                        <a href="{{ route('recruiter.registration.step2') }}" target="_self" class="btn btn-light btn-44">
                            <i class="bi bi-arrow-left"></i>
                        </a>
                    </div>
                    <div class="col align-self-center">
                        <h5>{{$siteName}}</h5>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-light btn-44 invisible"></a>
                    </div>
                </div>
            </header>
        </div>
        <div class="col-10 col-md-8 col-lg-5 col-xl-6 mx-auto align-self-center text-center py-4">
            <div class="card">
                <div class="card-header">
                    <h1>Recruiter Registration - Step 3</h1>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('recruiter.registration.step4') }}" class="was-validated">
                        @csrf {{-- Add CSRF protection --}}

                        {{-- Number of Countries Operated --}}
                        <div class="form-floating is-valid mb-3">
                            <select name="country_count" id="country_count" class="form-control" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                {{-- Add more options as needed --}}
                            </select>
                            <label for="country_count">We Operate in (How Many Countries):</label>
                        </div>

                        {{-- Number of Employees --}}
                        <div class="form-floating is-valid mb-3">
                            <select name="employee_count" id="employee_count" class="form-control" required>
                                <option value="1-10">1-10</option>
                                <option value="11-50">11-50</option>
                                <option value="51-100">51-100</option>
                                {{-- Add more options as needed --}}
                            </select>
                            <label for="employee_count">We Have (How Many Employees):</label>
                        </div>

                        {{-- Number of Destination Countries for Students --}}
                        <div class="form-floating is-valid mb-3">
                            <select name="students_destination_count" id="students_destination_count" class="form-control" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                {{-- Add more options as needed --}}
                            </select>
                            <label for="students_destination_count">We Send Students to (How Many Destination Countries):</label>
                        </div>

                        {{-- Number of Students Aimed to Send Next Year --}}
                        <div class="form-floating is-valid mb-3">
                            <select name="students_next_year_count" id="students_next_year_count" class="form-control" required>
                                <option value="1-10">1-10</option>
                                <option value="11-50">11-50</option>
                                <option value="51-100">51-100</option>
                                {{-- Add more options as needed --}}
                            </select>
                            <label for="students_next_year_count">We Aim to Send (How Many Students Next Year):</label>
                        </div>

                        <button type="submit" class="btn btn-lg btn-default w-100 mb-4 shadow">Next</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
