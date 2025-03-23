@php
    $settings  = settings();
    $latestNews = latestNews();
    $brands = brands();
    $pages  = pages();
@endphp
<!DOCTYPE html>
<html lang="en">
@php $styleCss = 'style'; @endphp
<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | {{ getAppName() }}</title>

    <link rel="icon" href="{{ getFaviconUrl() }}" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{asset('front_landing/landing/css/icons.css')}}">
    <link rel="stylesheet" href="{{asset('front_landing/landing/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('front_landing/landing/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('front_landing/landing/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('front_landing/landing/css/metismenu.css')}}">
    <link rel="stylesheet" href="{{asset('front_landing/landing/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('front_landing/landing/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front_landing/landing/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('front_landing/landing/css/timeline.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/front-third-party.css')}}">
    <link rel="stylesheet" href="{{asset('css/front-pages.css')}}">
	<link rel="stylesheet" href="{{ mix('css/front-custom.css') }}">

	@livewireStyles
    @yield('page_css')

    @routes
    @livewireScripts
    <script src="{{ asset('js/front-third-party.js')}}"></script>
    <script>
        let userDefaultImage = "{{ asset('front_landing/web/media/avatars/150-26.jpg') }}";
        $(document).ready(function () {
            $('.alert').delay(5000).slideUp(300);
        })
    </script>
    <script src="{{ mix('js/front-pages.js') }}"></script>
    <script src="https://js.stripe.com/v3/"></script>
    @yield('page_js')
</head>

<body class="body-wrapper">

@if($settings['active_homepage_status'] == 1)
    @include('landing.layouts.header')
@elseif($settings['active_homepage_status'] == 2)
    @include('landing.layouts.header-two')
@elseif($settings['active_homepage_status'] == 3)
    @include('landing.layouts.header-three')
@endif

@yield('content')

@if($settings['active_homepage_status'] == 1)
    @include('landing.layouts.footer')
@elseif($settings['active_homepage_status'] == 2)
    @include('landing.layouts.footer-two')
@elseif($settings['active_homepage_status'] == 3)
    @include('landing.layouts.footer-three')
@endif
</body>
</html>
