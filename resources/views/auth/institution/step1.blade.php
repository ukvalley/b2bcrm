@extends('auth.recruiter.layout') @section('content')
<!-- Begin page content -->
<main class="container-fluid h-100">
  <div class="row h-100">
    <div class="col-12 text-center mb-auto px-0">
      <header class="header">
        <div class="row">
          <div class="col-auto">
            <a href="signin.html" target="_self" class="btn btn-light btn-44">
              <i class="bi bi-arrow-left"></i>
            </a>
          </div>
          <div class="col align-self-center">
            <h5>{{ $siteName }}</h5>
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
          <h1>{{ __('Recruiter Registration') }}</h1>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('recruiter.registration.step2') }}" class="was-validated"> @csrf <div class="form-floating is-valid mb-3">
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>
              <label for="name">{{ __('Name') }}</label> @error('name') <span class="invalid-feedback" role="alert">
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
            <div class="row">
              <div class="col-md-6">
                <div class="form-floating is-valid mb-3">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
                  <label for="password">{{ __('Password') }}</label> @error('password') <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span> @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating is-invalid mb-3">
                  <input id="confirmpassword" type="password" class="form-control" placeholder="Confirm Password">
                  <label for="confirmpassword">{{ __('Confirm Password') }}</label>
                  <button type="button" class="btn btn-link text-danger tooltip-btn" data-bs-toggle="tooltip" data-bs-placement="left" title="Enter valid Password" id="passworderror">
                    <i class="bi bi-info-circle"></i>
                  </button>
                </div>
              </div>
            </div>
            <!-- <p class="mb-3"><span class="text-muted">{{ __('By clicking on Signup button, you agree to our') }}</span><a href="">{{ __('Terms and Conditions') }}</a></p> -->
            <button type="submit" class="btn btn-lg btn-default w-100 mb-4 shadow">
              {{ __('Next') }}
            </button>
          </form>
        </div>
      </div>
    </div>
    <!--  <div class="col-12 text-center mt-auto"><div class="row justify-content-center footer-info"><div class="col-auto"><p class="text-muted">Or you can continue with </p></div><div class="col-auto ps-0"><a href="#" class="p-1"><i class="bi bi-twitter"></i></a><a href="#" class="p-1"><i class="bi bi-google"></i></a><a href="#" class="p-1"><i class="bi bi-facebook"></i></a></div></div></div> -->
  </div>
</main> @endsection