@extends('recruiter.panel.layout')

@section('content')

<style>
   .cardhead{
        background: #d5d5d5;
    }
</style>
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

        <div class="col"><a href="{{route('agent.student_basic')}}"><button class="btn btn-primary float-end">Add Student</button></div>
    </div>



    <!-- connection -->

    <div class="col-md-12">
        <div class="row" style="overflow-x: auto; white-space: nowrap;">
          

            <!--  -->
            <div class="col-md-3">
                <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header "  style="background: #d5d5d5; "> <img  src="{{url('/')}}/theme/icons/contact-form.png" style="width: 20%;" alt="">
                        <strong>{{$insights['application_submitted']}}</strong> <span style="font-size: 11px;">Application Submitted </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">

                                <h5 class="card-title">{{$insights['application_not_submitted']}}</h5>
                            </div>
                            <div class="col-6">

                                <p class="card-text" style="font-size: 11px;">Applications not <br>Submitted</p>
                            </div>
                            <div class="col-6">
                                <a href="" class="btn btn-default btn-sm" style="font-size:10px;">Submit</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!--  -->
            <div class="col-md-3">
                <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header "  style="background: #d5d5d5; "> <img  src="{{url('/')}}/theme/icons/institution.png" style="width: 20%;" alt="">
                        <strong>{{$insights['lodge_institution']}}</strong> <span style="font-size: 11px;">Lodged with institutions </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">

                                <h5 class="card-title">{{$insights['lodge_not_institution']}}</h5>
                            </div>
                            <div class="col-6">

                                <p class="card-text" style="font-size: 11px;">Missing info or documents</p>
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
                    <div class="card-header "  style="background: #d5d5d5; "> <img  src="{{url('/')}}/theme/icons/contract.png" style="width: 20%;" alt="">
                        <strong>{{$insights['offer_received']}}</strong> <span style="font-size: 11px;">Offer received   </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">

                                <h5 class="card-title">{{$insights['offer_not_received']}}</h5>
                            </div>
                            <div class="col-6">

                                <p class="card-text" style="font-size: 11px;">Offers not yet accepted</p>
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
                    <div class="card-header "  style="background: #d5d5d5; "> <img  src="{{url('/')}}/theme/icons/travel.png" style="width: 20%;" alt="">
                        <strong>{{$insights['visa_granted']}}</strong> <span style="font-size: 11px;">
Visa granted</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">

                                <h5 class="card-title">{{$insights['visa_not_granted']}}</h5>
                            </div>
                            <div class="col-6">

                                <p class="card-text" style="font-size: 11px;">Missing visa info or documents</p>
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
                    <div class="card-header "  style="background: #d5d5d5; "> <img  src="{{url('/')}}/theme/icons/graduated.png" style="width: 20%;" alt="">
                        <strong>{{$insights['student_commenced']}}</strong> <span style="font-size: 11px;">
Students Commenced </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">

                                <h5 class="card-title">{{$insights['student_not_commenced']}}</h5>
                            </div>

                            <div class="col-6">
                            <img  src="{{url('/')}}/theme/icons/chitr.png" style="width: 100%;" alt="">
                             
                           
                        </div>
                    </div>

                </div>

            </div>
            

                

        </div>

    </div>

    <div class="row">
        <div style="margin: 5px;" class="col-md-6 card bg-primary">
            <div class="card-header "><i class="bi bi-book"></i>Priority Task</div>
            <div class="row  bg-light text-dark">
                <div class="col-md-12 ">
                    <div class="card-body">
                    <img  src="{{url('/')}}/theme/icons/message-empty-state.png" style="width: 50%;" alt="">

                    </div>


                </div>
            </div>
        </div>

        <div style="margin: 5px;" class="col-md-4 card bg-primary ">
            <div class="card-header"><i class="bi bi-book" style="margin-right: 5px;"></i>Messages</div>
            <div class="row  bg-light text-dark">
                <div class="col-md-12">
                    <div class="card-body">
                    <img  src="{{url('/')}}/theme/icons/message-empty-state (1).png " style="width: 100%;padding: 54px;" alt="">

                            
                  </h5>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <hr>


    <div class="row">
        <div style="margin: 5px;" class="col-md-4 card">
            <div class="card-header bg-primary text-white"><i class="bi bi-book " ></i> Recently Added Institution</div>

            <div class="row  bg-light text-dark">
                <div class="col-md-12">
                    <div class="card-body">
                    <ol class="list-group list-group-numbered">

                        @foreach($institutions as $institution)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="row ms-2 me-auto">
                                <div class="col-3">
                                    @if(isset($institution->logo))
                                    <img  src="https://app.adventus.io/publicimages/{{$institution->logo}}" alt="Logo" style="width: 100%; padding:5px">
                                    @else
                                    <img  src="https://cdn.vectorstock.com/i/preview-1x/82/99/no-image-available-like-missing-picture-vector-43938299.jpg" alt="Logo" style="width: 100%; padding:5px">
                                    @endif
                                </div>
                                
                                <div class="col-9">
                                   <span class="fw-bold"> {{ $institution->name}} </span>
                                 @foreach (json_decode($institution->city) as $city)
                                {{$city}}
                                @endforeach,<b>{{$institution->countries->name }}</b>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ol>
                    </div>
                </div>
            </div>
        </div>
       

        

        <div style="margin: 5px;" class="col-md-4 card">
            <div class="card-header bg-primary text-white"><i class="bi bi-book " ></i> Our Premium Partners</div>

            <div class="row  bg-light text-dark">
                <div class="col-md-12">
                    <div class="card-body">
                    <ol class="list-group list-group-numbered">

                        @foreach($institutions_prime as $institutions_prime)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="row ms-2 me-auto">
                                <div class="col-3">
                                    @if(isset($institutions_prime->logo))
                                    <img  src="https://app.adventus.io/publicimages/{{$institutions_prime->logo}}" alt="Logo" style="width: 100%; padding:5px">
                                    @else
                                    <img  src="https://cdn.vectorstock.com/i/preview-1x/82/99/no-image-available-like-missing-picture-vector-43938299.jpg" alt="Logo" style="width: 100%; padding:5px">
                                    @endif
                                </div>
                                
                                <div class="col-9">
                                   <span class="fw-bold"> {{ $institutions_prime->name}} </span>
                                 
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ol>
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