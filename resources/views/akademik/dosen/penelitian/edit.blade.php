@extends('layouts.akademik-dashboard')

@section('title')
    
@endsection

@section('content')
<div class="card shadow bg-white flex-row card-rounded">
    <div class="card-body my-auto">
        <div class="title">
            <i class="fas fa-graduation-cap fa-lg pe-2"></i>
            <span class="fw-bold fs-5">EDIT PENELITIAN</span>
            <hr>
        </div>
        <main>
            <section class="intro">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status_peneliti" class="col-md-4 col-form-label ms-5">{{ __('Status Peneliti') }} <span class="text-danger"> *</span></label>
                
                                <div class="ms-5">
                                    <select name="status_peneliti" id="status_peneliti" class="form-control form-select" data-bs-toggle="dropdown">
                                        <option value="Ketua" {{ $penelitian->status_peneliti == 'Ketua' ? 'selected' : '' }}>Ketua</option>
                                        <option value="Anggota" {{ $penelitian->status_peneliti == 'Anggota' ? 'selected' : '' }}>Anggota</option>
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
                                <label for="kelompok_bidang" class="col-md-4 col-form-label me-5">{{ __('Kelompok Bidang') }} <span class="text-danger"> *</span></label>
                
                                <div class="me-5">
                                    <input id="kelompok_bidang" type="text" class="form-control @error('kelompok_bidang') is-invalid @enderror" name="kelompok_bidang" required value="{{ $penelitian->kelompok_bidang }}">
                
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
                        <label for="judul_penelitian" class="col-md-4 col-form-label mx-5">{{ __('Judul Penelitian') }} <span class="text-danger"> *</span></label>
        
                        <div class="mx-5">
                            <textarea id="judul_penelitian" type="text" class="form-control @error('judul_penelitian') is-invalid @enderror" name="judul_penelitian" required style="height: 100px;">{{ $penelitian->judul_penelitian }}</textarea>
        
                            @error('judul_penelitian')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="mb-3 ">
                        <label for="lokasi_kegiatan" class="col-md-4 col-form-label mx-5">{{ __('lokasi Kegiatan') }} <span class="text-danger"> *</span></label>
        
                        <div class="mx-5">
                            <input id="lokasi_kegiatan" type="text" class="form-control @error('lokasi_kegiatan') is-invalid @enderror" name="lokasi_kegiatan" required value="{{ $penelitian->lokasi_kegiatan }}">
        
                            @error('lokasi_kegiatan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 ">
                                <label for="tahun_usulan" class="col-md-4 col-form-label ms-5">{{ __('Tahun Usulan') }} <span class="text-danger"> *</span></label>
                
                                <div class="ms-5">
                                    <input id="tahun_usulan" type="text" class="form-control @error('tahun_usulan') is-invalid @enderror" name="tahun_usulan" required value="{{ $penelitian->tahun_usulan }}">
                
                                    @error('tahun_usulan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 ">
                                <label for="tahun_kegiatan" class="col-md-4 col-form-label">{{ __('Tahun Kegiatan') }} <span class="text-danger"> *</span></label>
                
                                <div class="">
                                    <input id="tahun_kegiatan" type="text" class="form-control @error('tahun_kegiatan') is-invalid @enderror" name="tahun_kegiatan" required value="{{ $penelitian->tahun_kegiatan }}">
                
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
                                <label for="lama_kegiatan" class="col-md-4 col-form-label me-5">{{ __('lama Kegiatan') }} <span class="text-danger"> *</span></label>
                
                                <div class="me-5">
                                    <input id="lama_kegiatan" type="text" class="form-control @error('lama_kegiatan') is-invalid @enderror" name="lama_kegiatan" required value="{{ $penelitian->lama_kegiatan }}">
                
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
                        <label for="jumlah_dana" class="col-md-4 col-form-label mx-5">{{ __('Jumlah Dana') }} <span class="text-danger"> *</span></label>
        
                        <div class="mx-5">
                            <input id="jumlah_dana" type="text" class="form-control @error('jumlah_dana') is-invalid @enderror" name="jumlah_dana" required value="{{ $penelitian->jumlah_dana }}">
        
                            @error('jumlah_dana')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="sumber_dana" class="col-md-4 col-form-label mx-5">{{ __('Sumber Dana') }} <span class="text-danger"> *</span></label>
        
                        <div class="mx-5">
                            <input id="sumber_dana" type="text" class="form-control @error('sumber_dana') is-invalid @enderror" name="sumber_dana" required value="{{ $penelitian->sumber_dana }}">
        
                            @error('sumber_dana')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="no_sk_penugasan" class="col-md-4 col-form-label mx-5">{{ __('Nomor SK Penugasan') }} <span class="text-danger"> *</span></label>
        
                        <div class="mx-5">
                            <input id="no_sk_penugasan" type="text" class="form-control @error('no_sk_penugasan') is-invalid @enderror" name="no_sk_penugasan" required value="{{ $penelitian->nomor_sk_penugasan }}">
        
                            @error('no_sk_penugasan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_sk_penugasan" class="col-md-4 col-form-label mx-5">{{ __('Tanggal SK Penugasan') }} <span class="text-danger"> *</span></label>
        
                        <div class="mx-5">
                            <input id="tanggal_sk_penugasan" type="date" class="form-control @error('tanggal_sk_penugasan') is-invalid @enderror datepicker" name="tanggal_sk_penugasan" required value="{{ $penelitian->tanggal_sk_penugasan }}">
        
                            @error('tanggal_sk_penugasan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="link_publikasi" class="col-md-4 col-form-label mx-5">{{ __('Link Publikasi') }} <span class="text-danger"> *</span></label>
        
                        <div class="mx-5">
                            <input id="link_publikasi" type="text" class="form-control @error('link_publikasi') is-invalid @enderror" name="link_publikasi" required value="{{ $penelitian->link_publikasi }}">
        
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
                            <span class="text-danger fst-italic">pdf: max 2 mb</span>
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
                            <span class="text-danger fst-italic">pdf: max 2 mb</span>
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
                            <button type="submit" class="btn btn-sm btn-success px-5 mx-3">Update</button>
                            {{-- <button type="submit" class="btn btn-sm btn-danger px-5">Batal</button> --}}
                            <button type="submit" class="btn btn-sm btn-danger px-5" onclick="history.back(-1)">Batal</button>
                        </div>
                    </div>
                </form>
            </section>
        </main>
    </div>
</div>
@endsection