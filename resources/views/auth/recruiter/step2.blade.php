@extends('auth.recruiter.layout') 
{{-- Assuming you have a layout for recruiter registration --}}
@section('content')
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
                        <h5 class="text-white">{{ $siteName }}</h5>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-light btn-44 invisible"></a>
                    </div>
                </div>
            </header>
        </div>
        <div class="col-10 col-md-8 col-lg-5 col-xl-6 mx-auto align-self-center py-4">
            <div class="card">
                <div class="card-header">
                    <h1>{{ __('Recruiter Registration - Step 2') }}</h1>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('recruiter.registration.step3') }}" class="was-validated">
                        @csrf

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

                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-default w-100 mb-4 shadow mt-2">
                                {{ __('Next') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
