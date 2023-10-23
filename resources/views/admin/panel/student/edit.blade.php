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
                            <h1>Edit Student Data</h1>
                            
</div>


    <div class="card-body">

    <form method="POST" action="{{ route('admin.country-data.update', ['country_data' => $countryData->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Use the PUT method for updates -->

         <div class="validation-errors">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

        <div class="form-group">
            <label for="country_name">Country Name</label>
            <input type="text" name="country_name" class="form-control" value="{{ $countryData->country_name }}">
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

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>



@endsection