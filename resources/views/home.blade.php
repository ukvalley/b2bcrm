@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">


        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Profile</div>
                <div class="card-body text-center">
                    <img src="https://img.freepik.com/premium-vector/young-smiling-man-avatar-man-with-brown-beard-mustache-hair-wearing-yellow-sweater-sweatshirt-3d-vector-people-character-illustration-cartoon-minimal-style_365941-860.jpg" width="200px" class="rounded" alt="Cinque Terre">

                    <h4> Hello {{ Auth::user()->name }}, </h4>
                    {{ Auth::user()->userType->name }}
                </div>

                
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Your Profile is Under Review</h3>
                    <p>Your profile is currently being reviewed by our team. This means that we are carefully assessing the information and details you have provided to ensure they meet our requirements and standards. We appreciate your patience during this process and will notify you as soon as the review is complete. If you have any questions or need further clarification, please let us know.</p>
                   
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
