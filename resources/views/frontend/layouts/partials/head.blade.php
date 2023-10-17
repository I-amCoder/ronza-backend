<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>@yield('title', config('settings.site_name'))</title>

<!-- Meta Data For Seo -->

<meta name="title" content="@yield('title',config('settings.meta_title')  )">
<meta name="description" content="@yield('description',config('settings.meta_description')  )">
<meta name="keywords" content="@yield('keywords',config('settings.meta_description')  )">
<meta name="robots" content="index, follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- End Seo Section -->


<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="{{ config('settings.logo_path') }}">
<!-- Material Design Iconic Font-V2.2.0 -->
<link rel="stylesheet" href="{{ asset('frontend') }}/css/material-design-iconic-font.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('frontend') }}/css/font-awesome.min.css">
<!-- Font Awesome Stars-->
<link rel="stylesheet" href="{{ asset('frontend') }}/css/fontawesome-stars.css">
<!-- Meanmenu CSS -->
<link rel="stylesheet" href="{{ asset('frontend') }}/css/meanmenu.css">
<!-- owl carousel CSS -->
<link rel="stylesheet" href="{{ asset('frontend') }}/css/owl.carousel.min.css">
<!-- Slick Carousel CSS -->
<link rel="stylesheet" href="{{ asset('frontend') }}/css/slick.css">
<!-- Animate CSS -->
<link rel="stylesheet" href="{{ asset('frontend') }}/css/animate.css">
<!-- Jquery-ui CSS -->
<link rel="stylesheet" href="{{ asset('frontend') }}/css/jquery-ui.min.css">
<!-- Venobox CSS -->
<link rel="stylesheet" href="{{ asset('frontend') }}/css/venobox.css">
<!-- Nice Select CSS -->
<link rel="stylesheet" href="{{ asset('frontend') }}/css/nice-select.css">
<!-- Magnific Popup CSS -->
<link rel="stylesheet" href="{{ asset('frontend') }}/css/magnific-popup.css">
<!-- Bootstrap V4.1.3 Fremwork CSS -->
<link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.min.css">
<!-- Helper CSS -->
<link rel="stylesheet" href="{{ asset('frontend') }}/css/helper.css">
<!-- Main Style CSS -->
<link rel="stylesheet" href="{{ asset('frontend') }}/style.css">
<!-- Responsive CSS -->
<link rel="stylesheet" href="{{ asset('frontend') }}/css/responsive.css">
<!-- Modernizr js -->
<script src="{{ asset('frontend') }}/js/vendor/modernizr-2.8.3.min.js"></script>
