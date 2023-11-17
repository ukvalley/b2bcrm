
@extends('auth.recruiter.layout') 
{{-- Extend your main layout if applicable --}}

@section('content') {{-- Define the content section --}}
<main class="container-fluid h-100">
    <div class="row h-100">
        <div class="col-12 text-center mb-auto px-0">
            <header class="header">
                <div class="row">
                    <div class="col-auto">
                        <a href="{{ route('recruiter.registration.step4') }}" target="_self" class="btn btn-light btn-44">
                            <i class="bi bi-arrow-left"></i>
                        </a>
                    </div>
                    <div class="col align-self-center">
                        <h5 class="text-white">Recruiter Registration - Step 4</h5>
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
                    <h1>Complete Registration</h1>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('recruiter.registration.step5') }}" class="was-validated">
                        @csrf {{-- Add CSRF protection --}}

                        {{-- Add checkboxes for T&C and authorization --}}
                        <div class="form-check is-valid mb-3">
                            <input class="form-check-input" type="checkbox" name="accept_terms" id="accept_terms" required>
                            <label class="form-check-label" for="accept_terms">
                                I accept the Terms and Conditions
                            </label>
                        </div>

                        <div class="form-check is-valid mb-3">
                            <input class="form-check-input" type="checkbox" name="authorized_signup" id="authorized_signup" required>
                            <label class="form-check-label" for="authorized_signup">
                                I am authorized to sign up on behalf of the company
                            </label>
                        </div>

                        <button type="submit" class="btn btn-lg btn-default w-100 mb-4 shadow">Complete Registration</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
