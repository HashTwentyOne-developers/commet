<!DOCTYPE html>
<html lang="en">

<head>
@include('frontend.header')
</head>

  <body>
    <!-- Preloader-->
{{-- @include('frontend.partials.preloader')frontend/ --}}
    <!-- End Preloader-->
    <!-- Navigation Bar-->
@include('frontend.menu')
    <!-- End Navigation Bar-->
    @section('main-content')
    @show


    <!-- Footer-->

    @include('frontend.footer')
    <!-- end of footer-->
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/bundle.js') }}"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/main.js') }}"></script>
  </body>


<!-- Mirrored from themes.hody.co/html/comet/blog-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Jan 2017 09:50:21 GMT -->
</html>
