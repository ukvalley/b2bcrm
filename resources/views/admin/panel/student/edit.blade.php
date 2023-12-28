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

    <form method="POST" action="{{ route('admin.updatestudent', ['student_id' => $student->id]) }}" enctype="multipart/form-data">
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
            <label for="first_name">Student Name</label>
            <input type="text" name="first_name" class="form-control" value="{{ $student->first_name }}">
        </div>

        <div class="form-group">
            <label for="date_of_birth">Date Of Birth</label>
            <input type="text" name="date_of_birth" class="form-control" value="{{ $student->date_of_birth }}">
        </div>
        
        <div class="form-group">
            <label for="gender">Gender</label>
            <input type="text" name="gender" class="form-control" value="{{ $student->gender }}">
        </div>

        <div class="form-group">
            <label for="nationality">Nationality</label>
            <input type="text" name="nationality" class="form-control" value="{{ $student->nationality }}">
        </div>
        
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" value="{{ $student->address }}">
        </div>

        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" name="phone_number" class="form-control" value="{{ $student->phone_number }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" value="{{ $student->email }}">
        </div>

        <div class="form-group">
            <label for="current_school">Current School</label>
            <input type="text" name="current_school" class="form-control" value="{{ $student->current_school }}">
        </div>

        <div class="form-group">
            <label for="field_of_study">Field of study</label>
            <input type="text" name="field_of_study" class="form-control" value="{{ $student->field_of_study }}">
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