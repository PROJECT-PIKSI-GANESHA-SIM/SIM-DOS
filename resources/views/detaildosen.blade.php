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
                    <img src="assets/thumbnails-profile.png" alt="logo PIKSI SIM-DOS" class="mb-4" width="380">
                </center>
            </div>
            <div class="col">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td class="text-end" width="35%">NIDN/NUPN</td>
                            <td>Example</td>
                        </tr>
                        <tr>
                            <td class="text-end" width="35%">NIP</td>
                            <td>Example</td>
                        </tr>
                        <tr>
                            <td class="text-end" width="35%">NIK</td>
                            <td>Example</td>
                        </tr>
                        <tr>
                            <td class="text-end" width="35%">Nama Lengkap</td>
                            <td>Example</td>
                        </tr>
                        <tr>
                            <td class="text-end" width="35%">Tempat Lahir</td>
                            <td>Example</td>
                        </tr>
                        <tr>
                            <td class="text-end" width="35%">Tanggal lahir</td>
                            <td>Example</td>
                        </tr>
                        <tr>
                            <td class="text-end" width="35%">Jenis Kelamin</td>
                            <td>Example</td>
                        </tr>
                        <tr>
                            <td class="text-end" width="35%">Agama</td>
                            <td>Example</td>
                        </tr>
                        <tr>
                            <td class="text-end" width="35%">Golongan Darah</td>
                            <td>Example</td>
                        </tr>
                        <tr>
                            <td class="text-end" width="35%">Status Perkawinan</td>
                            <td>Example</td>
                        </tr>
                        <tr>
                            <td class="text-end" width="35%">Kewarganegaraan</td>
                            <td>Example</td>
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
                    <td>Example</td>
                    <td>Example</td>
                    <td>Example</td>
                    <td>Example</td>
                    <td>Example</td>
                </tr>
                <tr>
                    <td>Example</td>
                    <td>Example</td>
                    <td>Example</td>
                    <td>Example</td>
                    <td>Example</td>
                    <td>Example</td>
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
                    <td>Example</td>
                    <td>Example</td>
                    <td>Example</td>
                    <td>Example</td>
                    <td>Example</td>
                    <td>Example</td>
                </tr>
                <tr>
                    <td>Example</td>
                    <td>Example</td>
                    <td>Example</td>
                    <td>Example</td>
                    <td>Example</td>
                    <td>Example</td>
                    <td>Example</td>
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
                    <td>Ketua/Anggota Tim</td>
                    <td>Sumber Dana</td>
                    <td>Jumlah Dana</td>
                </tr>
                <tr>
                    <td>Example</td>
                    <td>Example</td>
                    <td>Example</td>
                    <td>Example</td>
                    <td>Example</td>
                    <td>Example</td>
                </tr>
                <tr>
                    <td>Example</td>
                    <td>Example</td>
                    <td>Example</td>
                    <td>Example</td>
                    <td>Example</td>
                    <td>Example</td>
                </tr>
            </tbody>
        </table>
        <h3 class="text-4xl text-gray-700 mb-2 font-weight-bold py-3">Pengabdian</h3>
        <table class="table table-striped">
            <tbody>
                <tr class="text-center">
                    <td>No</td>
                    <td>Tahun</td>
                    <td width="45%">Judul</td>
                    <td>Bidang Keilmuan</td>
                    <td>Tahun Pelaksana</td>
                    <td>Lama Kegiatan</td>
                </tr>
                <tr>
                    <td>Example</td>
                    <td>Example</td>
                    <td>Example</td>
                    <td>Example</td>
                    <td>Example</td>
                    <td>Example</td>
                </tr>
                <tr>
                    <td>Example</td>
                    <td>Example</td>
                    <td>Example</td>
                    <td>Example</td>
                    <td>Example</td>
                    <td>Example</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
