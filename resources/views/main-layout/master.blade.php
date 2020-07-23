<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Smart Doctors - @yield('title')</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        @yield('css')


        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



    </head>
    <body>
        @yield('content')
        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

        <script src="{{ asset('vendor/calendar/jquery-pseudo-ripple.js') }}"></script>
        <script src="{{ asset('vendor/calendar/jquery-nao-calendar.js') }}"></script>
        <script src="{{ url('/js/jquery.dd.min.js') }}"></script>
        {{-- <script src="{{ asset('js/custom.js') }}"></script> --}}

        @yield('js')
    </body>
</html>
