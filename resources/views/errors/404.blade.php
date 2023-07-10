<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <style type="text/css">
        body {
            margin-top: 150px;
            background-color: #ffffff;
        }

        .container {
            display: flex;
            width: 416px;
            height: 379px;
            justify-content: center;
            align-items: center;
            flex-shrink: 0;
        }

        .h2 {
            color: #000;
            font-family: Poppins;
            font-size: 24px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }

        .h5 {
            color: #000;
            font-family: Poppins;
            font-size: 24px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }

        .button {
            width: 213px;
            height: 51px;
            flex-shrink: 0;
            border-radius: 10px;
            background: #8A00B9;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row text-center">
            <img src="{{ asset('assets/404.svg') }}" alt="">
        </div>
    </div>
    <h2>Oops, sepertinya Halaman Tidak Ditemukan</h2>
    <h5>Halaman yang Anda cari mungkin telah dihapus, diubah namanya, atau sementara tidak tersedia.</h5>
</body>

</html>
