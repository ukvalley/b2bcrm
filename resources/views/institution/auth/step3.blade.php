@extends('institution.auth.layout')

@section('content')
<!-- Begin page content -->
<main class="container-fluid h-100">
  <div class="row h-100">
    <div class="col-12 text-center mb-auto px-0">
      <header class="header">
        <div class="row">
          <div class="col-auto">
            <!-- <a href="{{ route('home') }}" target="_self" class="btn btn-light btn-44">
              <i class="bi bi-arrow-left"></i>
            </a> -->
          </div>
          <div class="col align-self-center">
            <h5 class="text-white">{{ $siteName }}</h5>
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
          <h1>{{ __('Institution Registration - Step 3') }}</h1>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('institution.registration.step4') }}" class="was-validated" enctype="multipart/form-data">
            @csrf
            <div class="form-floating is-valid mb-3">
              <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description">{{ old('description') }}</textarea>
              <label for="description">{{ __('Description') }}</label>
              @error('description')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-floating is-valid mb-3">
              <input id="logo" type="file" class="form-control @error('logo') is-invalid @enderror" name="logo">
              <label for="logo">{{ __('Logo (Max 2MB)') }}</label>
              @error('logo')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="form-floating is-valid mb-3">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $institution->name) }}" placeholder="Name" required>
                            <label for="name">{{ __('Name') }}</label>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                        <div class="form-floating is-valid mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $institution->email) }}" placeholder="Email" required>
                            <label for="email">{{ __('Email Address') }}</label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- ... (previous form fields) ... -->

                        <div class="form-floating is-valid mb-3">
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description">{{ old('description', $institution->description) }}</textarea>
                            <label for="description">{{ __('Description') }}</label>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-floating is-valid mb-3">
                            <input id="logo" type="file" class="form-control @error('logo') is-invalid @enderror" name="logo">
                            <label for="logo">{{ __('Logo (Max 2MB)') }}</label>
                            @error('logo')
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
