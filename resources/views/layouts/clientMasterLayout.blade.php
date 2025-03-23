<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GiaMedical - @yield('title')</title>

    <!-- CSS Links -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/style.css') }}">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />
</head>
<body>
    <!-- Header -->
    @include('client.partials.header')

    <!-- Page Content -->
    <div>
        @yield('layoutContent')
    </div>

    <!-- JS Scripts -->
    <script src="{{ asset('assets/client/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/one-page-nav-min.js') }}"></script>
    <script src="{{ asset('assets/client/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/ajax-form.js') }}"></script>
    <script src="{{ asset('assets/client/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/client/js/main.js') }}"></script>
</body>
</html>