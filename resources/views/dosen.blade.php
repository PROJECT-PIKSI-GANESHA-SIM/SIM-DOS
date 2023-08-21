@include('layouts.partials.navbar')

@extends('layouts.main')

@section('container')
    <h1 class="text-4xl text-gray-700 mb-2 font-weight-bold py-3">
        <center>Daftar Profil Dosen</center>
    </h1>
    <p class="py-3">Masukkan Nama Dosen atau NIDN</p>
    <input class="form-control" id="myInput" type="text" placeholder="Cari..">
    <br>

    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach ($users_dosen as $dosen)
        <div class="col" id="myCard">
            <div class="card">
                <img src="{{ Storage::url('dosen/profile/' . $dosen->image) }}" class="card-img-top" alt="thumbnail">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('alldosen.detail',$dosen->id) }}"> {{ $dosen->name }}</a>
                    </h5>
                    <p class="card-text">{{ $dosen->nidn }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection