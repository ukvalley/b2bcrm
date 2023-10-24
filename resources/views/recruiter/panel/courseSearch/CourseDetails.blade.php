@extends ('recruiter.panel.layout')

@section('content')

    <div class="main-container container">

    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="col-auto">
                        <figure class="avatar avatar-60 rounded-10">
                            <img src="{{ asset('images/avtar/' . $course->institution->logo) }}"
                                alt="">
                        </figure>
                    </div>
                    <h4 class="card-title">{{$course->name}}</h4>
                    <p class="card-text">{{$course->institution->name}}</p>
                    <hr>    
                    <a href="{{url('/')}}/institution/CourseBasicUpdate/{{$course->id}}"class="btn btn-primary" style="margin-left: 930px;">Edit</a>
                </div>
            </div>

            <div class="card shadow-sm mt-5">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">Overview</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile" aria-selected="false">Admission
                                Requirements</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                                type="button" role="tab" aria-controls="contact" aria-selected="false">About
                                {{$course->institution->name}}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="country-tab" data-bs-toggle="tab" data-bs-target="#country"
                                type="button" role="tab" aria-controls="country"
                                aria-selected="false">{{$course->institution->Countries->name}}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="accommodation -tab" data-bs-toggle="tab"
                                data-bs-target="#accommodation " type="button" role="tab" aria-controls="accommodation "
                                aria-selected="false">Accommodation</button>
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
                                <p class="mt-3">Any university, university/college preparation course in Canadian and
                                    world studies, English, or social sciences and humanities</p>
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
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="card shadow-sm">
                                            <div class="card-body">

                                                <div class="row">
                                                    <img
                                                        src="{{ asset('images/country_header_image/' . $countryData->country_header_image) }}">
                                                </div>
                                                <div class="row mt-5">
                                                    <div class="col-md-8">

                                                        {!! $countryData->information_data !!}

                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="row mb-5">
                                                            <h3 class="mb-3">News</h3>
                                                            @foreach($news as $news_data)
                                                            <div>

                                                                <h4 style="style=color: green;">{{$news_data->title}}
                                                                </h4>
                                                                <p>{{$news_data->content}}</p>
                                                                <hr>
                                                            </div>
                                                            @endforeach
                                                        </div>



                                                        <div class="row mb-5">
                                                            <h3 class="mb-3">Video</h3>

                                                            <div>

                                                                @if(isset($countryData->youtube_link))


                                                                <!-- Button trigger modal -->
                                                                <button type="button" class="btn btn-primary video-btn"
                                                                    data-toggle="modal"
                                                                    data-src="https://player.vimeo.com/video/58385453?badge=0&autoplay=1&loop=1"
                                                                    data-target="#myModal">
                                                                    Play Vimeo Video
                                                                </button>

                                                                <div class="modal fade" id="myModal" tabindex="-1"
                                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">


                                                                            <div class="modal-body">

                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                    <span
                                                                                        aria-hidden="true">&times;</span>
                                                                                </button>
                                                                                <!-- 16:9 aspect ratio -->
                                                                                <div
                                                                                    class="embed-responsive embed-responsive-16by9">
                                                                                    <iframe
                                                                                        class="embed-responsive-item"
                                                                                        src="" id="video"
                                                                                        allowscriptaccess="always"
                                                                                        allow="autoplay"></iframe>
                                                                                </div>


                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>





                                                                {!! $countryData->youtube_link !!}

                                                                @else
                                                                <img width="100%"
                                                                    src="https://app.adventus.io/img/blank-news.svg">
                                                                @endif

                                                            </div>

                                                        </div>


                                                        <div class="row mb-5">
                                                            <h3 class="mb-3">Links</h3>
                                                            @if(count($links) != 0)
                                                            @foreach($links as $links_data)
                                                            <div>

                                                                <li> <a style="color: green;"
                                                                        href="{{$links_data->url}}">
                                                                        <i class="bi bi-box-arrow-up-right"></i>
                                                                        {{$links_data->title}}
                                                                    </a> </li>

                                                                <hr>
                                                            </div>
                                                            @endforeach
                                                            @else
                                                            <img width="100%"
                                                                src="https://img.freepik.com/premium-vector/no-data-concept-illustration_86047-488.jpg?size=626&ext=jpg&ga=GA1.1.27262691.1695136376&semt=ais">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                        <div class="tab-pane fade" id="accommodation" role="tabpanel"
                            aria-labelledby="accommodation-tab">
                            <h6 class="mt-3">Campus Locations:</h6>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


        @endsection
