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
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- Summernote CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" rel="stylesheet">

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
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/script.js"></script>


    <!-- Summernote JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#description').summernote({
                height: 300,
                callbacks: {
                    onImageUpload: function(files) {
                        uploadImage(files[0]);
                    }
                }
            });

            function uploadImage(file) {
                var data = new FormData();
                data.append("file", file);
                data.append("_token", "{{ csrf_token() }}"); // Tambahkan CSRF token

                $.ajax({
                    url: "{{ route('upload.image') }}", // Buat route untuk upload gambar
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    type: "POST",
                    success: function(url) {
                        $('#description').summernote('insertImage',
                        url); // Insert URL gambar ke dalam editor
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }
        });
    </script>

</body>

</html>
