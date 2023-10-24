@extends('recruiter.panel.layout')

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
            <h4 class="text-color-theme"><span class="fw-normal">Hi</span>, {{ Auth::user()->name }}!</h4>
            <p class="text-muted">Welcome back, we're happy to have you here!</p>
        </div>
    </div>



    <!-- connection -->

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">
                <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header" style="#a9a9a92b"> <img  src="{{url('/')}}/theme/icons/contact-form.png" style="width: 20%;" alt="">
                        <strong>1 </strong> <span style="font-size: 11px;">Application Submitted   </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">

                                <h5 class="card-title">2</h5>
                            </div>
                            <div class="col-6">

                                <p class="card-text" style="font-size: 11px;">Applications not Submitted</p>
                            </div>
                            <div class="col-6">
                                <a href="" class="btn btn-default btn-sm" style="font-size:10px;">Submit now</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-md-3">
                <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header" style="#a9a9a92b"> <img  src="{{url('/')}}/theme/icons/institution.png" style="width: 20%;" alt="">
                        <strong>1 </strong> <span style="font-size: 11px;">Lodged with institutions </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">

                                <h5 class="card-title">2</h5>
                            </div>
                            <div class="col-6">

                                <p class="card-text" style="font-size: 11px;">Missing info or
documents</p>
                            </div>
                            <div class="col-6">
                                <a href="" class="btn btn-default btn-sm" style="font-size:10px;">Add now</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-md-3">
                <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header" style="#a9a9a92b"> <img  src="{{url('/')}}/theme/icons/contract.png" style="width: 20%;" alt="">
                        <strong>1 </strong> <span style="font-size: 11px;">Offer received   </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">

                                <h5 class="card-title">2</h5>
                            </div>
                            <div class="col-6">

                                <p class="card-text" style="font-size: 11px;">Offers not yet
accepted</p>
                            </div>
                            <div class="col-6">
                                <a href="" class="btn btn-default btn-sm" style="font-size:10px;">Accept now</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-md-3">
                <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header" style="#a9a9a92b"> <img  src="{{url('/')}}/theme/icons/travel.png" style="width: 20%;" alt="">
                        <strong>1 </strong> <span style="font-size: 11px;">
Visa granted</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">

                                <h5 class="card-title">2</h5>
                            </div>
                            <div class="col-6">

                                <p class="card-text" style="font-size: 11px;">Missing visa info
or documents</p>
                            </div>
                            <div class="col-6">
                                <a href="" class="btn btn-default btn-sm" style="font-size:10px;">Add now</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="row">
        <div class="col-8 card bg-info">
            <div class="card-header"><i class="bi bi-book" style="margin-right: 5px;"></i>Priority Task</div>
            <div class="row  bg-light text-dark">
                <div class="col-md-12">
                    <div class="card-body">
                       
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4 card bg-info">
            <div class="card-header"><i class="bi bi-book" style="margin-right: 5px;"></i>Messages</div>
            <div class="row  bg-light text-dark">
                <div class="col-md-12">
                    <div class="card-body">
                        <h5 class="card-title">
                            
                  </h5>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>




<br><br> <hr>


    <!-- Dark mode switch -->
    <div class="row mb-4">
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
    </div>





</div>
<!-- main page content ends -->


</main>
<!-- Page ends-->



@endsection