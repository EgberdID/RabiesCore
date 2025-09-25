<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('techmin/favicon.ico') }}">

    <!-- CSS Techmin -->
    <link href="{{ asset('techmin/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('techmin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- JS Config -->
    <script src="{{ asset('techmin/js/config.js') }}"></script>
</head>
{{-- <body class="authentication-bg position-relative" style="height: 100vh;"> --}}
<body class="d-flex flex-column min-vh-100"
      style="background: url('{{ asset('techmin/images/back-aj.png') }}') no-repeat center center fixed; 
             background-size: cover;">



    <div class="account-pages p-sm-5 position-relative" >
        <div class="container">
            {{ $slot }} <!-- form login/register akan ditempel di sini -->
        </div>
    </div>

    {{-- <footer class="footer footer-alt fw-medium text-center mt-4">
        <span class="text-dark">
            <script>document.write(new Date().getFullYear())</script> © Techmin
        </span>
    </footer> --}}

    <!-- JS Vendor -->
    <script src="{{ asset('techmin/js/vendor.min.js') }}"></script>
    <script src="{{ asset('techmin/vendor/lucide/umd/lucide.min.js') }}"></script>
    <script src="{{ asset('techmin/js/app.min.js') }}"></script>
</body>
</html>
