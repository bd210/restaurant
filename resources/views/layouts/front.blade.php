<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $detail->name }} - Home</title>
    <meta content="Restaurant for good food" name="descriptison">
    <meta content="restaurant, restaurantly, food" name="keywords">
    <meta content="Boris Dmitrovic" name="author" >
    <!-- Favicons -->
    <link href="{{asset('/')}}assets/img/favicon.png" rel="icon">
    <link href="{{asset('/')}}assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    @section('appendCSS')
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('/')}}assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('/')}}assets/css/style.css" rel="stylesheet">
    @show


    <!-- =======================================================
    * Template Name: Restaurantly - v1.1.0
    * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

@include('components.topbar')

@include('components.header')

@include('components.hero')

<main id="main">


        @include('components.about')

        <!-- WHY US -->

        @include('components.menu')

        @include('components.specials')

        @include('components.event')

        @include('components.reservation')

        @include('components.testimonials')

        @include('components.gallery')

        @include('components.chefs')

        @include('components.contact')

</main><!-- End #main -->

    @include('components.footer')

<div id="preloader"></div>
<a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>

@section('appendJavascript')
<!-- Vendor JS Files -->
<script src="{{asset('/')}}assets/vendor/jquery/jquery.min.js"></script>
<script src="{{asset('/')}}assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('/')}}assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="{{asset('/')}}assets/vendor/php-email-form/validate.js"></script>
<script src="{{asset('/')}}assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="{{asset('/')}}assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="{{asset('/')}}assets/vendor/venobox/venobox.min.js"></script>
<script src="{{asset('/')}}assets/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="{{asset('/')}}assets/js/main.js"></script>
@show

</body>

</html>
