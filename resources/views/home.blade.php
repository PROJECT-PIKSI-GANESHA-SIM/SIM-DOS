@extends('layouts.main')
@include('landing')
@section('container')
    <div class="loader"></div>
    <h1 class="text-center py-5">Pusat Informasi</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card">
                <img src="assets/project-img.jpg" class="card-img-top" alt="thumbnail">
                <div class="card-body">
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <h5 class="card-title">
                        <a href="">Card Title</a>
                    </h5>
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
                    <h5 class="card-title">
                        <a href="">Card Title</a>
                    </h5>
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
                    <h5 class="card-title">
                        <a href="">Card Title</a>
                    </h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <p class="text-end"><a href="/informationcenter"><b>Lihat semua informasi</b></a></p>
    </div>
@endsection
