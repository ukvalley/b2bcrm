@extends('institution.panel.layout')

@section('content')

<!-- Begin page -->
 <!-- Begin page -->
   
         <div class="main-container container">
            <!-- welcome user -->
            


        <!-- Student Registration Step 1 Form -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                    <div class="col-auto">
                            <figure class="avatar avatar-60 rounded-10">
                                <img src="{{url('/')}}/public/images/avatar/{{$course->institution->logo OR '1696936589_a-happy-indian-cartoon-a-young-male-wearing-a-suite-322338942.png'}}" alt="">
                            </figure>
                        </div>
                    <h4 class="card-title">{{$course->name}}</h4>
                        <p class="card-text">{{$course->institution->name}}</p>
                        <!-- <hr>     -->

                    </div>
                </div>

                <div class="card shadow-sm mt-5">
                    <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Overview</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Admission Requirements</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">About {{$course->institution->name}}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="country-tab" data-bs-toggle="tab" data-bs-target="#country" type="button" role="tab" aria-controls="country" aria-selected="false">{{$course->institution->country}}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="accommodation -tab" data-bs-toggle="tab" data-bs-target="#accommodation " type="button" role="tab" aria-controls="accommodation " aria-selected="false">Accommodation</button>
                    </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                       <div class="mt-3 ml-3">
                       <h5>Course Particulars</h5>

                       <h6 class="mt-3">Name</h6>
                       <p>{{$course->name}}</p>
                       <h6 class="mt-3">Level</h6>
                       <p>{{$course->level}}</p>
                       <h6 class="mt-3">Course Code</h6>
                       <p>{{$course->course_code}}</p>
                       <h6 class="mt-3">Currency</h6>
                       <p>{{$course->currency}}</p>
                       <h6 class="mt-3">Tuition Fee</h6>
                       <p>{{$course->tuition_fee}}</p>
                       <h6 class="mt-3">Delivery</h6>
                       <p>{{$course->name}}</p>
                       <h6 class="mt-3">Duration</h6>
                       <p>{{$course->duration}} {{$course->duration_type}}</p>
                       <h6 class="mt-3">Application Fee</h6>
                       <p>{{$course->application_fees}} {{$course->fees_type}}</p>
                       <h6 class="mt-3">Adventus Code</h6>
                       <p>{{$course->name}}</p>
                       <h6 class="mt-3">Summary</h6>
                       <p>{{$course->summary}}</p>
                       <h6 class="mt-3">Attendance pattern</h6>
                       <p>{{$course->attendance_pattern}}</p>
                       <h6 class="mt-3">Language of Tuition</h6>
                       <p>{{$course->name}}</p>
                      
                       </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="mt-3 ml-3">
                            <h6>Course Requirements:</h6>
                            <p class="mt-3">Any university, university/college preparation course in Canadian and world studies, English, or social sciences and humanities</p>
                            <p class="mt-5">English Requirements:</p>
                            <p class="mt-3">IELTS of 6.5 or equivalent</p>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="mt-3 ml-3">
                            <h6>Institution overview:</h6>
                            <p class="mt-1">About Our Virtual Campus</p>
                            <p class="mt-3">{!! $course->institution->overview !!}</p>
                            <h6 class="mt-3">Institution Type:</h6>
                            <p class="mt-3">{!! $course->institution->institution_type !!}</p>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="country" role="tabpanel" aria-labelledby="country-tab">
                       <div class="col-md-12">
                        <div class="row">
                        <div class="col-md-8">
                        <h6 class="mt-3">Study in {{$course->institution->country}}</h6>

                            <p class="mt-3">{{$countryData->information_data}}</p>
                            <img src="{{url('/')}}/public/images/avatar/{{$countryData->country_header_image OR '1696936589_a-happy-indian-cartoon-a-young-male-wearing-a-suite-322338942.png'}}" alt="">
                        </div>
                        <div class="col-md-4">
                        <h6 class="mt-3">News</h6>
                        <p>{{$countryData->news}}</p>
                       </div>
                        </div>

                       </div>
                       
                       
                    </div>
                    <div class="tab-pane fade" id="accommodation" role="tabpanel" aria-labelledby="accommodation-tab">
                        <h6 class="mt-3">Campus Locations:</h6>
                    </div>

                    
                    </div>                   
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
