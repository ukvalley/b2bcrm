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
                        <h1>Country Data</h1>
                        <a href="{{ route('country-data.create') }}" class="btn btn-primary float-end">Create New Record</a>
                    </div>


                    <div class="card-body">

                        @if(count($countries) > 0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Country Name</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($countries as $country)
                                <tr>
                                    <td>{{ $country->country_name }}</td>
                                    <td>{{ $country->created_at }}</td>
                                    <td>
                                        <a href="{{ route('country-data.show', $country->id) }}" class="btn btn-info">View</a>
                                        <a href="{{ route('country-data.edit', $country->id) }}" class="btn btn-primary">Edit</a>
                                        <!-- <form action="{{ route('country-data.destroy', $country->id) }}" method="POST" style="display: inline;">
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