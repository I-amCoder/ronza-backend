<!doctype html>
<html class="no-js" lang="zxx">

<!-- index28:48-->

<head>
    @include('frontend.layouts.partials.head')

</head>

<body>
    <!--[if lt IE 8]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
 <![endif]-->
    <!-- Begin Body Wrapper -->
    <div class="body-wrapper">
        @include('frontend.layouts.partials.navbar')
        @yield('content')
        @include('frontend.layouts.partials.footer')

    </div>
    <!-- Body Wrapper End Here -->
    <!-- jQuery-V1.12.4 -->
    <script src="{{ asset('frontend') }}/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- Popper js -->
    <script src="{{ asset('frontend') }}/js/vendor/popper.min.js"></script>
    <!-- Bootstrap V4.1.3 Fremwork js -->
    <script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script>
    <!-- Ajax Mail js -->
    <script src="{{ asset('frontend') }}/js/ajax-mail.js"></script>
    <!-- Meanmenu js -->
    <script src="{{ asset('frontend') }}/js/jquery.meanmenu.min.js"></script>
    <!-- Wow.min js -->
    <script src="{{ asset('frontend') }}/js/wow.min.js"></script>
    <!-- Slick Carousel js -->
    <script src="{{ asset('frontend') }}/js/slick.min.js"></script>
    <!-- Owl Carousel-2 js -->
    <script src="{{ asset('frontend') }}/js/owl.carousel.min.js"></script>
    <!-- Magnific popup js -->
    <script src="{{ asset('frontend') }}/js/jquery.magnific-popup.min.js"></script>
    <!-- Isotope js -->
    <script src="{{ asset('frontend') }}/js/isotope.pkgd.min.js"></script>
    <!-- Imagesloaded js -->
    <script src="{{ asset('frontend') }}/js/imagesloaded.pkgd.min.js"></script>
    <!-- Mixitup js -->
    <script src="{{ asset('frontend') }}/js/jquery.mixitup.min.js"></script>
    <!-- Countdown -->
    <script src="{{ asset('frontend') }}/js/jquery.countdown.min.js"></script>
    <!-- Counterup -->
    <script src="{{ asset('frontend') }}/js/jquery.counterup.min.js"></script>
    <!-- Waypoints -->
    <script src="{{ asset('frontend') }}/js/waypoints.min.js"></script>
    <!-- Barrating -->
    <script src="{{ asset('frontend') }}/js/jquery.barrating.min.js"></script>
    <!-- Jquery-ui -->
    <script src="{{ asset('frontend') }}/js/jquery-ui.min.js"></script>
    <!-- Venobox -->
    <script src="{{ asset('frontend') }}/js/venobox.min.js"></script>
    <!-- Nice Select js -->
    <script src="{{ asset('frontend') }}/js/jquery.nice-select.min.js"></script>
    <!-- ScrollUp js -->
    <script src="{{ asset('frontend') }}/js/scrollUp.min.js"></script>
    <!-- Main/Activator js -->
    <script src="{{ asset('frontend') }}/js/main.js"></script>

    <!-- Custom Javascript -->
    @stack('js')
</body>

<!-- index30:23-->

</html>
