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
        padding: 4rem 4rem;
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
</style>
@extends('layouts.main')

@section('container')
    <main>
        <div class="content">
            <div class="content-description">
                <h1 class="title">Sistem Informasi Manajemen Dosen</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, sunt? Libero odit voluptatum ad
                    similique, iure facere necessitatibus autem, quo dignissimos dolores accusantium vitae illo, esse fuga.
                    Sint, vel inventore.</p>
                {{-- <button>Lebih lanjut</button> --}}
            </div>
            <div class="content-image">
                <img src="assets/landing-page.svg" alt="landing-page.svg">
            </div>
        </div>
    </main>
    <h1 class="text-center py-5">Pusat Informasi</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card">
                <img src="assets/project-img.jpg" class="card-img-top" alt="thumbnail">
                <div class="card-body">
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="assets/project-img.jpg" class="card-img-top" alt="thumbnail">
                <div class="card-body">
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="assets/project-img.jpg" class="card-img-top" alt="thumbnail">
                <div class="card-body">
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <p class="text-end"><a href="/informationcenter">Lihat semua informasi</a></p>
    </div>
@endsection
