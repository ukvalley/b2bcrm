@extends('admin.panel.layout')

@section('content')
<div class="col-10 col-md-8 col-lg-5 col-xl-6 mx-auto align-self-center text-center py-4">
    <div class="card">
        <div class="card-header">
            <h1>{{ __('Recruiter Registration') }}</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.registrationStore') }}" class="was-validated">
                @csrf
                <div class="form-floating is-valid mb-3">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>
                    <label for="name">
                        {{ __('Name') }}
                    </label> @error('name') <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span> @enderror
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating is-valid mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required>
                            <label for="email">{{ __('Email Address') }}</label> @error('email') <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating is-valid mb-3">
                            <input id="mobile_number" type="text" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number" placeholder="Mobile Number" value="{{ old('mobile_number') }}" required>
                            <label for="mobile_number">{{ __('Mobile Number') }}</label> @error('mobile_number') <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-floating is-valid mb-3">
                            <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" placeholder="Company Name" required autofocus>
                            <label for="company_name">{{ __('Company Name') }}</label>
                            @error('company_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                        <div class="form-floating is-valid mb-3">
                            <input id="company_short_name" type="text" class="form-control @error('company_short_name') is-invalid @enderror" name="company_short_name" value="{{ old('company_short_name') }}" placeholder="Company Short Name" required>
                            <label for="company_short_name">{{ __('Company Short Name') }}</label>
                            @error('company_short_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-floating is-valid mb-3">
                            <input id="client_id" type="text" class="form-control @error('client_id') is-invalid @enderror" name="client_id" value="{{ old('client_id') }}" placeholder="Company ID" required>
                            <label for="client_id">{{ __('Client ID') }}</label>
                            @error('client_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        </div>

                        </div>

                        <div  class="form-group form-floating  is-valid">
                            
                            <select id="your_role" class="form-control  @error('role') is-invalid @enderror" name="your_role" required>
                                <option value="Director">Director</option>
                                <option value="Business Owner">Business Owner</option>
                                <option value="Partner">Partner</option>
                                <option value="CEO / MD">CEO / MD</option>
                                <option value="Office Manager / Administration">Office Manager / Administration</option>
                                <option value="Head Counsellor">Head Counsellor</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Other">Other</option>
                            </select>

                            <label  for="your_role">{{ __('Your Role') }}</label>
                            @error('your_role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-floating is-valid mb-3">
                        <input type="text" name="country_count" id="country_count" class="form-control" required>
                            <!-- <select name="country_count" id="country_count" class="form-control" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                {{-- Add more options as needed --}}
                            </select> -->
                            <label for="country_count">We Operate in (How Many Countries):</label>
                        </div>

                        {{-- Number of Employees --}}
                        <div class="form-floating is-valid mb-3">
                        <!-- <input type="text" name="employee_count" id="employee_count" class="form-control" required> -->
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
                            <input type="text" name="students_destination_count" id="students_destination_count" class="form-control" required>
                                <!-- <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option> -->
                                {{-- Add more options as needed --}}
                            <!-- </select> -->
                            <label for="students_destination_count">We Send Students to (How Many Destination Countries):</label>
                        </div>

                        {{-- Number of Students Aimed to Send Next Year --}}
                        <div class="form-floating is-valid mb-3">
                            <input type="text" name="students_next_year_count" id="students_next_year_count" class="form-control" required>
                                <!-- <option value="1-10">1-10</option>
                                <option value="11-50">11-50</option>
                                <option value="51-100">51-100</option> -->
                                {{-- Add more options as needed --}}
                            <!-- </select> -->
                            <label for="students_next_year_count">We Aim to Send (How Many Students Next Year):</label>
                        </div>
                <!-- <p class="mb-3"><span class="text-muted">{{ __('By clicking on Signup button, you agree to our') }}</span><a href="">{{ __('Terms and Conditions') }}</a></p> -->
                <button type="submit" class="btn btn-lg btn-default w-100 mb-4 shadow">
                    {{ __('Submit') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection