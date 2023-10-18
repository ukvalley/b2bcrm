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
                            <h1>Add New Country</h1>
                            
</div>


    <div class="card-body">

    <form method="POST" action="{{ route('admin.country-data.update', ['country_data' => $countryData->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Use the PUT method for updates -->

        <div class="form-group">
            <label for="country_name">Country Name</label>
            <input type="text" name="country_name" class="form-control" value="{{ $countryData->country_name }}">
        </div>

        <div class="form-group">
            <label for="urban_environment">Urban Environment</label>
            <textarea name="urban_environment" class="form-control">{{ $countryData->urban_environment }}</textarea>
        </div>

        <div class="form-group">
            <label for="diverse_scenery">Diverse Scenery</label>
            <textarea name="diverse_scenery" class="form-control">{{ $countryData->diverse_scenery }}</textarea>
        </div>

        <div class="form-group">
            <label for="distinctive_native_animals">Distinctive Native Animals</label>
            <textarea name="distinctive_native_animals" class="form-control">{{ $countryData->distinctive_native_animals }}</textarea>
        </div>

        <div class="form-group">
            <label for="student_cities">Student Cities (comma-separated)</label>
            <input type="text" name="student_cities" class="form-control" value="{{ $countryData->student_cities }}">
        </div>

        <div class="form-group">
            <label for="country_header_image">Country Header Image</label>
            <input type="file" name="country_header_image" class="form-control-file">
        </div>

        <div class="form-group">
            <label for="youtube_link">YouTube Link</label>
            <input type="text" name="youtube_link" class="form-control" value="{{ $countryData->youtube_link }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    
</div>
</div>
</div>
</div>
</div>
@endsection