@extends('recruiter.panel.layout')

@section('content') 


        <!-- Header ends -->

        <!-- main page content -->
        <div class="main-container container">
            <!-- welcome user -->
           

            

            <!-- connection -->
           
            
            <!-- Dark mode switch -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h3>{{$CountryData->country_name}}</h3>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mb-4">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-body">

                            <div class="row">
                                <img src="{{ asset('images/country_header_image/' . $CountryData->country_header_image) }}">
                            </div>
                            <div class="row mt-5">
                            <div class="col-md-8">

                                <h4>Stay in {{$CountryData->country_name}}</h5>
                                
                                <h5 class="mt-5">Visa turnaround<h6>
                                <p>90 Days</p>
                                <hr>

                                <h4 class="mt-5">Urban Enviornment<h6>
                                <p>{!! $CountryData->urban_environment !!}</p>
                                <hr>

                                <h4 class="mt-5">Diverse Scenery<h6>
                                <p>{{$CountryData->diverse_scenery}}</p>
                                <hr>

                                <h4 class="mt-5">Distinctive native animals<h6>
                                <p>{{$CountryData->distinctive_native_animals}}</p>
                                <hr>

                                <h4 class="mt-5">Student Cities<h6>
                                <p>{{$CountryData->student_cities}}</p>

                                
                            </div>
                            <div class="col-md-4">
                                <div class="row mb-5">
                                <h3 class="mb-3">News</h3>
                                @if(count($news) != 0)
                                @foreach($news as $news_data)
                                <div>

                                    <h4>{{$news_data->title}}</h4>
                                    <p>{{$news_data->content}}</p>
                                    <hr>
                                </div>
                                @endforeach
                                @else
                                <img width="100%" src="https://img.freepik.com/free-vector/no-data-concept-illustration_114360-536.jpg?w=740&t=st=1697628862~exp=1697629462~hmac=bf41dafc7537571f92dc5671115d9f47492f340de88407f047936efe4354cedd">
                                @endif
                            </div>
                            
                           


                            <div class="row mb-5">
                                <h3 class="mb-3">Video</h3>
                                
                                <div>

                                    @if(isset($CountryData->youtube_link))
                                    
                                    <iframe width="100%" height="315" src="{{$CountryData->youtube_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    @else
                                    <img width="100%" src="https://app.adventus.io/img/blank-news.svg">
                                    @endif
                                   
                                </div>
                                
                            </div>


                            <div class="row mb-5">
                                <h3 class="mb-3">Links</h3>
                                @if(count($links) != 0)
                                @foreach($links as $links_data)
                                <div>

                                    <li>  <a href="{{$links_data->url}}">
                                        <i class="bi bi-box-arrow-up-right"></i>
                                        {{$links_data->title}} 
                                    </a> </li> 
                                    
                                    <hr>
                                </div>
                                @endforeach
                                @else
                                <img width="100%" src="https://img.freepik.com/premium-vector/no-data-concept-illustration_86047-488.jpg?size=626&ext=jpg&ga=GA1.1.27262691.1695136376&semt=ais">
                                @endif
                            </div>

                            

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
