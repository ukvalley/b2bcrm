@extends('admin.panel.layout')

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


                    @include('admin.panel.course.nav_pill_course')


                    <h4 class="card-title">Batches Information</h4>

                    <table class="table mt-5">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Year</th>
                                <th scope="col">Quarter</th>
                                <th scope="col">Months</th>
                                <th scope="col">Action</th>

<<<<<<< HEAD
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courseBatch as $key=>$item)
                            <tr>
=======
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
                            <form action="{{ route('admin.updateStatus', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="status" id="status">
                                <!-- <option value="diploma" @if($course->level == "Diploma") Selected @endif>Diploma</option> -->
                                    <option value="Active" @if($item->status == 'Active') Selected @endif>Active</option>
                                    <option value="Inactive" @if($item->status == 'Inactive') Selected @endif>Inactive</option>
                                    <option value="Batch_full" @if($item->status == 'Batch_full' ) Selected @endif>Batch Full</option>
                                </select>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </td>
                       
>>>>>>> f193e502f1af40d5675e6adaf5a69c5714f1b2ef

                                <th scope="row">{{$key+1}}</th>
                                <td>{{$item->batch->year}}</td>
                                <td>{{$item->batch->quarter}}</td>
                                <td>{{$item->batch->months}}</td>

                                <td>
                                    <form action="{{ route('admin.CourseUpdate', $item->id) }}" method="POST">
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