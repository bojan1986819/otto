<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ URL::to('phpgrid/themes/blitzer/jquery-ui.custom.css')}}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ URL::to('phpgrid/jqgrid/css/ui.jqgrid.css')}}">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/lightbox.min.js') }}"></script>
    <script src="{{ asset('js/slim.kickstart.min.js') }}"></script>
    <script src="{{ asset('js/slim.jquery.min.js') }}"></script>



    <!-- Scripts -->

    <script>
    window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body style="
background-repeat:no-repeat!important;
background-attachment: fixed!important;">
<div id="app">
    @include('includes.navbar')
        <br><br>
    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/vendor.js') }}"></script>
<script src="{{ asset('js/all.js') }}"></script>

</body>
</html>
