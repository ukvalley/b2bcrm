@extends('admin.panel.layout')
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
                            <h3>{{$countryData->country_name}}</h3>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mb-4">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-body">

                            <div class="row">
                                <img src="{{ asset('images/country_header_image/' . $countryData->country_header_image) }}">
                            </div>
                            <div class="row mt-5">
                            <div class="col-md-8">

                                {!! $countryData->information_data !!}
                                
                                

                                
                            </div>
                            <div class="col-md-4">
                                <div class="row mb-5">
                                <h3 class="mb-3">News</h3>
                                @if(count($countryData->news) != 0 || $countryData->news != null)
                                @foreach($countryData->news as $news_data)
                                <div>

                                    <h4 style="style=color: green;">{{$news_data->title}}</h4>
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

                                    @if(isset($countryData->youtube_link))


                                      <!-- Button trigger modal -->
<button type="button" class="btn btn-primary video-btn" data-toggle="modal" data-src="https://player.vimeo.com/video/58385453?badge=0&autoplay=1&loop=1" data-target="#myModal">
  Play Vimeo Video
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      
      <div class="modal-body">

       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>        
        <!-- 16:9 aspect ratio -->
<div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
</div>
        
        
      </div>

    </div>
  </div>
</div> 
                                    
                                    
                                    
                                   

                                    {!! $countryData->youtube_link !!}

                                    @else
                                    <img width="100%" src="https://app.adventus.io/img/blank-news.svg">
                                    @endif
                                   
                                </div>
                                
                            </div>


                            <div class="row mb-5">
                                <h3 class="mb-3">Links</h3>
                                @if(count($countryData->links) != 0)
                                @foreach($countryData->links as $links_data)
                                <div>

                                    <li>  <a style="color: green;" href="{{$links_data->url}}">
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
