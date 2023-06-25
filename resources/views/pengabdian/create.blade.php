@extends('layouts.dashboard')

@section('title')
    
@endsection

@section('content')
<div class="card shadow bg-white flex-row card-rounded">
    <div class="card-body my-auto">
        <div class="title">
            <i class="fas fa-graduation-cap fa-lg pe-2"></i>
            <span class="fw-bold fs-5">TAMBAH PENGABDIAN</span>
            <hr>
        </div>
        <main>
            <section class="intro">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3 ">
                        <label for="judul_pengabdian" class="col-md-4 col-form-label mx-5">{{ __('Judul Pengabdian') }}</label>
        
                        <div class="mx-5">
                            <input id="judul_pengabdian" type="text" class="form-control @error('judul_pengabdian') is-invalid @enderror" name="judul_pengabdian">
        
                            @error('judul_pengabdian')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="mb-3 ">
                        <label for="bidang_keilmuan" class="col-md-4 col-form-label mx-5">{{ __('Bidang Keilmuan') }}</label>
        
                        <div class="mx-5">
                            <input id="bidang_keilmuan" type="text" class="form-control @error('bidang_keilmuan') is-invalid @enderror" name="bidang_keilmuan" required>
        
                            @error('bidang_keilmuan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="mb-3 ">
                        <label for="latar_belakang" class="col-md-4 col-form-label mx-5">{{ __('Latar Belakang') }}</label>
        
                        <div class="mx-5">
                            <textarea id="latar_belakang" type="text" class="form-control @error('latar_belakang') is-invalid @enderror" name="latar_belakang" required style="height: 100px;"></textarea>
        
                            @error('latar_belakang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 ">
                        <label for="manfaat" class="col-md-4 col-form-label mx-5">{{ __('Manfaat') }}</label>
        
                        <div class="mx-5">
                            <textarea id="manfaat" type="text" class="form-control @error('manfaat') is-invalid @enderror" name="manfaat" required style="height: 100px;"></textarea>
        
                            @error('manfaat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 ">
                        <label for="sasaran" class="col-md-4 col-form-label mx-5">{{ __('Sasaran') }}</label>
        
                        <div class="mx-5">
                            <input id="sasaran" type="text" class="form-control @error('sasaran') is-invalid @enderror" name="sasaran" required>
        
                            @error('sasaran')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_pelaksanaan" class="col-md-4 col-form-label ms-5">{{ __('Tanggal Pelaksanaan') }}</label>
                        
                                <div class="ms-5">
                                    <input id="tanggal_pelaksanaan" type="date" class="form-control @error('tanggal_pelaksanaan') is-invalid @enderror datepicker" name="tanggal_pelaksanaan" required>
                                </div>
                        
                                @error('tanggal_pelaksanaan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="lama_kegiatan" class="col-md-4 col-form-label me-5">{{ __('Lama Kegiatan') }}</label>
                
                                <div class="me-5">
                                    <input id="lama_kegiatan" type="text" class="form-control @error('lama_kegiatan') is-invalid @enderror" name="lama_kegiatan" required>
                
                                    @error('lama_kegiatan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="lokasi_pelaksanaan" class="col-md-4 col-form-label mx-5">{{ __('Lokasi Pelaksanaan') }}</label>
        
                        <div class="mx-5">
                            <input id="lokasi_pelaksanaan" type="text" class="form-control @error('lokasi_pelaksanaan') is-invalid @enderror" name="lokasi_pelaksanaan" required>
        
                            @error('lokasi_pelaksanaan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="biaya_kegiatan" class="col-md-4 col-form-label mx-5">{{ __('Biaya Kegiatan') }}</label>
        
                        <div class="mx-5">
                            <input id="biaya_kegiatan" type="text" class="form-control @error('biaya_kegiatan') is-invalid @enderror" name="biaya_kegiatan" required>
        
                            @error('biaya_kegiatan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="kelompok_target" class="col-md-4 col-form-label mx-5">{{ __('Kelompok/Target') }}</label>
        
                        <div class="mx-5">
                            <input id="kelompok_target" type="text" class="form-control @error('kelompok_target') is-invalid @enderror" name="kelompok_target" required>
        
                            @error('kelompok_target')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 ">
                        <label for="kendala" class="col-md-4 col-form-label mx-5">{{ __('Kendala') }}</label>
        
                        <div class="mx-5">
                            <textarea id="kendala" type="text" class="form-control @error('kendala') is-invalid @enderror" name="kendala" required style="height: 100px;"></textarea>
        
                            @error('kendala')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 ">
                        <label for="hasil" class="col-md-4 col-form-label mx-5">{{ __('Hasil') }}</label>
        
                        <div class="mx-5">
                            <textarea id="hasil" type="text" class="form-control @error('hasil') is-invalid @enderror" name="hasil" required style="height: 100px;"></textarea>
        
                            @error('hasil')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 ">
                        <label for="evaluasi" class="col-md-4 col-form-label mx-5">{{ __('Evaluasi') }}</label>
        
                        <div class="mx-5">
                            <textarea id="evaluasi" type="text" class="form-control @error('evaluasi') is-invalid @enderror" name="evaluasi" required style="height: 100px;"></textarea>
        
                            @error('evaluasi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="link_publikasi" class="col-md-4 col-form-label mx-5">{{ __('Link Publikasi') }}</label>
        
                        <div class="mx-5">
                            <input id="link_publikasi" type="text" class="form-control @error('link_publikasi') is-invalid @enderror" name="link_publikasi" required>
        
                            @error('link_publikasi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="mb-3">
                        <label for="surat_tugas" class="col-md-4 col-form-label mx-5">{{ __('Surat Tugas') }}</label>
                        
                        <div class="mx-5">
                            <input type="file" class="form-control @error('surat_tugas') is-invalid @enderror" name="surat_tugas">
                            @error('surat_tugas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="laporan_kegiatan" class="col-md-4 col-form-label mx-5">{{ __('Laporan Kegiatan') }}</label>
                        
                        <div class="mx-5">
                            <input type="file" class="form-control @error('laporan_kegiatan') is-invalid @enderror" name="laporan_kegiatan">
                            @error('laporan_kegiatan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="mx-5 d-flex justify-content-end align-items-end">
                            {{-- <a href="" class="btn btn-sm btn-dark mb-3">Update Data</a> --}}
                            <button type="submit" class="btn btn-sm btn-success px-5 mx-3">Simpan</button>
                            <button type="submit" class="btn btn-sm btn-danger px-5">Batal</button>
                        </div>
                    </div>
                </form>
            </section>
        </main>
    </div>
</div>
@endsection