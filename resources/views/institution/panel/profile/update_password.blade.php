@extends('institution.panel.layout')

@section('content')

<!-- Begin page -->
 <!-- Begin page -->
    <main class="">

        <!-- Header -->
        <header class="header position-fixed">
            <div class="row">
                <div class="col-auto">
                    <a href="javascript:void(0)" target="_self" class="btn btn-light btn-44 menu-btn">
                        <i class="bi bi-list"></i>
                    </a>
                </div>
                <div class="col align-self-center text-center">
                    <img src="https://civs.online/wp-content/uploads/2023/01/CIVS-White-01-1024x285.png" width="200px" alt="">
                    
                </div>
                <div class="col-auto">
                    <a href="notifications.html" target="_self" class="btn btn-light btn-44">
                        <i class="bi bi-bell"></i>
                        <span class="count-indicator"></span>
                    </a>
                </div>
            </div>
        </header>
        <!-- Header ends -->
         <div class="main-container container">
            <!-- welcome user -->
            
        <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">{{ __('Edit Recruiter Profile') }}</div>
                

                <div class="card-body">

                <nav class="nav nav-pills">
                    <a class="nav-link {{ request()->routeIs('institution.edit') ? 'active' : '' }}" href="{{ route('institution.edit') }}">Basic Details</a>
                    <a class="nav-link {{ request()->routeIs('institution.editPassword') ? 'active' : '' }}" href="{{ route('institution.editPassword') }}">Security</a>
                </nav>

                <hr>


                    <form method="POST" action="{{ route('institution.updatePassword') }}">
                    @csrf               

                    <!-- Current Password -->
                    <div class="form-group form-floating mb-3">
                        
                        <input id="current_password" type="password" class="form-control" name="current_password" required placeholder="Password">
                        <label for="current_password">Current Password</label>
                    </div>              

                    <!-- New Password -->
                    <div class="form-group form-floating mb-3">
                        
                        <input id="password" type="password" class="form-control" name="password" required placeholder="New Password">
                        <label for="password ">New Password</label>
                    </div>              

                    <!-- Confirm New Password -->
                    <div class="form-group form-floating mb-3">
                        
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                        <label for="password_confirmation">Confirm New Password</label>
                    </div>  

                     <div class="form-group mt-3">            

                    <button type="submit" class="btn btn-default btn-lg w-100 mt-3">Change Password</button>
                </div>
                </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Main page content ends -->
</div>
</main>
<!-- Page ends -->
@endsection
