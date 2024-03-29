<!DOCTYPE html>
<html lang="{{ get_default_language_code() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ (isset($page_title) ? __($page_title) : __("Public")) }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    @include('partials.header-asset')

    @stack('css')
</head>
<body>

@include('frontend.partials.preloader')
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Body Overlay
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div id="body-overlay" class="body-overlay"></div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Body Overlay
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="main-section-wrapper">
    @php
        $class = "two";
        if(Route::is("index")) {
            $class = "";
        }
    @endphp
    @include('frontend.partials.header',[
        'class'     => $class,
    ])

    @yield("content")

    @include('frontend.partials.footer')
</div>
@include('partials.footer-asset')
@include('frontend.partials.extensions.tawk-to')

@stack('script')

</body>
</html>