@extends('layouts.dashboard')

@section('title')
    
@endsection

@section('content')
<div class="card shadow bg-white flex-row card-rounded">
    <div class="card-body my-auto">
        <div class="title">
            <i class="fas fa-graduation-cap fa-lg pe-2"></i>
            <span class="fw-bold fs-5">TAMBAH PENELITIAN</span>
            <hr>
        </div>
        <main>
            <section class="intro">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status_peneliti" class="col-md-4 col-form-label ms-5">{{ __('Status Peneliti') }}</label>
                
                                <div class="ms-5">
                                    <select name="status_peneliti" id="status_peneliti" class="form-control form-select" data-bs-toggle="dropdown">
                                        <option value="Ketua">Ketua</option>
                                        <option value="Anggota">Anggota</option>
                                    </select>
                
                                    @error('program_studi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 ">
                                <label for="kelompok_bidang" class="col-md-4 col-form-label me-5">{{ __('Kelompok Bidang') }}</label>
                
                                <div class="me-5">
                                    <input id="kelompok_bidang" type="text" class="form-control @error('kelompok_bidang') is-invalid @enderror" name="kelompok_bidang" required>
                
                                    @error('kelompok_bidang')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="mb-3 ">
                        <label for="judul_kegiatan" class="col-md-4 col-form-label mx-5">{{ __('Judul Kegiatan') }}</label>
        
                        <div class="mx-5">
                            <textarea id="judul_kegiatan" type="text" class="form-control @error('judul_kegiatan') is-invalid @enderror" name="judul_kegiatan" required style="height: 100px;"></textarea>
        
                            @error('judul_kegiatan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="mb-3 ">
                        <label for="lokasi_kegiatan" class="col-md-4 col-form-label mx-5">{{ __('lokasi Kegiatan') }}</label>
        
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
                        <div class="col-md-4">
                            <div class="mb-3 ">
                                <label for="lokasi_kegiatan" class="col-md-4 col-form-label ms-5">{{ __('lokasi Kegiatan') }}</label>
                
                                <div class="ms-5">
                                    <input id="sasaran" type="text" class="form-control @error('sasaran') is-invalid @enderror" name="sasaran" required>
                
                                    @error('sasaran')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 ">
                                <label for="tahun_kegiatan" class="col-md-4 col-form-label">{{ __('Tahun Kegiatan') }}</label>
                
                                <div class="">
                                    <input id="tahun_kegiatan" type="text" class="form-control @error('tahun_kegiatan') is-invalid @enderror" name="tahun_kegiatan" required>
                
                                    @error('tahun_kegiatan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 ">
                                <label for="lama_kegiatan" class="col-md-4 col-form-label me-5">{{ __('lama Kegiatan') }}</label>
                
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
                        <label for="jumlah_dana" class="col-md-4 col-form-label mx-5">{{ __('Jumlah Dana') }}</label>
        
                        <div class="mx-5">
                            <input id="jumlah_dana" type="text" class="form-control @error('jumlah_dana') is-invalid @enderror" name="jumlah_dana" required>
        
                            @error('jumlah_dana')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="sumber_dana" class="col-md-4 col-form-label mx-5">{{ __('Sumber Dana') }}</label>
        
                        <div class="mx-5">
                            <input id="sumber_dana" type="text" class="form-control @error('sumber_dana') is-invalid @enderror" name="sumber_dana" required>
        
                            @error('sumber_dana')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="no_sk_penugasan" class="col-md-4 col-form-label mx-5">{{ __('Nomor SK Penugasan') }}</label>
        
                        <div class="mx-5">
                            <input id="no_sk_penugasan" type="text" class="form-control @error('no_sk_penugasan') is-invalid @enderror" name="no_sk_penugasan" required>
        
                            @error('no_sk_penugasan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_sk_penugasan" class="col-md-4 col-form-label mx-5">{{ __('Tanggal SK Penugasan') }}</label>
        
                        <div class="mx-5">
                            <input id="tanggal_sk_penugasan" type="date" class="form-control @error('tanggal_sk_penugasan') is-invalid @enderror datepicker" name="tanggal_sk_penugasan" required>
        
                            @error('tanggal_sk_penugasan')
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
                        <label for="publikasi" class="col-md-4 col-form-label mx-5">{{ __('Publikasi') }}</label>
                        
                        <div class="mx-5">
                            <input type="file" class="form-control @error('publikasi') is-invalid @enderror" name="publikasi">
                            @error('publikasi')
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