@extends('admin.panel.layout')

@section('content')

<!-- Begin page -->
<!-- Begin page -->

<div class="main-container container">
    <!-- welcome user -->

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">{{ __('Edit Admin Profile') }}</div>


                <div class="card-body">

                    <nav class="nav nav-pills">
                        <a class="nav-link {{ request()->routeIs('admin.edit') ? 'active' : '' }}" href="{{ route('admin.edit') }}">Basic Details</a>
                        <a class="nav-link {{ request()->routeIs('admin.editPassword') ? 'active' : '' }}" href="{{ route('admin.editPassword') }}">Security</a>
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


                    <form class="mt-3" method="POST" action="{{ route('admin.UpdateProfile') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="col mb-3">
                            <h6>Basic Information</h6>
                        </div>

                        <div class="row">

                            <!-- Email -->
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-floating form-group mb-3">

                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $admin->email) }}" placeholder="Email" required>
                                    <label for="email">{{ __('Email') }}</label>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Name -->
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-floating form-group mb-3">

                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $admin->name) }}" placeholder="Name" required>
                                    <label for="name">{{ __('Name') }}</label>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Avatar -->
                            <!-- <div class="col-12 col-md-12 col-lg-12">
                                <div class="form-group">

                                    <img style="padding:10px" src="{{ asset('images/avtar/' . $admin->avatar) }}" alt="Recruiter Avatar" height="70px"> <br>
                                    <label for="avatar">{{ __('Select Avatar') }}</label> <br>
                                    <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" accept="image/*">

                                    @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> -->

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

    <!-- Student Registration Step 1 Form -->

</div>
<!-- Main page content ends -->
</div>
</main>
<!-- Page ends -->
@endsection