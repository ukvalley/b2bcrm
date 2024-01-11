@extends('recruiter.panel.layout')

@section('content')

<!-- Begin page -->
<!-- Begin page -->

<!-- Header ends -->
<div class="main-container container">
    <!-- welcome user -->

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">{{ __('Edit Recruiter Profile') }}</div>


                <div class="card-body">

                    <nav class="nav nav-pills">
                        <a class="nav-link {{ request()->routeIs('agent.edit') ? 'active' : '' }}" href="{{ route('agent.edit') }}">Basic Details</a>
                        <a class="nav-link {{ request()->routeIs('agent.editPassword') ? 'active' : '' }}" href="{{ route('agent.editPassword') }}">Security</a>
                    </nav>

                    <hr>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif


                    <form method="POST" action="{{ route('agent.updatePassword') }}">
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