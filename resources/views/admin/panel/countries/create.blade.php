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

    <form method="POST" action="{{ route('country-data.store') }}" enctype="multipart/form-data">
        @csrf

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
            <input type="text" name="country_name" class="form-control" placeholder="Country Name">
        </div>
        <!-- Add fields for other columns here -->


        <div class="form-group">
            <label for="urban_environment">Urban Environment</label>
            <textarea name="urban_environment" class="form-control" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label for="diverse_scenery">Diverse Scenery</label>
            <textarea name="diverse_scenery" class="form-control" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label for="distinctive_native_animals">Distinctive Native Animals</label>
            <textarea name="distinctive_native_animals" class="form-control" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label for="student_cities">Student Cities (comma-separated)</label>
            <input type="text" name="student_cities" class="form-control" placeholder="City 1, City 2, City 3">
        </div>

        <div class="form-group">
            <label for="country_header_image">Country Header Image</label>
            <input type="file" name="country_header_image" class="form-control-file">
        </div>

        <div class="form-group">
            <label for="youtube_link">YouTube Link</label>
            <input type="text" name="youtube_link" class="form-control" placeholder="YouTube Link">
        </div>


        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
</div>
</div>
</div>
</div>
@endsection