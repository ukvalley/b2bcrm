
<!doctype html>
<html lang="en" class="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>{{ $siteName }}</title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="manifest" href="manifest.json" />

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('theme/img/favicon180.png') }}" sizes="180x180">
    <link rel="icon" href="{{ asset('theme/img/favicon32.png') }}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{ asset('theme/img/favicon16.png') }}" sizes="16x16" type="image/png">

    <!-- Google fonts-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- bootstrap icons -->
    

    <!-- style css for this template -->

    <link href="{{ asset('theme/css/style.css') }}" rel="stylesheet" id="style">
        <link href="{{ asset('theme/vendor/swiperjs-6.6.2/swiper-bundle.min.css') }}" rel="stylesheet" id="style">


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="body-scroll d-flex flex-column h-100" data-page="signup">

    <!-- loader section -->
    <div class="container-fluid loader-wrap">
        <div class="row h-100">
            <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto text-center align-self-center">
                <div class="loader-cube-wrap loader-cube-animate mx-auto">
                    <img src="https://civs.online/wp-content/uploads/2023/01/CIVS-White-01-1024x285.png" alt="Logo">
                </div>
                <p class="mt-4">Your Journey to Success<br> Starts from Here!<br><strong>Please wait...</strong></p>
            </div>
        </div>
    </div>
    <!-- loader section ends -->


     <!-- Sidebar main menu -->
    <div class="sidebar-wrap  sidebar-pushcontent">
        <!-- Add overlay or fullmenu instead overlay -->
        <div class="closemenu text-muted">Close Menu</div>
        <div class="sidebar dark-bg">
            <!-- user information -->
            <div class="row my-3">
                <div class="col-12 ">
                    <div class="card shadow-sm bg-opac text-white border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <figure class="avatar avatar-44 rounded-15">
                                        <img src="{{url('/')}}/theme/img/user1.jpg" alt="">
                                    </figure>
                                </div>
                                <div class="col px-0 align-self-center">
                                    <p class="mb-1">{{$siteName}}</p>
                                    <p class="text-muted size-12">Your Journey to Success Starts from Here!</p>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-44 btn-light">
                                        <i class="bi bi-box-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="card bg-opac text-white border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h1 class="display-4">100.00</h1>
                                    </div>
                                    <div class="col-auto">
                                        <p class="text-muted">Wallet Balance</p>
                                    </div>
                                    <div class="col text-end">
                                        <p class="text-muted"><a href="addmoney.html" >+ Top up</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                    </div>
                </div>
            </div>

            <!-- user emnu navigation -->
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">
                                <div class="avatar avatar-40 rounded icon"><i class="bi bi-house-door"></i></div>
                                <div class="col">Dashboard</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                aria-expanded="false">
                                <div class="avatar avatar-40 rounded icon"><i class="bi bi-person"></i></div>
                                <div class="col">Account</div>
                                <div class="arrow"><i class="bi bi-plus plus"></i> <i class="bi bi-dash minus"></i>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item nav-link" href="profile.html">
                                        <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar2"></i></div>
                                        <div class="col">Profile</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a></li>
                                <li><a class="dropdown-item nav-link" href="settings.html">
                                        <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar-check"></i>
                                        </div>
                                        <div class="col">Settings</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="chat.html" tabindex="-1">
                                <div class="avatar avatar-40 rounded icon"><i class="bi bi-chat-text"></i></div>
                                <div class="col">Messages</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="notifications.html" tabindex="-1">
                                <div class="avatar avatar-40 rounded icon"><i class="bi bi-bell"></i></div>
                                <div class="col">Notification</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="blog.html" tabindex="-1">
                                <div class="avatar avatar-40 rounded icon"><i class="bi bi-newspaper"></i></div>
                                <div class="col">Blogs</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="style.html" tabindex="-1">
                                <div class="avatar avatar-40 rounded icon"><i class="bi bi-palette"></i></div>
                                <div class="col">Style <i class="bi bi-star-fill text-warning small"></i></div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="pages.html" tabindex="-1">
                                <div class="avatar avatar-40 rounded icon"><i class="bi bi-file-earmark-text"></i></div>
                                <div class="col">Pages <span class="badge bg-info fw-light">new</span></div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="signin.html" tabindex="-1">
                                <div class="avatar avatar-40 rounded icon"><i class="bi bi-box-arrow-right"></i></div>
                                <div class="col">Logout</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Sidebar main menu ends -->

        @yield('content')


    <!-- Required jquery and libraries -->
    
    <script src="{{ asset('theme/js/jquery-3.3.1.min.js') }}"></script>

    <script src="{{ asset('theme/js/popper.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/bootstrap-5/js/bootstrap.bundle.min.js') }}"></script>

    <!-- cookie js -->
    <script src="{{ asset('theme/js/jquery.cookie.js') }}"></script>

    <!-- Customized jquery file  -->

    <script src="{{ asset('theme/js/main.js') }}"></script>

    <script src="{{ asset('theme/js/color-scheme.js') }}"></script>

    <!-- PWA app service registration and works -->
    <script src="{{ asset('theme/js/pwa-services.js') }}"></script>

    <!-- page level custom script -->
    <script src="{{ asset('theme/js/app.js') }}"></script>
</body>

</html>