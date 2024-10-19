<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--  --}}
    <title>Utsab | The Cultural Heritage of Bengal</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The Cultural Heritage of Bengal">
    <meta name="author" content="">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    {{-- <link rel="shortcut icon" href="{{ url('frontend/favicon.ico') }}"> --}}
    
    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="{{ url('frontend/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/assets/css/style.css') }}">
    <!-- CSS Header and Footer -->
    <link rel="stylesheet" href="{{ url('frontend/assets/css/headers/header.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/assets/css/footers/footer.css') }}">
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{ url('frontend/assets/plugins/animate.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/assets/plugins/line-icons/line-icons.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/assets/plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/assets/plugins/fancybox/source/jquery.fancybox.css') }}">  
    <link rel="stylesheet" href="{{ url('frontend/assets/plugins/owl-carousel/owl-carousel/owl.carousel.css') }}">

    <!-- CSS Page Style -->
    <link rel="stylesheet" href="{{ url('frontend/assets/css/pages/utsab_magazine.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/assets/css/pages/event_3col.css') }}">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="{{ url('frontend/assets/css/custom.css') }}">
    
    <!-- Web Fonts -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>
</head>
<body>
    <div class="wrapper">
        <!--=== Header v4 ===-->
        <div class="header-v4">
            @include('includes.header')
        </div>
        <!--=== End Header v4 ===-->
         <!--=== Content Part ===-->
        <div class="wrapper">
             @yield('content')  
        </div>
        <!-- End Content Part -->
        <!--=== Footer Version 1 ===-->
        <div class="footer-v1">
           @include('includes.footer')
        </div>
        <!--=== End Footer Version 1 ===-->
    </div>
        <!-- JS Global Compulsory -->
    <script type="text/javascript" src="{{ url('frontend/assets/plugins/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/assets/plugins/jquery/jquery-migrate.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>    
    <!-- JS Implementing Plugins -->
    <script type="text/javascript" src="{{ url('frontend/assets/plugins/back-to-top.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/assets/plugins/smoothScroll.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/assets/plugins/fancybox/source/jquery.fancybox.pack.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/assets/plugins/owl-carousel/owl-carousel/owl.carousel.js') }}"></script>
    <!-- JS Customization -->
    <script type="text/javascript" src="{{ url('frontend/assets/js/custom.js') }}"></script>
    <!-- JS Page Level -->
    <script type="text/javascript" src="{{ url('frontend/assets/js/app.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/assets/js/plugins/owl-carousel.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/assets/js/plugins/fancy-box.js') }}"></script>
    

    <script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        OwlCarousel.initOwlCarousel();
        FancyBox.initFancybox();
    });
    </script>
    <!--[if lt IE 9]>
        <script src="{{ url('frontend/assets/plugins/respond.js') }}"></script>
        <script src="{{ url('frontend/assets/plugins/html5shiv.js') }}"></script>
        <script src="{{ url('frontend/assets/plugins/placeholder-IE-fixes.js') }}"></script>
    <![endif]-->
</body>
</html>
