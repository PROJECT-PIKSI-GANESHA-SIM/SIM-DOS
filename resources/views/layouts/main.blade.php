<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} | SIM DOSEN </title>
    <link rel="icon" type="image/x-icon" href="assets/PIKSI.png">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Poppins';
        }

        h1,
        h2,
        h4,
        h5 {
            font-weight: bold;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            display: flex;
            flex-direction: column;
        }



        main {
            max-width: 1200px;
            width: 100%;
            margin-inline: auto;
            padding: 2rem 4rem;
            flex: 1;

            display: flex;
            align-items: center;
        }

        main .content {
            flex: 1;
            display: flex;
            align-items: center;
        }

        main .content .content-description {
            flex: 1 1;
        }

        main .content .content-description .title {
            margin-block: 1rem;
        }

        main .content .content-description p {
            line-height: 1.7rem;
            font-size: 1.2rem;
        }

        /* main .content .content-description button {
        padding: .8rem 2.5rem;
        margin-block-start: 1rem;
        text-transform: uppercase;
        font-weight: 700;
        font-size: 1rem;
        font-family: 'Quicksand', sans-serif;
        color: white;

        border: 3px solid transparent;
        border-radius: 999px;
        background-color: #8A00B9;
        cursor: pointer;
        transition: all .15s ease-in;
    } */

        /* main .content .content-description button:hover {
        border: 3px solid #8A00B9;
        color: #8A00B9;
        background-color: transparent;
    } */

        main .content .content-image {
            flex: 1;
            display: flex;
        }

        main .content .content-image img {
            margin: auto;
            min-width: 250px;
            width: 500px;
        }

        /* Medium devices (landscape tablets, 768px and down) */
        @media screen and (max-width: 768px) {
            main {
                padding: 1rem 3rem;
            }

            main .content {
                flex-direction: column;
                gap: 2rem;
            }

            main .content .content-description .title {
                font-size: 3rem;
            }

            main .content .content-description p {
                font-size: 1rem;
            }

            main .content .content-image {
                order: -1;
            }
        }
    </style>
</head>

<body>
    <div class="container py-5">
        @yield('container')
    </div>
</body>

<footer class="footer" style="background-color: #000000">
    <div class="container pt-4 pb-5 text-white">
        <div class="row">
            <div class="col-md-6">
                <img src="assets/piksi_sim_logo.png" alt="logo PIKSI SIM-DOS" class="mb-4" height="50">
                <p>
                    Alamat : Jl. Jend. Gatot Subroto 301, Bandung 40274<br>
                    Email : piksiganeshaonline@gmail.com<br>
                    Telepon : (022) 87340030<br>
                    Fax : (022) 87340086<br>
                </p>
            </div>

            <div class="col-md-6 text-md-end">
                <a href="https://www.facebook.com/piksiganeshabdg1" class="btn mx-2 btn-tw" target="_blank"
                    rel="noreferrer">
                    <i class="bi bi-facebook" style="font-size: 2rem; color: white;"></i>
                </a>
                <a href="https://www.instagram.com/piksi_ganesha" class="btn mx-2 btn-tw" target="_blank"
                    rel="noreferrer">
                    <i class="bi bi-instagram" style="font-size: 2rem; color: white;"></i>
                </a>
                <a href="https://www.youtube.com/c/PiksiGaneshaOfficial" class="btn mx-2 btn-tw" target="_blank"
                    rel="noreferrer">
                    <i class="bi bi-youtube" style="font-size: 2rem; color: white;"></i>
                </a>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <span class="fw-bold text-white">©POLITEKNIK PIKSI GANESHA</span>, 2023. All Rights Reserved
            </div>
        </div>
    </div>
</footer>

</html>
