@extends('admin.panel.layout')


@section('content')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.css">

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
            <label for="information_data">Enter Data</label>

           
         <textarea name="information_data" id="information_data" style="display: none;"></textarea>
            

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

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>


<script>
    ClassicEditor
    .create( document.querySelector( '#information_data' ) )
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
        const ckeditorContent = ClassicEditor.instances.information_data.getData();
        document.querySelector('#information_data').value = ckeditorContent;
    });
</script>
@endsection