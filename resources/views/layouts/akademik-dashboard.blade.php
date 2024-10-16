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
    <link href="{{ asset('/assets/vendor/fontawesome/css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/fontawesome/css/solid.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/fontawesome/css/brands.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/master.css') }}" rel="stylesheet">
    {{-- <link href="/css/style.css" rel="stylesheet"> --}}
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
    <!-- <link href="assets/vendor/flagiconcss/css/flag-icon.min.css" rel="stylesheet"> -->
</head>

<body>
    <div class="wrapper">
        @include('layouts._dashboard.akademik.sidebar')
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
    {{-- <script src="{{ asset('assets/js/jquery-3.7.0.min.js') }}"></script> --}}
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="assets/vendor/chartsjs/Chart.min.js"></script>
    <script src="assets/js/dashboard-charts.js"></script> -->
    <script src="/assets/js/script.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
</body>

</html>
