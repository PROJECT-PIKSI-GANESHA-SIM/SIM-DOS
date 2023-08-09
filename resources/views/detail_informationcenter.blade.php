<style>
    .img-fluid {
        max-width: 100%;
        height: auto;
    }
</style>
@include('layouts.partials.navbar')

@extends('layouts.main')

@section('container')
    <div class="p-4">
        <a href="/informationcenter">
            <i class="fa fa-arrow-left me-2"></i>
            Kembali
        </a>
    </div>
    <div class="row mx-0 py-5">
        <div class="col-md-5 px-4">
            <img src="assets/thumbnails-blog.png" class="img-fluid" alt="Thumbnails">
        </div>

        <div class="col-md-7 px-4">
            <h1 class="blog-item__title">Dibuka! Pendaftaran Web Development Workshop for IDCamp Disabilities 2023</h1>
            <div class="mb-2 text-muted">18 Jul 2023</div>
        </div>
    </div>
    </div>
    <div class="row mx-0 py-5">
        <div class="col-md-10 mx-auto p-4">
            <div class="blog-content lh-lg">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Autem aliquid facere expedita eveniet harum
                recusandae temporibus laboriosam ipsam, impedit aliquam, quod omnis libero ea voluptatum et numquam?
                Blanditiis, consequatur debitis!
            </div>
        </div>
    </div>
@endsection