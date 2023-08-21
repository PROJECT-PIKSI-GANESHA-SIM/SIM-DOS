<style>
    .card {
        display: flex;
        flex-direction: column;
        height: 100%;
        border: 3px solid transparent; /* Menambahkan border pada card dengan ketebalan 3px */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Efek shadow (bayangan) pada card */
        transition: border-color 0.3s, box-shadow 0.3s; /* Efek transisi untuk perubahan warna border dan shadow */
    }

    .card:hover {
        border-color: #8A00B9; /* Warna ungu untuk border ketika dihover */
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2); /* Efek shadow lebih kuat saat dihover */
    }

    .row-cols-md-3 .col {
        display: flex;
        flex: 1;
    }
</style>
@extends('layouts.main')
@include('landing')
@section('container')
    <div class="loader"></div>
    <h1 class="text-center py-5">Pusat Informasi</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($pusat_informasi as $informasi)
            <div class="col">
                <div class="card">
                    <img src="{{ Storage::url('akademik/pusat_informasi/' . $informasi->thumbnail) }}" class="card-img-top"
                        alt="thumbnail">
                    <div class="card-body">
                        <p class="card-text"><small class="text-muted">Last updated
                                {{ $informasi->updated_at->format('Y-m-d') }}</small></p>
                        <h5 class="card-title">
                            <a
                                href="{{ route('informationcenter.detail', $informasi->id) }}">{{ \Illuminate\Support\Str::limit($informasi->title, 100) }}</a>
                        </h5>
                        <p class="card-text">{!! \Illuminate\Support\Str::limit($informasi->description, 100, '...') !!}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <br>
    <p class="text-end"><a href="/informationcenter"><b>Lihat semua informasi</b></a></p>
    </div>
@endsection
