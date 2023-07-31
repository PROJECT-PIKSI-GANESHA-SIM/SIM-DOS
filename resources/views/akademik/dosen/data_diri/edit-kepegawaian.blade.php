@extends('layouts.dashboard')

@section('title')
    
@endsection

@section('content')
<div class="card shadow bg-white flex-row card-rounded">
    <div class="card-body my-auto">
        <div class="title">
            <i class="fas fa-graduation-cap fa-lg pe-2"></i>
            <span class="fw-bold fs-5">KEPEGAWAIAN</span>
            <hr>
        </div>
        <main>
            <section class="intro">
                <form method="POST"  action="{{ route('dosen.kepegawaian.update', [$user->id, $kepegawaian->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6"> 
                            <div class="mb-3">
                                
                                <label for="program_studi" class="col-form-label">{{ __('Program Studi') }}</label>
                                <input id="program_studi" type="text" class="form-control @error('program_studi') is-invalid @enderror" name="program_studi" value="{{ $kepegawaian->program_studi }}">
            
                                @error('program_studi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div> 
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3 ">
                                <label for="status_kepegawaian" class="col-form-label">{{ __('Status Kepegawaian') }}</label>
                                <input id="status_kepegawaian" type="text" class="form-control @error('status_kepegawaian') is-invalid @enderror" name="status_kepegawaian" required  value="{{ $kepegawaian->status_kepegawaian }}">
            
                                @error('status_kepegawaian')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6"> 
                            <div class="mb-3">
                                <label for="status_keaktifan" class="col-form-label">{{ __('Status Keaktifan') }}</label>
                                <select name="status_keaktifan" id="status_keaktifan" class="form-control form-select" data-bs-toggle="dropdown">
                                    <option value="Aktif" {{ $kepegawaian->status_keaktifan == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="Tidak Aktif" {{ $kepegawaian->status_keaktifan == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                                @error('status_keaktifan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3 ">
                                <label for="no_sk_sertifikasi_dosen" class="col-form-label">{{ __('No SK Sertifikasi Dosen') }}</label>
                                <input id="no_sk_sertifikasi_dosen" type="text" class="form-control @error('no_sk_sertifikasi_dosen') is-invalid @enderror" name="no_sk_sertifikasi_dosen" required  value="{{ $kepegawaian->no_sk_sertifikasi_dosen }}">
            
                                @error('no_sk_sertifikasi_dosen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 ">
                                <label for="jabatan_fungsional" class="col-form-label">{{ __('Jabatan Fungsional') }}</label>
                                <input id="jabatan_fungsional" type="text" class="form-control @error('jabatan_fungsional') is-invalid @enderror" name="jabatan_fungsional" required  value="{{ $kepegawaian->jabatan_fungsional }}">
            
                                @error('jabatan_fungsional')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3 ">
                                <label for="no_sk_tmmd" class="col-form-label">{{ __('Nomor SK TMMD') }}</label>
                                <input id="no_sk_tmmd" type="text" class="form-control @error('no_sk_tmmd') is-invalid @enderror" name="no_sk_tmmd" required  value="{{ $kepegawaian->no_sk_tmmd }}">
            
                                @error('no_sk_tmmd')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_menjadi_dosen" class="col-form-label">{{ __('Tanggal Mulai Menjadi Dosen') }}</label>
                                <input id="tanggal_menjadi_dosen" type="date" class="form-control @error('tanggal_menjadi_dosen') is-invalid @enderror datepicker" name="tanggal_menjadi_dosen" required  value="{{ $kepegawaian->tanggal_menjadi_dosen }}">
                                @error('tanggal_menjadi_dosen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3 ">
                                <label for="pangkat_golongan" class="col-form-label">{{ __('Pangkat/Golongan') }}</label>
                                <input id="pangkat_golongan" type="text" class="form-control @error('pangkat_golongan') is-invalid @enderror" name="pangkat_golongan" required  value="{{ $kepegawaian->pangkat_golongan }}">
            
                                @error('pangkat_golongan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                
                            </div> 
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-mb-6 d-flex justify-content-end align-items-end">
                            <button type="submit" class="btn btn-success btn-sm mx-3">Simpan</button>
                            <button type="submit" class="btn btn-danger btn-sm">Batal</button>
                        </div>
                    </div>
                </form>
            </section>
        </main>
    </div>
</div>
@endsection