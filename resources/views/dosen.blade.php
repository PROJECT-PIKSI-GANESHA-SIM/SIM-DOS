@include('layouts.partials.navbar')

@extends('layouts.main')

@section('container')
    <h1 class="text-4xl text-gray-700 mb-2 font-weight-bold py-3">
        <center>Daftar Profil Dosen</center>
    </h1>
    <p class="py-3">Masukkan Nama Dosen, NIDN atau Prodi Jurusan</p>
    <input class="form-control" id="myInput" type="text" placeholder="Cari..">
    <br>
    {{-- <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody id="myTable">
            <tr>
                <td>John</td>
                <td>Doe</td>
                <td>john@example.com</td>
            </tr>
            <tr>
                <td>Mary</td>
                <td>Moe</td>
                <td>mary@mail.com</td>
            </tr>
            <tr>
                <td>July</td>
                <td>Dooley</td>
                <td>july@greatstuff.com</td>
            </tr>
            <tr>
                <td>Anja</td>
                <td>Ravendale</td>
                <td>a_r@test.com</td>
            </tr>
        </tbody>
    </table> --}}

    {{-- <div class="col" id="myCard">
        <div class="card">
            <img src="assets/thumbnails-profile.png" class="card-img-top" alt="thumbnail">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="">Wijaya</a>
                </h5>
                <p class="card-text">456</p>
                <p class="card-text"><small class="text-muted">Ekonomi</small></p>
            </div>
        </div>
    </div>
    <div class="col" id="myCard">
        <div class="card">
            <img src="assets/thumbnails-profile.png" class="card-img-top" alt="thumbnail">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="">Nama Dosen</a>
                </h5>
                <p class="card-text">NIDN</p>
                <p class="card-text"><small class="text-muted">Prodi</small></p>
            </div>
        </div>
    </div>
    <div class="col" id="myCard">
        <div class="card">
            <img src="assets/thumbnails-profile.png" class="card-img-top" alt="thumbnail">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="">Nama Dosen</a>
                </h5>
                <p class="card-text">NIDN</p>
                <p class="card-text"><small class="text-muted">Prodi</small></p>
            </div>
        </div>
    </div>
    <div class="col" id="myCard">
        <div class="card">
            <img src="assets/thumbnails-profile.png" class="card-img-top" alt="thumbnail">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="">Nama Dosen</a>
                </h5>
                <p class="card-text">NIDN</p>
                <p class="card-text"><small class="text-muted">Prodi</small></p>
            </div>
        </div>
    </div>
    <div class="col" id="myCard">
        <div class="card">
            <img src="assets/thumbnails-profile.png" class="card-img-top" alt="thumbnail">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="">Nama Dosen</a>
                </h5>
                <p class="card-text">NIDN</p>
                <p class="card-text"><small class="text-muted">Prodi</small></p>
            </div>
        </div>
    </div>
    <div class="col" id="myCard">
        <div class="card">
            <img src="assets/thumbnails-profile.png" class="card-img-top" alt="thumbnail">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="">Nama Dosen</a>
                </h5>
                <p class="card-text">NIDN</p>
                <p class="card-text"><small class="text-muted">Prodi</small></p>
            </div>
        </div>
    </div>
    <div class="col" id="myCard">
        <div class="card">
            <img src="assets/thumbnails-profile.png" class="card-img-top" alt="thumbnail">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="">Nama Dosen</a>
                </h5>
                <p class="card-text">NIDN</p>
                <p class="card-text"><small class="text-muted">Prodi</small></p>
            </div>
        </div>
    </div>
    <div class="col" id="myCard">
        <div class="card">
            <img src="assets/thumbnails-profile.png" class="card-img-top" alt="thumbnail">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="">Nama Dosen</a>
                </h5>
                <p class="card-text">NIDN</p>
                <p class="card-text"><small class="text-muted">Prodi</small></p>
            </div>
        </div>
    </div>
    <div class="col" id="myCard">
        <div class="card">
            <img src="assets/thumbnails-profile.png" class="card-img-top" alt="thumbnail">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="">Nama Dosen</a>
                </h5>
                <p class="card-text">NIDN</p>
                <p class="card-text"><small class="text-muted">Prodi</small></p>
            </div>
        </div>
    </div>
    <div class="col" id="myCard">
        <div class="card">
            <img src="assets/thumbnails-profile.png" class="card-img-top" alt="thumbnail">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="">Nama Dosen</a>
                </h5>
                <p class="card-text">NIDN</p>
                <p class="card-text"><small class="text-muted">Prodi</small></p>
            </div>
        </div>
    </div>
    <div class="col" id="myCard">
        <div class="card">
            <img src="assets/thumbnails-profile.png" class="card-img-top" alt="thumbnail">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="">Nama Dosen</a>
                </h5>
                <p class="card-text">NIDN</p>
                <p class="card-text"><small class="text-muted">Prodi</small></p>
            </div>
        </div>
    </div> --}}

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
                    {{-- <p class="card-text"><small class="text-muted">IT</small></p> --}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection