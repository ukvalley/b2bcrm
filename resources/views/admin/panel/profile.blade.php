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
                            <h1>Setting</h1>
                            
</div>


    <div class="card-body">

    <form method="POST" action="{{ route('project.update', ['id' => $data->id]) }}" enctype="multipart/form-data">
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
            <label for="site_name">Site Name</label>
            <input type="text" name="site_name" class="form-control" value="{{ $data->site_name }}">
        </div>

        <div class="form-group">
            <label for="site_description">Site Description</label>
         <textarea name="site_description" id="site_description" style="display: none;">{{$data->site_description}}</textarea>
        </div>
        <div class="form-group">
            <label for="site_logo">Site Logo</label>
            <input type="file" name="site_logo" class="form-control-file" value="{{ $data->site_logo }}">
        </div>

        <div class="form-group">
            <label for="site_favicon">Favicon</label>
            <input type="file" name="site_favicon" class="form-control-file" value="{{ $data->site_favicon }}">
        </div>
        <div class="form-group">
            <label for="primary_color">Primary Color</label>
            <input type="color" name="primary_color" class="form-control" value="{{ $data->primary_color }}">
        </div>
        <div class="form-group">
            <label for="secondary_color">Secondary Color</label>
            <input type="color" name="secondary_color" class="form-control" value="{{ $data->secondary_color }}">
        </div>

        <div class="form-group">
            <label for="youtube_link">Youtube Link</label>
            <input type="text" name="youtube_link" class="form-control" value="{{ $data->youtube_link }}">
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


<script>
    ClassicEditor
    .create( document.querySelector( '#site_description' ) )
    .then( newEditor => {
        editor = newEditor;
    } )
    .catch( error => {
        console.error( error );
    } );



</script>

<script>
    // When the form is submitted, update the textarea with CKEditor's content
    document.querySelector('form').addEventListener('submit', function() {
        const ckeditorContent = ClassicEditor.instances.site_description.getData();
        document.querySelector('#site_description').value = ckeditorContent;
    });
</script>
@endsection