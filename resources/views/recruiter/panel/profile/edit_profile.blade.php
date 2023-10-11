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
            
        <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">{{ __('Edit Recruiter Profile') }}</div>
                

                <div class="card-body">

                <nav class="nav nav-pills">
                    <a class="nav-link {{ request()->routeIs('agent.edit') ? 'active' : '' }}" href="{{ route('agent.edit') }}">Basic Details</a>
                    <a class="nav-link {{ request()->routeIs('agent.editPassword') ? 'active' : '' }}" href="{{ route('agent.editPassword') }}">Security</a>
                </nav>

                <hr>


                    <form class="mt-3" method="POST" action="{{ route('agent.UpdateProfile') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="col mb-3">
                            <h6>Basic Information</h6>
                        </div>

                        <div class="row">
                        <!-- Company Name -->
                        <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-floating form-group mb-3">
                            
                            <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name', $recruiter->company_name) }}" placeholder="Company Name" required>
                            <label for="company_name">{{ __('Company Name') }}</label>
                            @error('company_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>

                        <!-- Company Short Name -->
                       <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-floating form-group mb-3">
                            
                            <input id="company_short_name" type="text" class="form-control @error('company_short_name') is-invalid @enderror" name="company_short_name" value="{{ old('company_short_name', $recruiter->company_short_name) }}" required placeholder="Company Short Name">
                            <label for="company_short_name">{{ __('Company Short Name') }}</label>
                            @error('company_short_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                        <!-- Client ID -->
                        <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-floating form-group mb-3">
                            
                            <input id="client_id" type="text" class="form-control @error('client_id') is-invalid @enderror" name="client_id" value="{{ old('client_id', $recruiter->client_id) }}" required placeholder="Clint ID">
                            <label for="client_id">{{ __('Client ID') }}</label>
                            @error('client_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>

                        <!-- Your Role -->
                        <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-floating mb-3">
                            
                            <select id="your_role" class="form-control  @error('role') is-invalid @enderror" name="your_role" required>
                                <option value="Director" @if(old('your_role', $recruiter->your_role) === 'Director') selected @endif>Director</option>
                                <option value="Business Owner" @if(old('your_role', $recruiter->your_role) === 'Business Owner') selected @endif>Business Owner</option>
                                <option value="Partner" @if(old('your_role', $recruiter->your_role) === 'Partner') selected @endif>Partner</option>
                                <option value="CEO / MD" @if(old('your_role', $recruiter->your_role) === 'CEO / MD') selected @endif>CEO / MD</option>
                                <option value="Office Manager / Administration" @if(old('your_role', $recruiter->your_role) === 'Office Manager / Administration') selected @endif>Office Manager / Administration</option>
                                <option value="Head Counsellor" @if(old('your_role', $recruiter->your_role) === 'Head Counsellor') selected @endif>Head Counsellor</option>
                                <option value="Marketing" @if(old('your_role', $recruiter->your_role) === 'Marketing') selected @endif>Marketing</option>
                                <option value="Other" @if(old('your_role', $recruiter->your_role) === 'Other') selected @endif>Other</option>
                            </select>

                            <label for="your_role">{{ __('Your Role') }}</label>
                            

                            @error('your_role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Timezone -->
                        <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-floating mb-3">
                            
                            <select id="timezone" class="form-control @error('timezone') is-invalid @enderror" name="timezone" required>
                                @foreach($timezones as $tz)
                                    <option value="{{ $tz->timezone }}" @if(old('timezone', $recruiter->timezone) === $tz->timezone) selected @endif>{{ $tz->name }}</option>
                                @endforeach
                            </select>
                            <label for="timezone">{{ __('Timezone') }}</label>
                            @error('timezone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>

                        <!-- Avatar -->
                        <div class="col-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            
                            <img style="padding:10px" src="{{ asset('images/avtar/' . $recruiter->avatar) }}" alt="Recruiter Avatar" height="70px"> <br>
                            <label for="avatar">{{ __('Select Avatar') }}</label> <br>
                            <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" accept="image/*">
                            
                            @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        


                        </div>


                        <div class="form-group mt-3">

                            <button type="submit" class="btn btn-default btn-lg w-100">
                                {{ __('Update Profile') }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Main page content ends -->
</div>
</main>
<!-- Page ends -->
@endsection
