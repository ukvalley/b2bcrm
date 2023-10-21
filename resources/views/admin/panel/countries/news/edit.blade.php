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
                            <h1>Edit News</h1>
                            
</div>


    <div class="card-body">

    <form method="POST" action="{{ route('country-data.news.update', ['id' => $news->id]) }}" enctype="multipart/form-data">
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
            <label for="country_name">Select Country</label>
            <select name="country_id" id="country_id" class="form-control">
                @foreach ($countrydata as $cd)
                {{-- <option value="{{$cd->id}}">{{$cd->country_name}}</option> --}}
                <option value="{{$cd->id}}" {{ $cd->id == $news->country_id ? 'selected' : '' }}>
                    {{$cd->country_name}}
                </option>
                @endforeach
            </select>
        </div>
        <!-- Add fields for other columns here -->

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $news->title }}">
        </div>

       
        <div class="form-group">
            <label for="content">Content</label>

            <textarea name="content" id="content" style="display: none;">{{ $news->content }}</textarea>
        
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
    .create( document.querySelector( '#content' ) )
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
        const ckeditorContent = ClassicEditor.instances.content.getData();
        document.querySelector('#content').value = ckeditorContent;
    });
</script>
@endsection