@include('layouts.partials.navbar')
<style>
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
<main>
    <div class="content py-5">
        <div class="content-description">
            <h1 class="title">Sistem Informasi Manajemen Dosen</h1>
            <p>Selamat Datang di SIM-DOS alias Sistem Informasi Manajemen Dosen! Silahkan berkunjung!</p>
            {{-- <button>Lebih lanjut</button> --}}
        </div>
        <div class="content-image">
            <img src="assets/landing-page.svg" alt="landing-page.svg">
        </div>
    </div>
</main>
