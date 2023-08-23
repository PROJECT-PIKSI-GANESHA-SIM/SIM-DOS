@extends('layouts.akademik-dashboard')

@section('title')

@endsection

@section('content')
<ul class="nav nav-tabs card-header-tabs justify-content-end mb-0" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active bg-primary text-white" id="tab1-tab" data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">Data Diri</a>
    </li>
    <li class="nav-item">
      <a class="nav-link bg-white text-black" id="tab2-tab" data-bs-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">Pendidikan</a>
    </li>
    <li class="nav-item">
      <a class="nav-link bg-white text-black" id="tab3-tab" data-bs-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">Pengajaran</a>
    </li>
    <li class="nav-item">
        <a class="nav-link bg-white text-black" id="tab4-tab" data-bs-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false">Penelitian</a>
    </li>
    <li class="nav-item">
        <a class="nav-link bg-white text-black" id="tab5-tab" data-bs-toggle="tab" href="#tab5" role="tab" aria-controls="tab5" aria-selected="false">Pengabdian</a>
    </li>
    <li class="nav-item">
        <a class="nav-link bg-white text-black" id="tab6-tab" data-bs-toggle="tab" href="#tab6" role="tab" aria-controls="tab6" aria-selected="false">Penunjang</a>
    </li>
    <li class="nav-item">
        <a class="nav-link bg-white text-black" id="tab7-tab" data-bs-toggle="tab" href="#tab7" role="tab" aria-controls="tab7" aria-selected="false">Capaian Luaran</a>
    </li>
  </ul>
<div class="card">
    <div class="card-body">
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
          <div class="row">
            <div class="col-md-6">
                <div class="card shadow bg-white flex-row card-rounded">
                    <div class="card-body my-auto">
                        <div class="title d-flex align-items-center justify-content-between">
                            <span class="fw-bold fs-5">Identitas Diri</span>
                            <a href="{{ route('dosen.identitas.edit', [$user->id, $identitas->id]) }}" class="justify-content-end">
                                <img class="" src="{{ asset("assets/edit.png") }}" alt="" width="25px" height="25px">
                            </a>
                        </div>
                        <hr>
                        {{-- <div class="image-profile d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/PIKSI.png') }}" alt="" width="170px;" height="170px">
                        </div> --}}
                        <div class="row">
                            <div class="col-md-12  d-flex align-items-center justify-content-center">
                                @if ($user->image == null)
                                    <img src="{{ asset('assets/profile-picture.jpg') }}" class="rounded-circle" alt="Profile Picture" width="100px" height="100px">
                                @else
                                    <img src="{{ Storage::url('dosen/profile/' . $user->image) }}" class="rounded-circle" alt="Profile Picture" width="100px" height="100px">
                                @endif
                            </div>
                        </div>
                        <div class="items mt-5 me-5 ms-5">
                            <div class="row mb-2">
                                <div class="col-md-6">NIDN</div>
                                <div class="col-md-6">{{ $user->nidn }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">NIP</div>
                                <div class="col-md-6">{{ $identitas->nip }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">NIK</div>
                                <div class="col-md-6">{{ $identitas->nik }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">Nama</div>
                                <div class="col-md-6">{{ $identitas->nama }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">Jenis Kelamin</div>
                                <div class="col-md-6">{{ $identitas->jenis_kelamin }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">Golongan Darah</div>
                                <div class="col-md-6">{{ $identitas->golongan_darah }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">Kewarganegaraan</div>
                                <div class="col-md-6">{{ $identitas->kewarganegaraan }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">Agama</div>
                                <div class="col-md-6">{{ $identitas->agama }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">Tempat Lahir</div>
                                <div class="col-md-6">{{ $identitas->tempat_lahir }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">Tanggal Lahir</div>
                                <div class="col-md-6">{{ $identitas->tanggal_lahir }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">Status Perkawinan</div>
                                <div class="col-md-6">{{ $identitas->status_perkawinan }}</div>
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
                        <a href="{{ route('dosen.alamat_kontak.edit', [$user->id, $alamat_kontak->id]) }}" class="justify-content-end">
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
                            <div class="col-md-6">{{ $alamat_kontak->alamat }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">RT</div>
                            <div class="col-md-6">{{ $alamat_kontak->rt }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">RW</div>
                            <div class="col-md-6">{{ $alamat_kontak->rw }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">NO</div>
                            <div class="col-md-6">{{ $alamat_kontak->no }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">Desa/Kelurahan</div>
                            <div class="col-md-6">{{ $alamat_kontak->desa_kelurahan }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">Kota/Kabupaten</div>
                            <div class="col-md-6">{{ $alamat_kontak->kota_kabupaten }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">Provinsi</div>
                            <div class="col-md-6">{{ $alamat_kontak->provinsi }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">Kode Pos</div>
                            <div class="col-md-6">{{ $alamat_kontak->kode_pos }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">No Telepon Rumah</div>
                            <div class="col-md-6">{{ $alamat_kontak->no_telepon_rumah }}</div>
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
                            <a href="{{ route('dosen.lain_lain.edit', [$user->id, $lain_lain->id]) }}" class="justify-content-end">
                                <img class="" src="{{ asset("assets/edit.png") }}" alt="" width="25px" height="25px">
                            </a>
                        </div>
                        <hr>
                        <div class="items mt-5 me-5 ms-5">
                            <div class="row mb-2">
                                <div class="col-md-6">NPWP</div>
                                <div class="col-md-6">{{ $lain_lain->npwp }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">Nama Wajib Pajak</div>
                                <div class="col-md-6">{{ $lain_lain->nama_wajib_pajak }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">SINTA ID</div>
                                <div class="col-md-6">{{ $lain_lain->sinta_id }}</div>
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
                            <a href="{{ route('dosen.kepegawaian.edit', [$user->id, $kepegawaian->id]) }}" class="justify-content-end">
                                <img class="" src="{{ asset("assets/edit.png") }}" alt="" width="25px" height="25px">
                            </a>
                        </div>
                        <hr>
                        <div class="items mt-5 me-5 ms-5">
                            <div class="row mb-2">
                                <div class="col-md-6">Program Studi</div>
                                <div class="col-md-6">{{ $kepegawaian->program_studi }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">Status Kepegawaian</div>
                                <div class="col-md-6">{{ $kepegawaian->status_kepegawaian }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">Status Keaktifan</div>
                                <div class="col-md-6">{{ $kepegawaian->status_keaktifan }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">Jabatan Fungsional</div>
                                <div class="col-md-6">{{ $kepegawaian->jabatan_fungsional }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">NO SK Sertifikasi Dosen</div>
                                <div class="col-md-6">{{ $kepegawaian->no_sk_sertifikasi_dosen }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">Nomor SK TMMD</div>
                                <div class="col-md-6">{{ $kepegawaian->no_sk_tmmd }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">Tanggal Mulai Menjadi Dosen</div>
                                <div class="col-md-6">{{ $kepegawaian->tanggal_menjadi_dosen }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">Pangkat/Golongan</div>
                                <div class="col-md-6">{{ $kepegawaian->pangkat_golongan }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <a href="{{ route('dosen.pendidikan.create',$user->id) }}" class="btn btn-sm btn-success mb-3">TAMBAH</a>
                        <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead style="background-color: #8A00B9;">
                                <tr class="text-center">
                                    <th scope="col">No</th>
                                    <th scope="col">Jenjang</th>
                                    <th scope="col">Gelar</th>
                                    <th scope="col">Bidang Studi</th>
                                    <th scope="col">Perguruan Tinggi</th>
                                    <th scope="col">Tahun Lulus</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if($pendidikan->isEmpty())
                                        <tr>
                                            <td colspan="7" class="text-center py-3">Tidak Ada Data</td>
                                        </tr>
                                    @else()
                                        @foreach ($pendidikan as $p)
                                        @php
                                            $jenjang_pendidikan = App\Models\JenjangPendidikan::find($p->jenjang_pendidikan);
                                        @endphp
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $jenjang_pendidikan->name}}</td>
                                            <td>{{ $p->gelar_singkat }}</td>
                                            <td>{{ $p->bidang_studi }}</td>
                                            <td>{{ $p->nama_instansi }}</td>
                                            <td>{{ $p->tanggal_berakhir_studi }}</td>
                                            <td>
                                                <div class="col">
                                                    <div class="row-3 text-center">
                                                        <form method="POST" onsubmit="return confirm('Apakah anda yakin?')" action="{{ route('dosen.pendidikan.destroy', [$user->id, $p->id]) }}">
                                                            <a href="{{ route('dosen.pendidikan.edit', [$user->id, $p->id]) }}">
                                                                <img src="{{ asset("assets/edit.png") }}" alt="" width="30px" height="30px">
                                                            </a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" style="border: none; background: none; padding: 0; cursor: pointer">
                                                                <img src="{{ asset("assets/delete.png") }}" alt="" width="30px" height="30px">
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif()
                                </tbody>
                            </table>
                            </div>
                        </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <nav aria-label="Page navigation">
                                <ul class="pagination">

                                    <!-- Tombol "Previous" -->
                                    <li class="page-item {{ $pendidikan->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $pendidikan->previousPageUrl() }}" aria-label="Previous">
                                            <span aria-hidden="true">Previous</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>

                                    <!-- Tombol nomor halaman -->
                                    @for ($i = 1; $i <= $pendidikan->lastPage(); $i++)
                                        <li class="page-item {{ $pendidikan->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $pendidikan->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor

                                    <!-- Tombol "Next" -->
                                    <li class="page-item {{ $pendidikan->currentPage() == $pendidikan->lastPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $pendidikan->nextPageUrl() }}" aria-label="Next">
                                            <span aria-hidden="true">Next</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <a href="{{ route('dosen.pengajaran.create', $user->id) }}" class="btn btn-sm btn-success mb-3">TAMBAH</a>
                        <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead style="background-color: #8A00B9;">
                                <tr class="text-center">
                                    <th scope="col">No</th>
                                    <th scope="col">Mata Kuliah</th>
                                    <th scope="col">Jenis <br>Mata Kuliah</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Tahun Ajar</th>
                                    <th scope="col">Jumlah <br>Mahasiswa</th>
                                    <th scope="col">SKS</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if ($pengajaran->isEmpty())
                                        <tr>
                                            <td colspan="8" class="text-center py-3">Tidak Ada Data</td>
                                        </tr>
                                    @endif
                                    @foreach ($pengajaran as $p)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->nama_mata_kuliah }}</td>
                                        <td>{{ $p->jenis_mata_kuliah }}</td>
                                        <td>{{ $p->kelas }}</td>
                                        <td>{{ $p->tahun_ajaran }}</td>
                                        <td>{{ $p->jumlah_mahasiswa }}</td>
                                        <td>{{ $p->jumlah_sks }}</td>
                                        <td>
                                            <div class="col">
                                                <div class="row-3 text-center">
                                                    <form method="POST" onsubmit="return confirm('Apakah anda yakin?')" action="{{ route('dosen.pengajaran.destroy', [$user->id, $p->id]) }}">

                                                        <a href="{{ route('dosen.pengajaran.edit', [$user->id, $p->id]) }}">
                                                            <img src="{{ asset("assets/edit.png") }}" alt="" width="30px" height="30px">
                                                        </a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" style="border: none; background: none; padding: 0; cursor: pointer">
                                                            <img src="{{ asset("assets/delete.png") }}" alt="" width="30px" height="30px">
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <nav aria-label="Page navigation">
                                <ul class="pagination">

                                    <!-- Tombol "Previous" -->
                                    <li class="page-item {{ $pengajaran->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $pengajaran->previousPageUrl() }}" aria-label="Previous">
                                            <span aria-hidden="true">Previous</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>

                                    <!-- Tombol nomor halaman -->
                                    @for ($i = 1; $i <= $pengajaran->lastPage(); $i++)
                                        <li class="page-item {{ $pengajaran->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $pengajaran->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor

                                    <!-- Tombol "Next" -->
                                    <li class="page-item {{ $pengajaran->currentPage() == $pengajaran->lastPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $pengajaran->nextPageUrl() }}" aria-label="Next">
                                            <span aria-hidden="true">Next</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4-tab">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <a href="{{ route('dosen.penelitian.create', $user->id) }}" class="btn btn-sm btn-success mb-3">TAMBAH</a>
                        <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead style="background-color: #8A00B9;">
                                <tr class="text-center">
                                    <th scope="col">No</th>
                                    <th scope="col">Tahun</th>
                                    <th scope="col">Judul Penelitian</th>
                                    <th scope="col">Ketua/Anggota</th>
                                    <th scope="col">Sumber Dana</th>
                                    <th scope="col">Jumlah Dana</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if ($penelitian->isEmpty())
                                        <tr>
                                            <td colspan="7" class="text-center py-3">Tidak Ada Data</td>
                                        </tr>
                                    @endif
                                    @foreach ($penelitian as $p)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $p->tahun_kegiatan }}</td>
                                            <td>{{ $p->judul_penelitian }}</td>
                                            <td>{{ $p->status_peneliti }}</td>
                                            <td>{{ $p->sumber_dana }}</td>
                                            <td>{{ $p->jumlah_dana }}</td>
                                            <td>
                                                <div class="col">
                                                    <div class="row-3 text-center">
                                                        <form method="POST" onsubmit="return confirm('Apakah anda yakin?')" action="{{ route('dosen.penelitian.destroy', [$user->id, $p->id]) }}">

                                                            <a href="{{ route('dosen.penelitian.edit', [$user->id, $p->id]) }}">
                                                                <img src="{{ asset("assets/edit.png") }}" alt="" width="30px" height="30px">
                                                            </a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" style="border: none; background: none; padding: 0; cursor: pointer">
                                                                <img src="{{ asset("assets/delete.png") }}" alt="" width="30px" height="30px">
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <nav aria-label="Page navigation">
                                <ul class="pagination">

                                    <!-- Tombol "Previous" -->
                                    <li class="page-item {{ $penelitian->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $penelitian->previousPageUrl() }}" aria-label="Previous">
                                            <span aria-hidden="true">Previous</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>

                                    <!-- Tombol nomor halaman -->
                                    @for ($i = 1; $i <= $penelitian->lastPage(); $i++)
                                        <li class="page-item {{ $penelitian->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $penelitian->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor

                                    <!-- Tombol "Next" -->
                                    <li class="page-item {{ $penelitian->currentPage() == $penelitian->lastPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $penelitian->nextPageUrl() }}" aria-label="Next">
                                            <span aria-hidden="true">Next</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="tab-pane fade" id="tab5" role="tabpanel" aria-labelledby="tab5-tab">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <a href="{{ route('dosen.pengabdian.create', $user->id) }}" class="btn btn-sm btn-success mb-3">TAMBAH</a>
                        <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead style="background-color: #8A00B9;">
                                <tr class="text-center">
                                    <th scope="col">No</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Bidang Keilmuan</th>
                                    <th scope="col">Tahun <br> Pelaksanaan</th>
                                    <th scope="col">Lama Kegiatan</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if ($pengabdian->isEmpty())
                                        <tr>
                                            <td colspan="7" class="text-center py-3">Tidak Ada Data</td>
                                        </tr>
                                    @else()
                                        @foreach ($pengabdian as $p)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $p->judul_pengabdian }}</td>
                                            <td>{{ $p->bidang_keilmuan }}</td>
                                            <td>{{ $p->tahun_pelaksanaan }}</td>
                                            <td>{{ $p->lama_kegiatan }}</td>
                                            <td>
                                                <div class="col">
                                                    <div class="row-3 text-center">
                                                        <form method="POST" onsubmit="return confirm('Apakah anda yakin?')" action="{{ route('dosen.pengabdian.destroy', [$user->id, $p->id]) }}">

                                                            <a href="{{ route('dosen.pengabdian.edit', [$user->id, $p->id]) }}">
                                                                <img src="{{ asset("assets/edit.png") }}" alt="" width="30px" height="30px">
                                                            </a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" style="border: none; background: none; padding: 0; cursor: pointer">
                                                                <img src="{{ asset("assets/delete.png") }}" alt="" width="30px" height="30px">
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            </div>
                        </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <nav aria-label="Page navigation">
                                <ul class="pagination">

                                    <!-- Tombol "Previous" -->
                                    <li class="page-item {{ $pengabdian->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $pengabdian->previousPageUrl() }}" aria-label="Previous">
                                            <span aria-hidden="true">Previous</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>

                                    <!-- Tombol nomor halaman -->
                                    @for ($i = 1; $i <= $pengabdian->lastPage(); $i++)
                                        <li class="page-item {{ $pengabdian->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $pengabdian->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor

                                    <!-- Tombol "Next" -->
                                    <li class="page-item {{ $pengabdian->currentPage() == $pengabdian->lastPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $pengabdian->nextPageUrl() }}" aria-label="Next">
                                            <span aria-hidden="true">Next</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        </div>
                    </div>
            </div>
        </div>

        <div class="tab-pane fade" id="tab6" role="tabpanel" aria-labelledby="tab6-tab">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <a href="{{ route('dosen.penunjang.create', $user->id) }}" class="btn btn-sm btn-success mb-3">TAMBAH</a>
                        <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead style="background-color: #8A00B9;">
                                <tr class="text-center">
                                    <th scope="col">No</th>
                                    <th scope="col">Kategori Kegiatan</th>
                                    <th scope="col">Nama Kegiatan</th>
                                    <th scope="col">Pelaksanaan</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if($menu_penunjang->isEmpty())
                                        <tr>
                                            <td colspan="7" class="text-center py-3">Tidak Ada Data</td>
                                        </tr>
                                    @else()
                                        @foreach ($menu_penunjang as $p)
                                        {{-- @php
                                            $menu_penunjang = App\Models\MenuPenunjang::find($p->jenjang_pendidikan);
                                        @endphp --}}
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $p->kategori_kegiatan}}</td>
                                            <td>{{ $p->nama_kegiatan }}</td>
                                            <td>{{ $p->pelaksanaan }}</td>
                                            <td>
                                                <div class="col">
                                                    <div class="row-3 text-center">
                                                        <form method="POST" onsubmit="return confirm('Apakah anda yakin?')" action="{{ route('dosen.penunjang.destroy', [$user->id, $p->id]) }}">

                                                            <a href="{{ route('dosen.penunjang.edit', [$user->id, $p->id]) }}">
                                                                <img src="{{ asset("assets/edit.png") }}" alt="" width="30px" height="30px">
                                                            </a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" style="border: none; background: none; padding: 0; cursor: pointer">
                                                                <img src="{{ asset("assets/delete.png") }}" alt="" width="30px" height="30px">
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif()
                                </tbody>
                            </table>
                            </div>
                        </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <nav aria-label="Page navigation">
                                <ul class="pagination">

                                    <!-- Tombol "Previous" -->
                                    <li class="page-item {{ $menu_penunjang->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $menu_penunjang->previousPageUrl() }}" aria-label="Previous">
                                            <span aria-hidden="true">Previous</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>

                                    <!-- Tombol nomor halaman -->
                                    @for ($i = 1; $i <= $menu_penunjang->lastPage(); $i++)
                                        <li class="page-item {{ $menu_penunjang->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $menu_penunjang->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor

                                    <!-- Tombol "Next" -->
                                    <li class="page-item {{ $menu_penunjang->currentPage() == $menu_penunjang->lastPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $menu_penunjang->nextPageUrl() }}" aria-label="Next">
                                            <span aria-hidden="true">Next</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        </div>
                    </div>
            </div>
        </div>

        <div class="tab-pane fade" id="tab7" role="tabpanel" aria-labelledby="tab7-tab">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <a href="{{ route('dosen.capaian_luaran.create', $user->id) }}" class="btn btn-sm btn-success mb-3">TAMBAH</a>
                        <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead style="background-color: #8A00B9;">
                                <tr class="text-center">
                                    <th scope="col">No</th>
                                    <th scope="col">Jenis Luaran</th>
                                    <th scope="col">Judul Karya</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Tautan Eksternal</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if($capaian_luaran->isEmpty())
                                        <tr>
                                            <td colspan="7" class="text-center py-3">Tidak Ada Data</td>
                                        </tr>
                                    @else()
                                        @foreach ($capaian_luaran as $p)
                                        {{-- @php
                                            $menu_penunjang = App\Models\MenuPenunjang::find($p->jenjang_pendidikan);
                                        @endphp --}}
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $p->jenis_luaran}}</td>
                                            <td>{{ $p->judul_karya }}</td>
                                            <td>{{ $p->tanggal }}</td>
                                            <td>{{ $p->tautan_eksternal }}</td>
                                            <td>
                                                <div class="col">
                                                    <div class="row-3 text-center">
                                                        <form method="POST" onsubmit="return confirm('Apakah anda yakin?')" action="{{ route('dosen.capaian_luaran.destroy', [$user->id, $p->id]) }}">

                                                            <a href="{{ route('dosen.capaian_luaran.edit', [$user->id, $p->id]) }}">
                                                                <img src="{{ asset("assets/edit.png") }}" alt="" width="30px" height="30px">
                                                            </a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" style="border: none; background: none; padding: 0; cursor: pointer">
                                                                <img src="{{ asset("assets/delete.png") }}" alt="" width="30px" height="30px">
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif()
                                </tbody>
                            </table>
                            </div>
                        </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <nav aria-label="Page navigation">
                                <ul class="pagination">

                                    <!-- Tombol "Previous" -->
                                    <li class="page-item {{ $capaian_luaran->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $capaian_luaran->previousPageUrl() }}" aria-label="Previous">
                                            <span aria-hidden="true">Previous</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>

                                    <!-- Tombol nomor halaman -->
                                    @for ($i = 1; $i <= $capaian_luaran->lastPage(); $i++)
                                        <li class="page-item {{ $capaian_luaran->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $capaian_luaran->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor

                                    <!-- Tombol "Next" -->
                                    <li class="page-item {{ $capaian_luaran->currentPage() == $capaian_luaran->lastPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $capaian_luaran->nextPageUrl() }}" aria-label="Next">
                                            <span aria-hidden="true">Next</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        </div>
                    </div>
            </div>
        </div>

      </div>
    </div>
  </div>

  <script>
    var tabs = document.querySelectorAll('.nav-link');

    tabs.forEach(function(tab) {
        tab.addEventListener('click', function() {
            tabs.forEach(function(tab) {
                tab.classList.remove('active');
                tab.classList.remove('bg-primary');
                tab.classList.remove('text-white');

                tab.classList.add('bg-white');
                tab.classList.add('text-black');
            });

            this.classList.add('active');
            this.classList.add('bg-primary');
            this.classList.add('text-white');

            this.classList.remove('bg-white');
            this.classList.remove('text-black');
        });
    });
</script>

@endsection
