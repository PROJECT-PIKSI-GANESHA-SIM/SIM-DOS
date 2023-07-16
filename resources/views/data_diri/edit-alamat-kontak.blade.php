@extends('layouts.dashboard')

@section('title')
    
@endsection

@section('content')
<div class="card shadow bg-white flex-row card-rounded">
    <div class="card-body my-auto">
        <div class="title">
            <i class="fas fa-graduation-cap fa-lg pe-2"></i>
            <span class="fw-bold fs-5">ALAMAT DAN KONTAK</span>
            <hr>
        </div>
        <main>
            <section class="intro">
                <form method="POST" action="{{ route('alamat_kontak.update', $alamat_kontak->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6"> 
                            <div class="mb-3">
                                <label for="email" class="col-md-4 col-form-label mx-5">{{ __('Email') }}</label>
                
                                <div class="ms-5">
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" disabled>
                
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3 ">
                                <label for="alamat" class="col-md-4 col-form-label me-5">{{ __('Alamat') }}</label>
                
                                <div class="me-5">
                                    <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" required value="{{ $alamat_kontak->alamat }}">
                
                                    @error('alamat')
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
                                <label for="rt" class="col-md-4 col-form-label mx-5">{{ __('Rt') }}</label>
                
                                <div class="ms-5">
                                    <input id="rt" type="text" class="form-control @error('rt') is-invalid @enderror" name="rt" value="{{ $alamat_kontak->rt }}">
                
                                    @error('rt')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3 ">
                                <label for="rw" class="col-form-label">{{ __('Rw') }}</label>
                
                                <div class="">
                                    <input id="rw" type="text" class="form-control @error('rw') is-invalid @enderror" name="rw" required value="{{ $alamat_kontak->rw }}">
                
                                    @error('rw')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3 ">
                                <label for="no" class="col-md-4 col-form-label me-5">{{ __('No') }}</label>
                
                                <div class="me-5">
                                    <input id="no" type="text" class="form-control @error('no') is-invalid @enderror" name="no" required value="{{ $alamat_kontak->no }}">
                
                                    @error('no')
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
                                <label for="desa_kelurahan" class="col-md-4 col-form-label mx-5">{{ __('Desa/Kelurahan') }}</label>
                
                                <div class="ms-5">
                                    <input id="desa_kelurahan" type="text" class="form-control @error('desa_kelurahan') is-invalid @enderror" name="desa_kelurahan" value="{{ $alamat_kontak->desa_kelurahan }}">
                
                                    @error('desa_kelurahan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3 ">
                                <label for="kota_kabupaten" class="col-md-4 col-form-label me-5">{{ __('Kota/Kabupaten') }}</label>
                
                                <div class="me-5">
                                    <input id="kota_kabupaten" type="text" class="form-control @error('kota_kabupaten') is-invalid @enderror" name="kota_kabupaten" required value="{{ $alamat_kontak->kota_kabupaten }}">
                
                                    @error('kota_kabupaten')
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
                                <label for="provinsi" class="col-md-4 col-form-label mx-5">{{ __('Provinsi') }}</label>
                
                                <div class="ms-5">
                                    <input id="provinsi" type="text" class="form-control @error('provinsi') is-invalid @enderror" name="provinsi" value="{{ $alamat_kontak->provinsi }}">
                
                                    @error('provinsi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3 ">
                                <label for="kode_pos" class="col-md-4 col-form-label me-5">{{ __('Kode Pos') }}</label>
                
                                <div class="me-5">
                                    <input id="kode_pos" type="text" class="form-control @error('kode_pos') is-invalid @enderror" name="kode_pos" required value="{{ $alamat_kontak->kode_pos }}">
                
                                    @error('kode_pos')
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
                                <label for="no_telepon_rumah" class="col-md-4 col-form-label mx-5">{{ __('No Telepon Rumah') }}</label>
                
                                <div class="ms-5">
                                    <input id="no_telepon_rumah" type="text" class="form-control @error('no_telepon_rumah') is-invalid @enderror" name="no_telepon_rumah" value="{{ $alamat_kontak->no_telepon_rumah }}">
                
                                    @error('no_telepon_rumah')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3 ">
                                <label for="no_handphone" class="col-md-4 col-form-label me-5">{{ __('No Handphone') }}</label>
                
                                <div class="me-5">
                                    <input id="no_handphone" type="text" class="form-control @error('no_handphone') is-invalid @enderror" name="no_handphone" required value="{{ $user->no_telpn }}">
                
                                    @error('no_handphone')
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