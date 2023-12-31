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
                            <h3>Countries</h3>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mb-4">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-body">

                                <h3>Available Countries</h3>
                                <div class="row">
                                @foreach($CountryData as $country)
                                
                                 <div class="col-md-6 p-3">
                                    <div style="border: 2px solid #333; border-radius: 10px;">
                                    <a href="{{ route('agent.country_details', ['id' => $country->id]) }}">
                                     <h5 class="p-3">{{$country->country_name}}</h5>
                                     <img class="p-3" width="100%" src="{{ asset('images/country_header_image/' . $country->country_header_image) }}">
                                     </a> 
                                     </div>
                                 </div>  
                                 

                                @endforeach
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
