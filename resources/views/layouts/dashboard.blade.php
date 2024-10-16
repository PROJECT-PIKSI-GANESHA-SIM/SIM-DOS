<!doctype html>
<!-- 
* Bootstrap Simple Admin Template
* Version: 2.1
* Author: Alexis Luna
* Website: https://github.com/alexis-luna/bootstrap-simple-admin-template
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIM DOSEN</title>
    <link rel="icon" href="{{ asset('assets/PIKSI.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/fontawesome/css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/fontawesome/css/solid.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/fontawesome/css/brands.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/master.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    {{-- <link href="/css/style.css" rel="stylesheet"> --}}
    <link href="/css/app.css" rel="stylesheet">
    <!-- <link href="assets/vendor/flagiconcss/css/flag-icon.min.css" rel="stylesheet"> -->

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<style>
    .bg-custom {
        background-color: #8A00B9;
    }
</style>

<body>
    <div class="wrapper">
        @include('layouts._dashboard.sidebar')
        <div id="body" class="active">
            @include('layouts._dashboard.navbar')
            <div class="content">
                <div class="container">
                    <h2 class="mt-2">
                        {{-- Start Title --}}
                        @yield('title')
                        {{-- End Content --}}
                    </h2>
                    {{-- Start Content --}}
                    @yield('content')
                    {{-- End Content --}}
                </div>
            </div>
        </div>
    </div>
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="assets/vendor/chartsjs/Chart.min.js"></script>
    <script src="assets/js/dashboard-charts.js"></script> -->
    <script src="/assets/js/script.js"></script>
</body>

</html>
