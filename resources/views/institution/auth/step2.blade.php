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
    <div class="col-10 col-md-8 col-lg-5 col-xl-6 mx-auto align-self-center  py-4">
      <div class="card">
        <div class="card-header">
          <h1>{{ __('Institution Registration - Step 2') }}</h1>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('institution.registration.step3') }}" class="was-validated">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-floating is-valid mb-3">
                  <input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') }}" placeholder="Website">
                  <label for="website">{{ __('Website') }}</label>
                  @error('website')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating is-valid mb-3">
                  <input id="contact_person" type="text" class="form-control @error('contact_person') is-invalid @enderror" name="contact_person" value="{{ old('contact_person') }}" placeholder="Contact Person" required>
                  <label for="contact_person">{{ __('Contact Person') }}</label>
                  @error('contact_person')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-floating is-valid mb-3">
                  <input id="contact_email" type="email" class="form-control @error('contact_email') is-invalid @enderror" name="contact_email" value="{{ old('contact_email') }}" placeholder="Contact Email" required>
                  <label for="contact_email">{{ __('Contact Email') }}</label>
                  @error('contact_email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating is-valid mb-3">
                  <input id="contact_phone" type="text" class="form-control @error('contact_phone') is-invalid @enderror" name="contact_phone" value="{{ old('contact_phone') }}" placeholder="Contact Phone" required>
                  <label for="contact_phone">{{ __('Contact Phone') }}</label>
                  @error('contact_phone')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-floating is-valid mb-3">
                  <input id="institution_type" type="text" class="form-control @error('institution_type') is-invalid @enderror" name="institution_type" value="{{ old('institution_type') }}" placeholder="Institution Type" required>
                  <label for="institution_type">{{ __('Institution Type') }}</label>
                  @error('institution_type')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-check mb-3">
                  <input class="form-check-input @error('accreditation_status') is-invalid @enderror" type="checkbox" name="accreditation_status" value="1" id="accreditation_status" {{ old('accreditation_status') ? 'checked' : '' }}>
                  <label class="form-check-label" for="accreditation_status">{{ __('Accreditation Status') }}</label>
                  @error('accreditation_status')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-floating is-valid mb-3">
                  <input id="number_of_students" type="number" class="form-control @error('number_of_students') is-invalid @enderror" name="number_of_students" value="{{ old('number_of_students') }}" placeholder="Number of Students" required>
                  <label for="number_of_students">{{ __('Number of Students') }}</label>
                  @error('number_of_students')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating is-valid mb-3">
                  <input id="year_founded" type="number" class="form-control @error('year_founded') is-invalid @enderror" name="year_founded" value="{{ old('year_founded') }}" placeholder="Year Founded" required>
                  <label for="year_founded">{{ __('Year Founded') }}</label>
                  @error('year_founded')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
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