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



            


        <!-- Student Registration Step 1 Form -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">

                        <h4 class="card-title">Add/Edit Student</h4>
                        <hr>

                       @include('recruiter.panel.student.nav_pill_studen')



                        <h4 class="card-title">Student Persona</h4>
                        <p class="card-text">Please provide your personal information.</p>

                        <hr>
    

<form method="POST" action="{{route('agent.StudentPersonalDetailRegistration', ['id' => $student->id]) }}" enctype="multipart/form-data">
    @csrf

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <!-- Address 1 -->
    <div class="mb-3">
        <label for="address_1" class="form-label">Address 1</label>
        <input type="text" class="form-control" id="address1" name="address1" value="{{ old('address1',$personaDetail->address1) }}" required >
        @error('address1')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- Address 2 -->
    <div class="mb-3">
        <label for="address_2" class="form-label">Address 2</label>
        <input type="text" class="form-control" id="address2" name="address2" value="{{ old('address2',$personaDetail->address2) }}">
        @error('address2')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- City -->
    <div class="mb-3">
        <label for="city" class="form-label">City</label>
        <input type="text" class="form-control" id="city" name="city" value="{{ old('city',$personaDetail->city) }}" required>
        @error('city')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- State / Province -->
    <div class="mb-3">
        <label for="state_province" class="form-label">State / Province</label>
        <input type="text" class="form-control" id="state_province" name="state_province" value="{{ old('state_province',$personaDetail->state_province) }}" required>
        @error('state_province')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- Country (Select Option) -->
    <div class="mb-3">
        <label for="country" class="form-label">Country</label>
        <select class="form-select" id="country" name="country">
            <option value="">Select a Country</option>
            
            @foreach($countries as $country)
            <option value="{{ $country->name }}" {{ old('country', $personaDetail->country) == $country->name ? 'selected' : '' }}>
                {{ $country->name }}
            </option>
        @endforeach
            
            <!-- Add options for countries here -->
        </select>

        @error('country')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- Postcode / Zipcode -->
    <div class="mb-3">
        <label for="postcode" class="form-label">Postcode / Zipcode</label>
        <input type="text" class="form-control" id="postcode" name="postcode" value="{{ old('postcode',$personaDetail->postcode) }}" required>
        @error('postcode')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- Date of Birth -->
    <div class="mb-3">
        <label for="date_of_birth" class="form-label">Date of Birth</label>
        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth',$personaDetail->date_of_birth) }}" required>
        @error('date_of_birth')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- Marital Status (Select Option) -->
    <div class="mb-3">
        <label for="marital_status" class="form-label">Marital Status</label>
        <select class="form-select" id="marital_status" name="marital_status">
            <option value="">Select Marital Status</option>
            <option value="Single" {{ old('marital_status', $personaDetail->marital_status) =='Single' ? 'selected' : '' }}>Single</option>
            <option value="Married" {{ old('marital_status', $personaDetail->marital_status) =='Married' ? 'selected' : '' }}>Married</option>
            <!-- Add other options as needed -->
        </select>
        @error('marital_status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- Timezone (Select Option) -->
    <div class="mb-3">
        <label for="timezone" class="form-label">Timezone</label>
        <select class="form-select" id="timezone" name="timezone">
            <option value="">Select Timezone</option>
            @foreach($timezones as $timezone)
            <option value="{{ $timezone->timezone }}" {{ old('timezone', $personaDetail->timezone) == $timezone->timezone ? 'selected' : '' }}>
                {{ $timezone->name }}
            </option>
        @endforeach
        </select>
        @error('timezone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- Currency -->
    <div class="mb-3">
        <label for="currency" class a="form-label">Currency</label>
        
        <select class="form-select" id="currency" name="currency">
            <option value="">Select Currency</option>
            @foreach($currency as $currency)
            <option value="{{ $currency->currency_code }}" {{ old('currency', $personaDetail->currency) == $currency->currency_code ? 'selected' : '' }}>
                {{ $currency->currency_code }} {{$currency->currency_name}}
            </option>
        @endforeach
        </select>
        @error('currency')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- Image Profile -->
    <div class="mb-3">
        <label for="image_profile" class="form-label">Image Profile</label>
        <input type="file" class="form-control" id="image_profile" name="image_profile">

        @error('image_profile')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group mb-3">
        <button type="submit" class="btn btn-default btn-lg w-100">Save</button>
    </div>
</form>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main page content ends -->
</div>
</main>
<!-- Page ends -->

@endsection
