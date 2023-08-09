@extends('layouts.akademik-dashboard')

@section('title')
    
@endsection

@section('content')
<div class="card shadow bg-white flex-row card-rounded">
    <div class="card-body my-auto">
        <div class="title">
            <i class="fas fa-window-maximize fa-lg pe-2"></i>
            <span class="fw-bold fs-5">EDIT PENGABDIAN</span>
            <hr>
        </div>
        <main>
            <section class="intro">
                <form method="POST" action="{{ route("dosen.pengabdian.update", [$user->id, $pengabdian->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3 ">
                        <label for="judul_pengabdian" class="col-form-label">{{ __('Judul Pengabdian') }} <span class="text-danger"> *</span></label>
                        <input id="judul_pengabdian" type="text" class="form-control @error('judul_pengabdian') is-invalid @enderror" name="judul_pengabdian" value="{{ $pengabdian->judul_pengabdian }}">
    
                        @error('judul_pengabdian')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
        
                    </div>
        
                    <div class="mb-3 ">
                        <label for="bidang_keilmuan" class="col-form-label">{{ __('Bidang Keilmuan') }} <span class="text-danger"> *</span></label>
                        <input id="bidang_keilmuan" type="text" class="form-control @error('bidang_keilmuan') is-invalid @enderror" name="bidang_keilmuan" required value="{{ $pengabdian->bidang_keilmuan }}">
    
                        @error('bidang_keilmuan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
        
                    </div>
        
                    <div class="mb-3 ">
                        <label for="latar_belakang" class="col-form-label">{{ __('Latar Belakang') }} <span class="text-danger"> *</span></label>
                        <textarea id="latar_belakang" type="text" class="form-control @error('latar_belakang') is-invalid @enderror" name="latar_belakang" required style="height: 100px;">{{ $pengabdian->latar_belakang }}</textarea>
    
                        @error('latar_belakang')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
        
                    </div>

                    <div class="mb-3 ">
                        <label for="manfaat" class="col-form-label">{{ __('Manfaat') }} <span class="text-danger"> *</span></label>
                        <textarea id="manfaat" type="text" class="form-control @error('manfaat') is-invalid @enderror" name="manfaat" required style="height: 100px;">{{ $pengabdian->manfaat }}</textarea>
    
                        @error('manfaat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
        
                    </div>

                    <div class="mb-3 ">
                        <label for="sasaran" class="col-form-label">{{ __('Sasaran') }} <span class="text-danger"> *</span> <span class="text-danger"> *</span></label>
                        <input id="sasaran" type="text" class="form-control @error('sasaran') is-invalid @enderror" name="sasaran" required value="{{ $pengabdian->sasaran }}">
    
                        @error('sasaran')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
        
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tahun_pelaksanaan" class="col-form-label">{{ __('Tahun Pelaksanaan') }} <span class="text-danger"> *</span></label>
                                <input id="tahun_pelaksanaan" type="date" class="form-control @error('tahun_pelaksanaan') is-invalid @enderror datepicker" name="tahun_pelaksanaan" required value="{{ $pengabdian->tahun_pelaksanaan }}">
                        
                                @error('tahun_pelaksanaan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="lama_kegiatan" class="col-form-label">{{ __('Lama Kegiatan') }} <span class="text-danger"> *</span></label>
                                <input id="lama_kegiatan" type="text" class="form-control @error('lama_kegiatan') is-invalid @enderror" name="lama_kegiatan" required value="{{ $pengabdian->lama_kegiatan }}">
                
                                @error('lama_kegiatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="lokasi_pelaksanaan" class="col-form-label">{{ __('Lokasi Pelaksanaan') }} <span class="text-danger"> *</span> <span class="text-danger"> *</span></label>
                        <input id="lokasi_pelaksanaan" type="text" class="form-control @error('lokasi_pelaksanaan') is-invalid @enderror" name="lokasi_pelaksanaan" required value="{{ $pengabdian->lokasi_pelaksanaan }}">
    
                        @error('lokasi_pelaksanaan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
        
                    </div>

                    <div class="mb-3">
                        <label for="biaya_kegiatan" class="col-form-label">{{ __('Biaya Kegiatan') }}</label>
                        
                        <input id="biaya_kegiatan" type="text" class="form-control @error('biaya_kegiatan') is-invalid @enderror" name="biaya_kegiatan" required value="{{ $pengabdian->biaya_kegiatan }}">
    
                        @error('biaya_kegiatan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                    </div>

                    <div class="mb-3">
                        <label for="kelompok_target" class="col-form-label">{{ __('Kelompok/Target') }} <span class="text-danger"> *</span></label>
                        <input id="kelompok_target" type="text" class="form-control @error('kelompok_target') is-invalid @enderror" name="kelompok_target" required value="{{ $pengabdian->target }}">
    
                        @error('kelompok_target')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
        
                    </div>

                    <div class="mb-3 ">
                        <label for="kendala" class="col-form-label">{{ __('Kendala') }}</label>
                        <textarea id="kendala" type="text" class="form-control @error('kendala') is-invalid @enderror" name="kendala" required style="height: 100px;">{{ $pengabdian->kendala }}</textarea>
    
                        @error('kendala')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
        
                    </div>

                    <div class="mb-3 ">
                        <label for="hasil" class="col-form-label">{{ __('Hasil') }}</label>
                        <textarea id="hasil" type="text" class="form-control @error('hasil') is-invalid @enderror" name="hasil" required style="height: 100px;">{{ $pengabdian->hasil }}</textarea>
    
                        @error('hasil')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
        
                    </div>

                    <div class="mb-3 ">
                        <label for="evaluasi" class="col-form-label">{{ __('Evaluasi') }}</label>
                        <textarea id="evaluasi" type="text" class="form-control @error('evaluasi') is-invalid @enderror" name="evaluasi" required style="height: 100px;">{{ $pengabdian->evaluasi }}</textarea>
    
                        @error('evaluasi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
        
                    </div>

                    <div class="mb-3">
                        <label for="link_publikasi" class="col-form-label">{{ __('Link Publikasi') }}</label>
                        <input id="link_publikasi" type="text" class="form-control @error('link_publikasi') is-invalid @enderror" name="link_publikasi" required value="{{ $pengabdian->link_publikasi }}">
    
                        @error('link_publikasi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
        
                    </div>
        
                    <div class="mb-3">
                        <label for="surat_tugas" class="col-form-label">{{ __('Surat Tugas') }}</label>
                        <input type="file" class="form-control @error('surat_tugas') is-invalid @enderror" name="surat_tugas">
                        @if ($pengabdian->surat_tugas != null)
                            <span class="fst-italic"><a href="{{ Storage::url('dosen/pengabdian/surat_tugas/' . $pengabdian->surat_tugas) }}" target="_blank" rel="noopener noreferrer" class="text-danger text-decoration-none"> View File</a></span>
                        @else
                            <span class="fst-italic text-danger"> pdf:max 2 mb</a></span>
                        @endif
                        @error('surat_tugas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                    </div>

                    <div class="mb-3">
                        <label for="laporan_kegiatan" class="col-form-label">{{ __('Laporan Kegiatan') }}</label>
                        <input type="file" class="form-control @error('laporan_kegiatan') is-invalid @enderror" name="laporan_kegiatan">
                        @if ($pengabdian->laporan_kegiatan != null)
                            <span class="fst-italic"><a href="{{ Storage::url('dosen/pengabdian/laporan_kegiatan/' . $pengabdian->laporan_kegiatan) }}" target="_blank" rel="noopener noreferrer" class="text-danger text-decoration-none"> View File</a></span>
                        @else
                            <span class="fst-italic text-danger"> pdf:max 2 mb</a></span>
                        @endif
                        @error('laporan_kegiatan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                    </div>
                    <div class="row mb-3">
                        <div class="col-mb-6 d-flex justify-content-end align-items-end">
                            <button type="submit" class="btn btn-success btn-sm mx-3">Update Data</button>
                            <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm">Batal</a>
                        </div>
                    </div>
                </form>
            </section>
        </main>
    </div>
</div>
@endsection