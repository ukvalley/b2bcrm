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
