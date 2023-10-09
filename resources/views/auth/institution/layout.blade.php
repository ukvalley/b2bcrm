
<!doctype html>
<html lang="en" class="h-100">

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

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="body-scroll d-flex flex-column h-100" data-page="signup">

    <!-- loader section -->
    <div class="container-fluid loader-wrap">
        <div class="row h-100">
            <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto text-center align-self-center">
                <div class="loader-cube-wrap loader-cube-animate mx-auto">
                    <img src="assets/img/logo.png" alt="Logo">
                </div>
                <p class="mt-4">It's time for track budget<br><strong>Please wait...</strong></p>
            </div>
        </div>
    </div>
    <!-- loader section ends -->

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