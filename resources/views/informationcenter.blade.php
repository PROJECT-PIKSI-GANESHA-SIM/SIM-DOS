@include('layouts.partials.navbar')

@extends('layouts.main')
<style>
    body {
        background-image: url('assets/patternpad-pusatinformasi.svg');
        background-repeat: no-repeat;
    }
</style>
@section('container')
    <div class="container py-5">
        <h1 class="text-center">Pusat Informasi</h1>
        <p class="text-center">Pusat Informasi seputar Dosen dari Politeknik Piksi Ganesha Bandung</p>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($pusat_informasi as $informasi)
            <div class="col">
                <div class="card">
                    <img src="{{ Storage::url('akademik/pusat_informasi/' . $informasi->thumbnail) }}" class="card-img-top" alt="thumbnail">
                    <div class="card-body">
                        <p class="card-text"><small class="text-muted">Last updated {{ $informasi->updated_at->format('Y-m-d') }}</small></p>
                        <h5 class="card-title">
                            <a href="{{ route('informationcenter.detail', $informasi->id) }}">{{ \Illuminate\Support\Str::limit($informasi->title, 100) }}</a>
                        </h5>
                        {{-- <p class="card-text">{!! \Illuminate\Support\Str::limit($informasi->description, 10, '...') !!}</p> --}}
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <br>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <nav aria-label="Page navigation">
                <ul class="pagination">

                    <!-- Tombol "Previous" -->
                    <li class="page-item {{ $pusat_informasi->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $pusat_informasi->previousPageUrl() }}" aria-label="Previous">
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>

                    <!-- Tombol nomor halaman -->
                    @for ($i = 1; $i <= $pusat_informasi->lastPage(); $i++)
                        <li class="page-item {{ $pusat_informasi->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $pusat_informasi->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    <!-- Tombol "Next" -->
                    <li class="page-item {{ $pusat_informasi->currentPage() == $pusat_informasi->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $pusat_informasi->nextPageUrl() }}" aria-label="Next">
                            {{-- <span aria-hidden="true">Next</span> --}}
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </ul>
    </nav>
@endsection
