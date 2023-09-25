<style>
    .card {
        transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        border-width: 2px;
    }

    .card:hover {
        border-color: #8A00B9;
        box-shadow: 0 8px 16px rgba(138, 0, 185, 0.3);
    }
    .custom-card {
        width: 100%;
        height: 100%;
    }
</style>
@include('layouts.partials.navbar')
@extends('layouts.main')
@section('container')
    <h1 class="text-4xl text-gray-700 mb-2 font-weight-bold py-3">
        <center>Daftar Profil Dosen</center>
    </h1>
    <p class="py-3">Masukkan Nama Dosen, NIDN atau Program Studi</p>
    <input class="form-control" id="myInput" type="text" placeholder="Cari..">
    <br>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach ($users_dosen as $dosen)
        <div class="col" id="myCard">
            <div class="card custom-card">
                <a href="{{ route('alldosen.detail', $dosen->id) }}">
                    @if (isset($dosen->image))
                        <img src="{{ Storage::url('dosen/profile/' . $dosen->image) }}" class="card-img-top" alt="thumbnail">
                    @else
                        <img src="http://localhost:8000/assets/profile-picture.jpg" class="card-img-top" alt="Default Thumbnail">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $dosen->name }}</h5>
                        <p class="card-text">{{ $dosen->nidn }}</p>
                        <p class="card-text">{{ $dosen->program_studi }}</p>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
@endsection
