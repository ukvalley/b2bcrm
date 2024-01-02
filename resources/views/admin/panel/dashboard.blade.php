@extends('admin.panel.layout')

@section('content') 


<!-- Header ends -->

<!-- main page content -->
<div class="main-container container">
    <!-- welcome user -->
    <div class="row mb-4">
        <div class="col-auto">
            <div class="avatar avatar-50 shadow rounded-10">
                <img src="{{url('/')}}/theme/img/user1.jpg" alt="">
            </div>
        </div>
        <div class="col align-self-center ps-0">
            <h5 class="text-color-theme"><span class="fw-normal">Hi</span> , </h5>
            <!-- {{ Auth::user()->name }}! -->
            <p class="text-muted">Welcome to the Central Admin Panel </p>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header">Agents</div>
                <div class="card-body">
                    <!-- <h5 class="card-title">Info card title</h5> -->
                    <h5 class="card-title">{{ $totalAgents }}</h5>
                    <p class="card-text">Total agents</p>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header">Intitutes</div>
                <div class="card-body">
                    <!-- <h5 class="card-title">Info card title</h5> -->
                    <h5 class="card-title">{{ $totalInstitutions }}</h5>
                    <p class="card-text">Total Institutes</p>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header">Students</div>
                <div class="card-body">
                    <h5 class="card-title">{{$totalStudents}}</h5>
                    <p class="card-text">Total Students</p>
                    <!-- <h5 class="card-title">Info card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header">Cources</div>
                <div class="card-body">
                <h5 class="card-title">{{$totalCourses}}</h5>
                    <p class="card-text">Total Cources</p>
                    <!-- <h5 class="card-title">Info card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                </div>
            </div>
        </div>
        <!-- connection -->


        <!-- Dark mode switch -->
        <!-- <div class="row mb-4">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="darkmodeswitch">
                                <label class="form-check-label text-muted px-2 " for="darkmodeswitch">Activate Dark
                                    Mode</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->





    </div>
    <!-- main page content ends -->


    </main>
    <!-- Page ends-->



@endsection