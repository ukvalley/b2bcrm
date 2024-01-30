@extends('admin.panel.layout')

@section('content')
<!-- Begin page content -->
<!-- <main class="container-fluid h-100">
  <div class="row h-100"> -->
    <!-- <div class="col-12 text-center mb-auto px-0">
      <header class="header">
        <div class="row">
          <div class="col-auto">
          <a href="{{url('/')}}/" target="_self" class="btn btn-light btn-44">
              <svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px" viewBox="0 0 400.004 400.004" xml:space="preserve">
                <g>
                  <path d="M382.688,182.686H59.116l77.209-77.214c6.764-6.76,6.764-17.726,0-24.485c-6.764-6.764-17.73-6.764-24.484,0L5.073,187.757
		c-6.764,6.76-6.764,17.727,0,24.485l106.768,106.775c3.381,3.383,7.812,5.072,12.242,5.072c4.43,0,8.861-1.689,12.242-5.072
		c6.764-6.76,6.764-17.726,0-24.484l-77.209-77.218h323.572c9.562,0,17.316-7.753,17.316-17.315
		C400.004,190.438,392.251,182.686,382.688,182.686z" />
                </g>
              </svg>

            </a>
          </div>
          <div class="col align-self-center">
            <h5 class="text-white">{{ $siteName }}</h5>
          </div>
          <div class="col-auto">
            <a class="btn btn-light btn-44 invisible"></a>
          </div>
        </div>
      </header>
    </div> -->
    <div class="col-10 col-md-8 col-lg-5 col-xl-6 mx-auto align-self-center text-center py-4">
      <div class="card">
        <div class="card-header">
          <h1>{{ __('Institution Registration ') }}</h1>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('admin.institutionstore') }}" class="was-validated">
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
              <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" placeholder="Phone Number" required>
              <label for="phone_number">{{ __('Phone Number') }}</label>
              @error('phone_number')
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
            <div class="form-floating is-valid mb-3">
                  <input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') }}" placeholder="Website">
                  <label for="website">{{ __('Website') }}</label>
                  @error('website')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
            </div>
            <div class="form-floating is-valid mb-3">
                  <input id="contact_person" type="text" class="form-control @error('contact_person') is-invalid @enderror" name="contact_person" value="{{ old('contact_person') }}" placeholder="Contact Person" required>
                  <label for="contact_person">{{ __('Contact Person') }}</label>
                  @error('contact_person')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-floating is-valid mb-3">
                  <input id="contact_email" type="email" class="form-control @error('contact_email') is-invalid @enderror" name="contact_email" value="{{ old('contact_email') }}" placeholder="Contact Email" required>
                  <label for="contact_email">{{ __('Contact Email') }}</label>
                  @error('contact_email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-floating is-valid mb-3">
                  <input id="contact_phone" type="text" class="form-control @error('contact_phone') is-invalid @enderror" name="contact_phone" value="{{ old('contact_phone') }}" placeholder="Contact Phone" required>
                  <label for="contact_phone">{{ __('Contact Phone') }}</label>
                  @error('contact_phone')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-floating is-valid mb-3">
                  <input id="institution_type" type="text" class="form-control @error('institution_type') is-invalid @enderror" name="institution_type" value="{{ old('institution_type') }}" placeholder="Institution Type" required>
                  <label for="institution_type">{{ __('Institution Type') }}</label>
                  @error('institution_type')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-check mb-3">
                  <input class="form-check-input @error('accreditation_status') is-invalid @enderror" type="checkbox" name="accreditation_status" value="1" id="accreditation_status" {{ old('accreditation_status') ? 'checked' : '' }}>
                  <label class="form-check-label" for="accreditation_status">{{ __('Accreditation Status') }}</label>
                  @error('accreditation_status')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-floating is-valid mb-3">
                  <input id="number_of_students" type="number" class="form-control @error('number_of_students') is-invalid @enderror" name="number_of_students" value="{{ old('number_of_students') }}" placeholder="Number of Students" required>
                  <label for="number_of_students">{{ __('Number of Students') }}</label>
                  @error('number_of_students')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-floating is-valid mb-3">
                  <input id="year_founded" type="number" class="form-control @error('year_founded') is-invalid @enderror" name="year_founded" value="{{ old('year_founded') }}" placeholder="Year Founded" required>
                  <label for="year_founded">{{ __('Year Founded') }}</label>
                  @error('year_founded')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
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
            <button type="submit" class="btn btn-lg btn-default w-100 mb-4 shadow">
              {{ __('Submit') }}
            </button>
          </form>
        </div>
      </div>
    </div>
  <!-- </div>
</main> -->
@endsection
