<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="" />

  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{  asset('homespace/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{  asset('homespace/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{  asset('homespace/css/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{  asset('homespace/css/jquery.fancybox.min.css') }}">
  <link rel="stylesheet" href="{{ asset('homespace/fonts/icomoon/style.css') }}">
  <link rel="stylesheet" href="{{ asset('homespace/fonts/flaticon/font/flaticon.css') }}">
  <link rel="stylesheet" href="{{  asset('homespace/css/aos.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
  <link rel="stylesheet" href="{{  asset('homespace/css/style.css') }}">

  <title>Homespace Free HTML Template by Untree.co</title>
</head>

<body>

  <div class="lines-wrap">
    <div class="lines-inner">
      <div class="lines"></div>
    </div>
  </div>
  <!-- END lines -->

  <div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close">
        <span class="icofont-close js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>

 {{-- navbar --}}
 @include('layouts.components.navbar')


    @yield('content')

{{-- Footer --}}
@include('layouts.components.footer')

<div id="overlayer"></div>
<div class="loader">
  <div class="spinner-border" role="status">
    <span class="sr-only">Loading...</span>
  </div>
</div>

<script src="{{ asset('homespace/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('homespace/js/popper.min.js') }}"></script>
<script src="{{ asset('homespace/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('homespace/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('homespace/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('homespace/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('homespace/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('homespace/js/aos.js') }}"></script>
<script src="{{ asset('homespace/js/jarallax.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="{{ asset('homespace/js/custom.js') }}"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
</body>

</html>
 