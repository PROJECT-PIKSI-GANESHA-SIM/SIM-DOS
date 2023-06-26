@extends('layouts.dashboard')

@section('title')
    
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card shadow bg-white flex-row card-rounded">
            <div class="card-body my-auto">
                <div class="title d-flex align-items-center justify-content-between">
                    <span class="fw-bold fs-5">Identitas Diri</span>
                    <a href="" class="justify-content-end">
                        <img class="" src="{{ asset("assets/edit.png") }}" alt="" width="25px" height="25px">
                    </a>
                </div>
                <hr>
                <div class="image-profile d-flex justify-content-center align-items-center">
                    <img src="{{ asset('assets/PIKSI.png') }}" alt="" width="170px;" height="170px">
                </div>
                <div class="items mt-5 me-5 ms-5">
                    <div class="row mb-2">
                        <div class="col-md-6">NIDN</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">NIP</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">NIK</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Nama</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Jenis Kelamin</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Golongan Darah</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Kewarganegaraan</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Agama</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Tempat Lahir</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Tanggal Lahir</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Status Perkawinan</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow bg-white flex-row card-rounded">
            <div class="card-body my-auto">
                <div class="title d-flex align-items-center justify-content-between">
                    <span class="fw-bold fs-5">Alamat Dan Kotak</span>
                    <a href="" class="justify-content-end">
                        <img class="" src="{{ asset("assets/edit.png") }}" alt="" width="25px" height="25px">
                    </a>
                </div>
                <hr>
                <div class="items mt-5 me-5 ms-5">
                    <div class="row mb-2">
                        <div class="col-md-6">Email</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Alamat</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">RT</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">RW</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">NO</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Desa/Kelurahan</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Kota/Kabupaten</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Provinsi</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Kode Pos</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">No Telepon Rumah</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">No Handphone</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card shadow bg-white flex-row card-rounded">
            <div class="card-body my-auto">
                <div class="title d-flex align-items-center justify-content-between">
                    <span class="fw-bold fs-5">Lain - Lain</span>
                    <a href="" class="justify-content-end">
                        <img class="" src="{{ asset("assets/edit.png") }}" alt="" width="25px" height="25px">
                    </a>
                </div>
                <hr>
                <div class="items mt-5 me-5 ms-5">
                    <div class="row mb-2">
                        <div class="col-md-6">NPWP</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Nama Wajib Pajak</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">SINTA ID</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow bg-white flex-row card-rounded">
            <div class="card-body my-auto">
                <div class="title d-flex align-items-center justify-content-between">
                    <span class="fw-bold fs-5">Kepegawaian</span>
                    <a href="" class="justify-content-end">
                        <img class="" src="{{ asset("assets/edit.png") }}" alt="" width="25px" height="25px">
                    </a>
                </div>
                <hr>
                <div class="items mt-5 me-5 ms-5">
                    <div class="row mb-2">
                        <div class="col-md-6">Program Studi</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Status Kepegawaian</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Status Keaktifan</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Jabatan Fungsional</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">NO SK Sertifikasi Dosen</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Nomor SK TMMD</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Tanggal Mulai Menjadi Dosen</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Pangkat/Golongan</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection