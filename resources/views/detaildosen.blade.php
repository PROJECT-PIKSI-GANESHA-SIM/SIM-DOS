<style>
    .text-end,
    .text-center {
        font-weight: bold;
    }
</style>
@include('layouts.partials.navbar')

@extends('layouts.main')

@section('container')
    <h3 class="text-4xl text-gray-700 mb-2 font-weight-bold py-3">
        <center>Detail Dosen</center>
    </h3>
    <div class="container pt-4 pb-5">
        <div class="row">
            <div class="col-md-5 px-4">
                <center>
                    <img src="{{ Storage::url('dosen/profile/' . $detaildosen->image) }}" alt="Foto Dosen" class="mb-4" width="380">
                </center>
            </div>
            <div class="col">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td class="text-end" width="35%">NIDN/NUPN</td>
                            <td>{{ $detaildosen->nidn }}</td>
                        </tr>
                        <tr>
                            <td class="text-end" width="35%">NIP</td>
                            <td>{{ $identitasdiri->nip }}</td>
                        </tr>
                        <tr>
                            <td class="text-end" width="35%">NIK</td>
                            <td>{{ $identitasdiri->nik }}</td>
                        </tr>
                        <tr>
                            <td class="text-end" width="35%">Nama Lengkap</td>
                            <td>{{ $identitasdiri->nama }}</td>
                        </tr>
                        <tr>
                            <td class="text-end" width="35%">Tempat Lahir</td>
                            <td>{{ $identitasdiri->tempat_lahir }}</td>
                        </tr>
                        <tr>
                            <td class="text-end" width="35%">Tanggal lahir</td>
                            <td>{{ $identitasdiri->tanggal_lahir }}</td>
                        </tr>
                        <tr>
                            <td class="text-end" width="35%">Jenis Kelamin</td>
                            <td>{{ $identitasdiri->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                            <td class="text-end" width="35%">Agama</td>
                            <td>{{ $identitasdiri->agama }}</td>
                        </tr>
                        <tr>
                            <td class="text-end" width="35%">Golongan Darah</td>
                            <td>{{ $identitasdiri->golongan_darah }}</td>
                        </tr>
                        <tr>
                            <td class="text-end" width="35%">Status Perkawinan</td>
                            <td>{{ $identitasdiri->status_perkawinan }}</td>
                        </tr>
                        <tr>
                            <td class="text-end" width="35%">Kewarganegaraan</td>
                            <td>{{ $identitasdiri->kewarganegaraan }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <h3 class="text-4xl text-gray-700 mb-2 font-weight-bold py-3">Pendidikan Formal</h3>
        <table class="table table-striped">
            <tbody>
                <tr class="text-center">
                    <td>No</td>
                    <td>Jenjang</td>
                    <td>Gelar</td>
                    <td>Bidang Studi</td>
                    <td>Perguruan Tinggi</td>
                    <td>Tahun lulus</td>
                </tr>
                <tr>
                    <td>Example</td>
                    <td><center>{{ $pendidikan->jenjang_pendidikan }}</center></td>
                    <td><center>{{ $pendidikan->gelar_singkat }}</center></td>
                    <td><center>{{ $pendidikan->bidang_studi }}</center></td>
                    <td><center>{{ $pendidikan->nama_instansi }}</center></td>
                    <td><center>{{ $pendidikan->tanggal_berakhir_studi }}</center></td>
                </tr>
            </tbody>
        </table>
        <h3 class="text-4xl text-gray-700 mb-2 font-weight-bold py-3">Pengajaran</h3>
        <table class="table table-striped">
            <tbody>
                <tr class="text-center">
                    <td>No</td>
                    <td>Mata Kuliah</td>
                    <td>Jenis Mata Kuliah</td>
                    <td>Kelas</td>
                    <td>Tahun Ajar</td>
                    <td>Jumlah Mahasiswa</td>
                    <td>SKS</td>
                </tr>
                <tr>
                    <td>Example</td>
                    <td><center>{{ $pengajaran->nama_mata_kuliah }}</center></td>
                    <td><center>{{ $pengajaran->jenis_mata_kuliah }}</center></td>
                    <td><center>{{ $pengajaran->kelas }}</center></td>
                    <td><center>{{ $pengajaran->tahun_ajaran }}</center></td>
                    <td><center>{{ $pengajaran->jumlah_mahasiswa }}</center></td>
                    <td><center>{{ $pengajaran->jumlah_sks }}</center></td>
                </tr>
            </tbody>
        </table>
        <h3 class="text-4xl text-gray-700 mb-2 font-weight-bold py-3">Penelitian</h3>
        <table class="table table-striped">
            <tbody>
                <tr class="text-center">
                    <td>No</td>
                    <td>Tahun</td>
                    <td width="45%">Judul Penelitian</td>
                    <td>Ketua/Anggota</td>
                    <td>Sumber Dana</td>
                    <td>Jumlah Dana</td>
                </tr>
                <tr>
                    <td>Example</td>
                    <td><center>{{ $penelitian->tahun_kegiatan }}</center></td>
                    <td><center>{{ $penelitian->judul_penelitian }}</center></td>
                    <td><center>{{ $penelitian->status_peneliti }}</center></td>
                    <td><center>{{ $penelitian->sumber_dana }}</center></td>
                    <td><center>{{ $penelitian->jumlah_dana }}</center></td>
                </tr>
            </tbody>
        </table>
        <h3 class="text-4xl text-gray-700 mb-2 font-weight-bold py-3">Pengabdian</h3>
        <table class="table table-striped">
            <tbody>
                <tr class="text-center">
                    <td>No</td>
                    <td width="45%">Judul</td>
                    <td>Bidang Keilmuan</td>
                    <td>Tahun Pelaksana</td>
                    <td>Lama Kegiatan</td>
                </tr>
                <tr>
                    <td>Example</td>
                    <td><center>{{ $pengabdian->judul_pengabdian }}</center></td>
                    <td><center>{{ $pengabdian->bidang_keilmuan }}</center></td>
                    <td><center>{{ $pengabdian->tahun_pelaksanaan }}</center></td>
                    <td><center>{{ $pengabdian->lama_kegiatan }}</center></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
