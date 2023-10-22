@extends('institution.panel.layout')

@section('content')

<!-- Begin page -->
<!-- Begin page -->

<!-- Header ends -->
<div class="main-container container">



    <!-- Student Registration Step 1 Form -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">


                    @include('institution.panel.course.nav_pill_course')


                    <h4 class="card-title">Batches Information</h4>
                  
                    <table class="table mt-5">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Year</th>
                        <th scope="col">Quarter</th>
                        <th scope="col">Months</th>
                        <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                    @foreach($courseBatch as $key=>$item)
                        <tr>
                        
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$item->batch->year}}</td>
                        <td>{{$item->batch->quarter}}</td>
                        <td>{{$item->batch->months}}</td>
                        
                        <td>
                            <form action="{{ route('updateStatus', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="status" id="status">
                                    <option value="Active" {{ $item->status === 'Active' ? 'selected' : '' }}>Active</option>
                                    <option value="Inactive" {{ $item->status === 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                    <option value="Batch_full" {{ $item->status === 'Batch_full' ? 'selected' : '' }}>Batch Full</option>
                                </select>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
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