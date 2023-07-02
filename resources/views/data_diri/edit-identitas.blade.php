@extends('layouts.dashboard')

@section('title')
    
@endsection

@section('content')
<div class="card shadow bg-white flex-row card-rounded">
    <div class="card-body my-auto">
        <div class="title">
            <i class="fas fa-graduation-cap fa-lg pe-2"></i>
            <span class="fw-bold fs-5">IDENTITAS DIRI</span>
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
                                <label for="nidn" class="col-md-4 col-form-label mx-5">{{ __('Nidn') }}</label>
                
                                <div class="ms-5">
                                    <input id="nidn" type="text" class="form-control @error('nidn') is-invalid @enderror" name="nidn" value="{{ $user->nidn }}">
                
                                    @error('nidn')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3 ">
                                <label for="nip" class="col-md-4 col-form-label me-5">{{ __('Nip') }}</label>
                
                                <div class="me-5">
                                    <input id="nip" type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" required value="{{ $identitas->nip }}">
                
                                    @error('nip')
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
                                <label for="nik" class="col-md-4 col-form-label mx-5">{{ __('Nik') }}</label>
                
                                <div class="ms-5">
                                    <input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ $identitas->nik }}">
                
                                    @error('nik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3 ">
                                <label for="nama" class="col-md-4 col-form-label me-5">{{ __('Nama') }}</label>
                
                                <div class="me-5">
                                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" required  value="{{ $identitas->nama }}">
                
                                    @error('nama')
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
                                <label for="jenis_kelamin" class="col-form-label ms-5">{{ __('Jenis Kelamin') }}</label>
                
                                <div class="ms-5">
                                    <div>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control form-select" data-bs-toggle="dropdown">
                                            <option value="Pria">Pria</option>
                                            <option value="Wanita">Wanita</option>
                                        </select>
                                    </div>
                
                                    @error('jenis_kelamin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6"> 
                            <div class="mb-3">
                                <label for="golongan_darah" class="col-form-label me-5">{{ __('Golongan Darah') }}</label>
                
                                <div class="me-5">
                                    <div>
                                        <select name="golongan_darah" id="golongan_darah" class="form-control form-select" data-bs-toggle="dropdown">
                                            <option value="O">O</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="AB">AB</option>
                                        </select>
                                    </div>
                
                                    @error('golongan_darah')
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
                                <label for="kewarganegaraan" class="col-md-4 col-form-label mx-5">{{ __('Kewarganegaraan') }}</label>
                
                                <div class="ms-5">
                                    <input id="kewarganegaraan" type="text" class="form-control @error('kewarganegaraan') is-invalid @enderror" name="kewarganegaraan"  value="{{ $identitas->kewarganegaraan }}">
                
                                    @error('kewarganegaraan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
                        </div>

                        <div class="col-md-6"> 
                            <div class="mb-3">
                                <label for="agama" class="col-form-label me-5">{{ __('Agama') }}</label>
                
                                <div class="me-5">
                                    <div>
                                        <select name="agama" id="agama" class="form-control form-select" data-bs-toggle="dropdown">
                                            <option value="Islam">Islam</option>
                                            <option value="Protestan">Protestan</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Buddha">Buddha</option>
                                            <option value="Khonghucu">Khonghucu</option>
                                        </select>
                                    </div>
                
                                    @error('agama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="tempat_lahir" class="col-md-4 col-form-label mx-5">{{ __('Tempat Lahir') }}</label>
                
                                <div class="ms-5">
                                    <input id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir"  value="{{ $identitas->tempat_lahir }}">
                
                                    @error('tempat_lahir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="col-form-label">{{ __('Tanggal Lahir') }}</label>
                        
                                <div class="">
                                    <input id="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror datepicker" name="tanggal_lahir" required  value="{{ $identitas->tanggal_lahir }}">
                                </div>
                        
                                @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="agama" class="col-form-label me-5">{{ __('Agama') }}</label>
                
                                <div class="me-5">
                                    <div>
                                        <select name="agama" id="agama" class="form-control form-select" data-bs-toggle="dropdown">
                                            <option value="Islam">Islam</option>
                                            <option value="Protestan">Protestan</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Buddha">Buddha</option>
                                            <option value="Khonghucu">Khonghucu</option>
                                        </select>
                                    </div>
                
                                    @error('agama')
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