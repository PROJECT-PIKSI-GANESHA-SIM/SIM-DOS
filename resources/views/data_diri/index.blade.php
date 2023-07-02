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
                    <a href="{{ route('identitas.edit', $identitas[0]->id) }}" class="justify-content-end">
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
                        <div class="col-md-6">{{ $user->nidn }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">NIP</div>
                        <div class="col-md-6">{{ $identitas[0]->nip }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">NIK</div>
                        <div class="col-md-6">{{ $identitas[0]->nik }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Nama</div>
                        <div class="col-md-6">{{ $identitas[0]->nama }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Jenis Kelamin</div>
                        <div class="col-md-6">{{ $identitas[0]->jenis_kelamin }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Golongan Darah</div>
                        <div class="col-md-6">{{ $identitas[0]->golongan_darah }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Kewarganegaraan</div>
                        <div class="col-md-6">{{ $identitas[0]->kewarganegaraan }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Agama</div>
                        <div class="col-md-6">{{ $identitas[0]->agama }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Tempat Lahir</div>
                        <div class="col-md-6">{{ $identitas[0]->tempat_lahir }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Tanggal Lahir</div>
                        <div class="col-md-6">{{ $identitas[0]->tanggal_lahir }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Status Perkawinan</div>
                        <div class="col-md-6">{{ $identitas[0]->status_perkawinan }}</div>
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
                    <a href="{{ route('alamat_kontak.edit', $alamat_kontak[0]->id) }}" class="justify-content-end">
                        <img class="" src="{{ asset("assets/edit.png") }}" alt="" width="25px" height="25px">
                    </a>
                </div>
                <hr>
                <div class="items mt-5 me-5 ms-5">
                    <div class="row mb-2">
                        <div class="col-md-6">Email</div>
                        <div class="col-md-6">{{ $user->email }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Alamat</div>
                        <div class="col-md-6">{{ $alamat_kontak[0]->alamat }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">RT</div>
                        <div class="col-md-6">{{ $alamat_kontak[0]->rt }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">RW</div>
                        <div class="col-md-6">{{ $alamat_kontak[0]->rw }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">NO</div>
                        <div class="col-md-6">{{ $alamat_kontak[0]->no }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Desa/Kelurahan</div>
                        <div class="col-md-6">{{ $alamat_kontak[0]->desa_kelurahan }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Kota/Kabupaten</div>
                        <div class="col-md-6">{{ $alamat_kontak[0]->kota_kabupaten }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Provinsi</div>
                        <div class="col-md-6">{{ $alamat_kontak[0]->provinsi }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Kode Pos</div>
                        <div class="col-md-6">{{ $alamat_kontak[0]->kode_pos }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">No Telepon Rumah</div>
                        <div class="col-md-6">{{ $alamat_kontak[0]->no_telepon_rumah }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">No Handphone</div>
                        <div class="col-md-6">{{ $user->no_telpn }}</div>
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
                        <div class="col-md-6">{{ $lain_lain[0]->npwp }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Nama Wajib Pajak</div>
                        <div class="col-md-6">{{ $lain_lain[0]->nama_wajib_pajak }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">SINTA ID</div>
                        <div class="col-md-6">{{ $lain_lain[0]->sinta_id }}</div>
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
                        <div class="col-md-6">{{ $kepegawaian[0]->program_studi }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Status Kepegawaian</div>
                        <div class="col-md-6">{{ $kepegawaian[0]->status_kepegawaian }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Status Keaktifan</div>
                        <div class="col-md-6">{{ $kepegawaian[0]->status_keaktifan }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Jabatan Fungsional</div>
                        <div class="col-md-6">{{ $kepegawaian[0]->jabatan_fungsional }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">NO SK Sertifikasi Dosen</div>
                        <div class="col-md-6">{{ $kepegawaian[0]->no_sk_sertifikasi_dosen }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Nomor SK TMMD</div>
                        <div class="col-md-6">{{ $kepegawaian[0]->no_sk_tmmd }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Tanggal Mulai Menjadi Dosen</div>
                        <div class="col-md-6">{{ $kepegawaian[0]->tanggal_menjadi_dosen }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">Pangkat/Golongan</div>
                        <div class="col-md-6">{{ $kepegawaian[0]->pangkat_golongan }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection