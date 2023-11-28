@extends('admin.panel.layout')


@section('content')


 <!-- main page content -->
<div class="main-container container">


    <!-- Dark mode switch -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="col-md-12">
                            <h1>{{$institution->name}}</h1>
                            <h5>Edit</h5>
                            
</div>


    <div class="card-body">

    <form method="POST" action="{{ route('admin.updateInstitution', ['institution_id' => $institution->id]) }}" enctype="multipart/form-data">

    @csrf
                        <div class="form-floating is-valid mb-3">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $institution->name) }}" placeholder="Name" >
                            <label for="name">{{ __('Name') }}</label>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                        <div class="form-floating is-valid mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $institution->email) }}" placeholder="Email" >
                            <label for="email">{{ __('Email Address') }}</label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                        
                        <div class="form-floating is-valid mb-3">
                            <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number', $institution->phone_number) }}" placeholder="Phone Number" >
                            <label for="phone_number">{{ __('Phone Number') }}</label>
                            @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                      <!-- add country -->
                        <div class="form-floating is-valid mb-3">
                            <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city', $institution->city) }}" placeholder="City" >
                            <label for="city">{{ __('City') }}</label>
                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-floating is-valid mb-3">
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $institution->address) }}" placeholder="Address" >
                            <label for="address">{{ __('Address') }}</label>
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="row">
    <div class="col-md-6">
        <div class="form-floating is-valid mb-3">
            <input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website', $institution->website) }}" placeholder="Website">
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
            <input id="contact_person" type="text" class="form-control @error('contact_person') is-invalid @enderror" name="contact_person" value="{{ old('contact_person', $institution->contact_person) }}" placeholder="Contact Person" >
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
            <input id="contact_email" type="email" class="form-control @error('contact_email') is-invalid @enderror" name="contact_email" value="{{ old('contact_email', $institution->contact_email) }}" placeholder="Contact Email" >
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
            <input id="contact_phone" type="text" class="form-control @error('contact_phone') is-invalid @enderror" name="contact_phone" value="{{ old('contact_phone', $institution->contact_phone) }}" placeholder="Contact Phone" >
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
            <input id="institution_type" type="text" class="form-control @error('institution_type') is-invalid @enderror" name="institution_type" value="{{ old('institution_type', $institution->institution_type) }}" placeholder="Institution Type" >
            <label for="institution_type">{{ __('Institution Type') }}</label>
            @error('institution_type')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-floating is-valid mb-3">
            <input id="number_of_students" type="number" class="form-control @error('number_of_students') is-invalid @enderror" name="number_of_students" value="{{ old('number_of_students', $institution->number_of_students) }}" placeholder="Number of Students" >
            <label for="number_of_students">{{ __('Number of Students') }}</label>
            @error('number_of_students')
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
            <input id="year_founded" type="number" class="form-control @error('year_founded') is-invalid @enderror" name="year_founded" value="{{ old('year_founded', $institution->year_founded) }}" placeholder="Year Founded" >
            <label for="year_founded">{{ __('Year Founded') }}</label>
            @error('year_founded')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>



<div class="form-floating is-valid mb-3">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $institution->name) }}" placeholder="Name" >
                            <label for="name">{{ __('Name') }}</label>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                        <div class="form-floating is-valid mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $institution->email) }}" placeholder="Email" >
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

                       

                        
                        {{-- Other form fields --}}
                        <button type="submit" class="btn btn-lg btn-default w-100 mb-4 shadow">
                            {{ __('Update') }}
                        </button>
                    </form>
    
</div>
</div>
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>



@endsection