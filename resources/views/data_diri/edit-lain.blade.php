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
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6"> 
                            <div class="mb-3">
                                
                                <label for="program_studi" class="col-md-4 col-form-label mx-5">{{ __('Program Studi') }}</label>
                                <div class="ms-5">
                                    <input id="program_studi" type="text" class="form-control @error('program_studi') is-invalid @enderror" name="program_studi" value="{{ $kepegawaian->program_studi }}">
                
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
                                <label for="status_kepegawaian" class="col-md-4 col-form-label me-5">{{ __('Status Kepegawaian') }}</label>
                
                                <div class="me-5">
                                    <input id="status_kepegawaian" type="text" class="form-control @error('status_kepegawaian') is-invalid @enderror" name="status_kepegawaian" required  value="{{ $kepegawaian->status_kepegawaian }}">
                
                                    @error('status_kepegawaian')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6"> 
                            <div class="mb-3">
                                <label for="status_keaktifan" class="col-form-label ms-5">{{ __('Status Keaktifan') }}</label>
                
                                <div class="ms-5">
                                    <div>
                                        <select name="status_keaktifan" id="status_keaktifan" class="form-control form-select" data-bs-toggle="dropdown">
                                            <option value="Aktif">Aktif</option>
                                            <option value="Tidak Aktif">Tidak Aktif</option>
                                        </select>
                                    </div>
                
                                    @error('status_keaktifan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3 ">
                                <label for="no_sk_sertifikasi_dosen" class="col-form-label me-5">{{ __('No SK Sertifikasi Dosen') }}</label>
                
                                <div class="me-5">
                                    <input id="no_sk_sertifikasi_dosen" type="text" class="form-control @error('no_sk_sertifikasi_dosen') is-invalid @enderror" name="no_sk_sertifikasi_dosen" required  value="{{ $kepegawaian->no_sk_sertifikasi_dosen }}">
                
                                    @error('no_sk_sertifikasi_dosen')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 ">
                                <label for="jabatan_fungsional" class="col-form-label ms-5">{{ __('Jabatan Fungsional') }}</label>
                
                                <div class="ms-5">
                                    <input id="jabatan_fungsional" type="text" class="form-control @error('jabatan_fungsional') is-invalid @enderror" name="jabatan_fungsional" required  value="{{ $kepegawaian->jabatan_fungsional }}">
                
                                    @error('jabatan_fungsional')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3 ">
                                <label for="no_sk_tmmd" class="col-md-4 col-form-label me-5">{{ __('Nomor SK TMMD') }}</label>
                
                                <div class="me-5">
                                    <input id="no_sk_tmmd" type="text" class="form-control @error('no_sk_tmmd') is-invalid @enderror" name="no_sk_tmmd" required  value="{{ $kepegawaian->no_sk_tmmd }}">
                
                                    @error('no_sk_tmmd')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_menjadi_dosen" class="col-form-label ms-5">{{ __('Tanggal Mulai Menjadi Dosen') }}</label>
                        
                                <div class="ms-5">
                                    <input id="tanggal_menjadi_dosen" type="date" class="form-control @error('tanggal_menjadi_dosen') is-invalid @enderror datepicker" name="tanggal_menjadi_dosen" required  value="{{ $kepegawaian->tanggal_menjadi_dosen }}">
                                </div>
                        
                                @error('tanggal_menjadi_dosen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3 ">
                                <label for="pangkat_golongan" class="col-md-4 col-form-label me-5">{{ __('Pangkat/Golongan') }}</label>
                
                                <div class="me-5">
                                    <input id="pangkat_golongan" type="text" class="form-control @error('pangkat_golongan') is-invalid @enderror" name="pangkat_golongan" required  value="{{ $kepegawaian->pangkat_golongan }}">
                
                                    @error('pangkat_golongan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
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