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
                            <h1>Links</h1>
                            <a href="{{ route('country-data.links.create') }}" class="btn btn-primary float-end">Create New Record</a>
</div>


    <div class="card-body">

    @if(count($links) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    {{-- <th>Country Name</th> --}}
                    <th>Title</th>
                    <th>URL</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($links as $link)
                    <tr>
                        {{-- <td>{{ $country->country_name }}</td> --}}
                        <!-- <td>{{ $link->title }}</td> -->
                        <td>{{ strlen($link->title) > 50 ? substr($link->title, 0, 50) . '...' : $link->title }}</td> 
                        <td>{{ strlen($link->url) > 50 ? substr($link->url, 0, 50) . '...' : $link->url }}</td> 
                        <!-- <td>{{ $link->url }}</td>  -->
                        <td>
                            {{-- <a href="{{ route('country-data.links.show', $link->id) }}" class="btn btn-info">View</a> --}}
                            <a href="{{ route('country-data.show', $link->country_id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('country-data.links.edit', $link->id) }}" class="btn btn-primary" target="_blank">Edit</a>
                            <!-- <form action="{{ route('country-data.destroy', $link->id) }}" method="POST" style="display: inline;">
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