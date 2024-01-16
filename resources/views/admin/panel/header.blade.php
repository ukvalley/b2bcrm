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
                    <img src="{{ asset('images/projects/logo/') }}/{{$siteLogo}}" width="200px" alt="">
                    
                </div>
                
                <div class="col-auto">
                    <a href="{{route('admin.notification')}}" target="_self" class="btn btn-light btn-44">
                        <i class="bi bi-bell"></i>
                        <span class="count-indicator"></span>
                    </a>
                </div>
            </div>
        </header>
        <!-- Header ends -->