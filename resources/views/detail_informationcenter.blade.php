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
        <img src="{{ Storage::url('akademik/pusat_informasi/' . $pusat_informasi->thumbnail) }}" class="img-fluid" alt="Thumbnail">
    </div>

    <div class="col-md-7 px-4">
        <h1 class="blog-item__title">{{ $pusat_informasi->title }}</h1>
        <div class="mb-2 text-muted">{{ $pusat_informasi->updated_at->format('Y-m-d') }}</div>
    </div>
</div>
<div class="row mx-0 py-5">
    <div class="col-md-10 mx-auto p-4">
        <div class="blog-content lh-lg">
            {!! $pusat_informasi->description !!}
        </div>
    </div>
</div>
@endsection
