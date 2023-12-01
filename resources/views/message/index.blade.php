@extends('recruiter.panel.layout')

@section('content')

<!-- Begin page -->
<!-- Begin page -->

<div class="main-container container">
    <!-- welcome user -->



    <!-- Student Registration Step 1 Form -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title">Message</h4>
                    <p class="card-text"></p>
                    <hr>

                    <table id="students-table" class="table table-container">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $key => $student)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$student->first_name}}</td>
                                <td>
                                    <a href="{{ route('message_view', [$student->id, $student->user_id]) }}">
                                        <button class="btn btn-primary">Message</button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

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