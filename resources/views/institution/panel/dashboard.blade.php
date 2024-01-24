@extends('institution.panel.layout')

@section('content')


<!-- Header ends -->

<!-- main page content -->
<div class="main-container container">
    <!-- welcome user -->
    <div class="row mb-4">
        <div class="col-auto">
            <!-- <div class="avatar avatar-50 shadow rounded-10">
                        <img src="{{url('/')}}/theme/img/user1.jpg" alt="">
                    </div> -->
            <div class="avatar avatar-60 shadow rounded-10">
                <?php
                $user = auth()->user();


                if ($user->institution) {

                    $institutelogo = $user->institution->logo;
                } else {

                    $institutelogo = '';
                }
                ?>

                <div class="col-auto">
                    <a href="{{url('/')}}/institution/EditProfile" target="_self" class="btn btn-light btn-44">
                        @if($institutelogo)
                        <img src="{{url('/')}}/institute_img/{{$institutelogo}}" alt="Recruiter Image" style="width: -webkit-fill-available;">
                        @else
                        <!-- If no image is available, you can use a default image or display some placeholder -->
                        <i class="bi bi-person"></i> <!-- Assuming you want to use a person icon for the profile -->
                        @endif
                    </a>
                </div>

                <!-- <img src="{{url('/')}}/theme/img/user1.jpg" alt=""> -->
            </div>
        </div>
        <div class="col align-self-center ps-0">
            <h4 class="text-color-theme"><span class="fw-normal">Hi</span>, {{ Auth::user()->name }}!</h4>
            <p class="text-muted">Welcome back, we're happy to have you here!</p>
        </div>
    </div>

    <div class="row">
        <div class="col-3">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header">Agents</div>
                <div class="card-body">
                    <!-- <h5 class="card-title">Info card title</h5> -->
                    <h5 class="card-title">{{ $totalCourse }}</h5>
                    <p class="card-text">Total Course</p>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                </div>
            </div>
        </div>
    </div>

    <!-- connection -->


    <!-- Dark mode switch -->
    <!-- <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body"> -->
                    <!-- <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="darkmodeswitch">
                                <label class="form-check-label text-muted px-2 " for="darkmodeswitch">Activate Dark
                                    Mode</label>
                            </div> -->
                <!-- </div>
            </div>
        </div>
    </div> -->





</div>
<!-- main page content ends -->


</main>
<!-- Page ends-->



@endsection