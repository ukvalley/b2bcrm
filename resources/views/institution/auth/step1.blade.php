@extends('institution.auth.layout')

@section('content')
<!-- Begin page content -->
<main class="container-fluid h-100">
  <div class="row h-100">
    <div class="col-12 text-center mb-auto px-0">
      <header class="header">
        <div class="row">
          <div class="col-auto">
            <a href="{{ route('home') }}" target="_self" class="btn btn-light btn-44">
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
          <h1>{{ __('Institution Registration - Step 1') }}</h1>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('institution.registration.step2') }}" class="was-validated">
            @csrf
            <div class="form-floating is-valid mb-3">
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name" required>
              <label for="name">{{ __('Name') }}</label>
              @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-floating is-valid mb-3">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required>
              <label for="email">{{ __('Email Address') }}</label>
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-floating is-valid mb-3">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
              <label for="password">{{ __('Password') }}</label>
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-floating is-valid mb-3">
              <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" placeholder="Phone Number" required>
              <label for="phone_number">{{ __('Phone Number') }}</label>
              @error('phone_number')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-floating is-valid mb-3">
              <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" placeholder="Country" required>
              <label for="country">{{ __('Country') }}</label>
              @error('country')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-floating is-valid mb-3">
              <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" placeholder="City" required>
              <label for="city">{{ __('City') }}</label>
              @error('city')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-floating is-valid mb-3">
              <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="Address" required>
              <label for="address">{{ __('Address') }}</label>
              @error('address')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <button type="submit" class="btn btn-lg btn-default w-100 mb-4 shadow">
              {{ __('Next') }}
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
