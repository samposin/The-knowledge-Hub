<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Thomson-Minimal Portfolio Temaplate</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- theme meta -->
  <meta name="theme-name" content="thomson" />
  
  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{!! asset('public/frontend-theme/plugins/bootstrap/bootstrap.min.css') !!}">
  <link rel="stylesheet" href="{!! asset('public/frontend-theme/plugins/themify/css/themify-icons.css') !!}">
  <link rel="stylesheet" href="{!! asset('public/frontend-theme/plugins/counto/animate.css') !!}">
  <link rel="stylesheet" href="{!! asset('public/frontend-theme/plugins/aos/aos.css') !!}">
  <link rel="stylesheet" href="{!! asset('public/frontend-theme/plugins/owl-carousel/owl.carousel.min.css') !!}">
  <link rel="stylesheet" href="{!! asset('public/frontend-theme/plugins/owl-carousel/owl.theme.default.min.css') !!}">
  <link rel="stylesheet" href="{!! asset('public/frontend-theme/plugins/magnific-popup/magnific-popup.css') !!}">
  <link rel="stylesheet" href="{!! asset('public/frontend-theme/plugins/animated-text/animated-text.css') !!}">

  <!-- Main Stylesheet -->
  <link href="{!! asset('public/frontend-theme/css/style.css') !!}" rel="stylesheet">

</head>

<body>
    @include('frontend.theme.header')
        @yield('content')
    @include('frontend.theme.footer')


<!-- Footer End -->

<!-- jQuery -->
<script src="{!! asset('public/frontend-theme/plugins/jQuery/jquery.min.js') !!}"></script>
<!-- Bootstrap JS -->
<script src="{!! asset('public/frontend-theme/plugins/bootstrap/bootstrap.min.js') !!}"></script>
<script src="{!! asset('public/frontend-theme/plugins/aos/aos.js') !!}"></script>
<script src="{!! asset('public/frontend-theme/plugins/owl-carousel/owl.carousel.min.js') !!}"></script>
<script src="{!! asset('public/frontend-theme/plugins/shuffle/shuffle.min.js') !!}"></script>
<script src="{!! asset('public/frontend-theme/plugins/magnific-popup/jquery.magnific-popup.min.js') !!}"></script>
<script src="{!! asset('public/frontend-theme/plugins/animated-text/animated-text.js') !!}"></script>
<script src="{!! asset('public/frontend-theme/plugins/counto/apear.js') !!}"></script>
<script src="{!! asset('public/frontend-theme/plugins/counto/counTo.js') !!}"></script>

 <!-- Google Map -->
<script src="{!! asset('public/frontend-theme/plugins/google-map/map.js') !!}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script> 
<!-- Main Script -->
<script src="{!! asset('public/frontend-theme/js/script.js') !!}"></script>
</html>