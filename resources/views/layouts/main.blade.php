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
        h3,
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

        /* Adjustments for Small Devices (Mobile Phones) */
        @media screen and (max-width: 576px) {

            /* Adjust padding and font sizes for better mobile experience */
            main {
                padding: 1rem 1rem;
                /* Adjust padding for smaller screens */
            }

            main .content .content-description .title {
                font-size: 2rem;
                margin-block: 0.5rem 0;
            }

            main .content .content-description p {
                font-size: 1rem;
            }

            main .content .content-image img {
                width: 100%;
                max-width: 300px;
                /* Adjust maximum image width for smaller screens */
                margin: 1rem auto;
            }

            /* Adjust footer layout for better mobile experience */
            .footer {
                padding: 1.5rem 0;
            }

            .footer .row {
                flex-direction: column;
                align-items: center;
            }

            .footer .col-md-6 {
                text-align: center;
                margin-bottom: 1rem;
            }

            .footer .btn {
                margin: 0.5rem;
            }
        }

        a {
            text-decoration: none;
            color: #212529
        }

        /* CSS Loader Spinner */
        .loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #333333;
            transition: opacity 0.75s, visibility 0.75s;
        }

        .loader--hidden {
            opacity: 0;
            visibility: hidden;
        }

        .loader::after {
            content: "";
            width: 75px;
            height: 75px;
            border: 15px solid #dddddd;
            border-top-color: #8A00B9;
            border-radius: 50%;
            animation: loading 0.75s ease infinite;
        }

        @keyframes loading {
            from {
                transform: rotate(0turn);
            }

            to {
                transform: rotate(1turn);
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
                <span class="fw-bold text-white">&copy; POLITEKNIK PIKSI GANESHA</span>,
                <script>
                    document.write(new Date().getFullYear())
                </script>. All Rights Reserved
            </div>
        </div>
    </div>
</footer>

</html>
<script>
    window.addEventListener("load", () => {
        const loader = document.querySelector(".loader");

        loader.classList.add("loader--hidden");

        loader.addEventListener("transitionend", () => {
            document.body.removeChild(loader);
        });
    });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".col").each(function() {
                var cardTitle = $(this).find('.card-title').text().toLowerCase();
                var cardText = $(this).find('.card-text').text().toLowerCase();
                console.log(cardTitle);
                if (cardTitle.indexOf(value) > -1 || cardText.indexOf(value) > -1) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>
