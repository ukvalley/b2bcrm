@extends('institution.panel.layout')

@section('content')

<!-- Begin page -->
<!-- Begin page -->
<main class="">

    <!-- Header -->
    <!-- <header class="header position-fixed">
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
    </header> -->
    <!-- Header ends -->
    <div class="main-container container">
        <!-- welcome user -->

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">{{ __('Edit Recruiter Profile') }}</div>


                    <div class="card-body">

                        <nav class="nav nav-pills">
                            <a class="nav-link {{ request()->routeIs('institution.edit') ? 'active' : '' }}" href="{{ route('institution.edit') }}">Basic Details</a>
                            <a class="nav-link {{ request()->routeIs('institution.editPassword') ? 'active' : '' }}" href="{{ route('institution.editPassword') }}">Security</a>
                        </nav>

                        <hr>
                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                        
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif


                        <form class="mt-3" method="POST" action="{{ route('institution.UpdateProfile') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="col mb-3">
                                <h6>Basic Information</h6>
                            </div>

                            <div class="row">
                                <!-- Name -->
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-floating form-group mb-3">

                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $institution->name) }}" placeholder="Name" required>
                                        <label for="company_name">{{ __('Name') }}</label>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Email Name -->
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-floating form-group mb-3">

                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $institution->email) }}" placeholder="Email" required>
                                        <label for="email">{{ __('Email') }}</label>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Phone number -->
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-floating form-group mb-3">

                                        <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number', $institution->phone_number) }}" placeholder="Phone Number" required>
                                        <label for="phone_number">{{ __('Phone number') }}</label>
                                        @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- City-->
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-floating form-group mb-3">

                                        <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city', $institution->city) }}" placeholder="City" required>
                                        <label for="city">{{ __('City') }}</label>
                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Logo -->
                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="form-group">

                                        <img style="padding:10px" src="{{ asset('institute_img/'.$institution->logo) }}" alt="Institute logo" height="70px"> <br>
                                        <label for="logo">{{ __('Select Logo') }}</label> <br>
                                        <input id="logo" type="file" class="form-control @error('logo') is-invalid @enderror" name="logo" accept="image/*">

                                        @error('logo')
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