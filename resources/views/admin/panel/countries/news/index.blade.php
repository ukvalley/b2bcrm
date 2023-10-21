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
                            <h1>News</h1>
                            <a href="{{ route('country-data.news.create') }}" class="btn btn-primary float-end">Create New Record</a>
</div>


    <div class="card-body">

    @if(count($news) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    {{-- <th>Country Name</th> --}}
                    <th>Title</th>
                    <th>Content</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($news as $new)
                    <tr>
                        {{-- <td>{{ $country->country_name }}</td> --}}
                        <td>{{ $new->title }}</td>
                        <td>{{ $new->content }}</td> 
                        <td>
                            {{-- <a href="{{ route('country-data.news.show', $new->id) }}" class="btn btn-info">View</a> --}}
                            <a href="{{ route('country-data.show', $new->country_id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('country-data.news.edit', $new->id) }}" class="btn btn-primary">Edit</a>
                            <!-- <form action="{{ route('country-data.destroy', $new->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form> -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No records found.</p>
    @endif
</div>
</div>
</div>
</div>
</div>
@endsection