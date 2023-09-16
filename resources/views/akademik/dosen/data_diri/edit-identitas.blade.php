@extends('layouts.akademik-dashboard')

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
                <form method="POST" action="{{ route('dosen.identitas.update', [$users->id, $identitas->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nidn" class="col-form-label">{{ __('Nidn') }}</label>
                                <input id="nidn" type="text" class="form-control @error('nidn') is-invalid @enderror" name="nidn" value="{{ $users->nidn }}">

                                @error('nidn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3 ">
                                <label for="nip" class="col-form-label">{{ __('Nip') }}</label>
                                <input id="nip" type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" required value="{{ $identitas->nip }}">

                                @error('nip')
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
                                <label for="nik" class="col-form-label">{{ __('Nik') }}</label>
                                <input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ $identitas->nik }}">

                                @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3 ">
                                <label for="nama" class="col-form-label">{{ __('Nama') }}</label>
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" required  value="{{ $identitas->nama }}">

                                @error('nama')
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
                                <label for="jenis_kelamin" class="col-form-label">{{ __('Jenis Kelamin') }}</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control form-select" data-bs-toggle="dropdown">
                                    <option value="Pria" {{ $identitas->jenis_kelamin == 'Pria' ? 'selected' : '' }}>Pria</option>
                                    <option value="Wanita" {{ $identitas->jenis_kelamin == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                                </select>
                                @error('jenis_kelamin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="golongan_darah" class="col-form-label">{{ __('Golongan Darah') }}</label>
                                <select name="golongan_darah" id="golongan_darah" class="form-control form-select" data-bs-toggle="dropdown">
                                    <option value="-" {{ $identitas->golongan_darah == '-' ? 'selected' : '' }}>-</option>
                                    <option value="O" {{ $identitas->golongan_darah == 'O' ? 'selected' : '' }}>O</option>
                                    <option value="A" {{ $identitas->golongan_darah == 'A' ? 'selected' : '' }}>A</option>
                                    <option value="B" {{ $identitas->golongan_darah == 'B' ? 'selected' : '' }}>B</option>
                                    <option value="AB" {{ $identitas->golongan_darah == 'AB' ? 'selected' : '' }}>AB</option>
                                </select>
                                @error('golongan_darah')
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
                                <label for="kewarganegaraan" class="col-form-label">{{ __('Kewarganegaraan') }}</label>
                                <input id="kewarganegaraan" type="text" class="form-control @error('kewarganegaraan') is-invalid @enderror" name="kewarganegaraan"  value="{{ $identitas->kewarganegaraan }}">

                                @error('kewarganegaraan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="agama" class="col-form-label">{{ __('Agama') }}</label>
                                <select name="agama" id="agama" class="form-control form-select" data-bs-toggle="dropdown">
                                    <option value="Islam" {{ $identitas->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Protestan" {{ $identitas->agama == 'Protestan' ? 'selected' : '' }}>Protestan</option>
                                    <option value="Katolik" {{ $identitas->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                    <option value="Hindu" {{ $identitas->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                    <option value="Buddha" {{ $identitas->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                    <option value="Khonghucu" {{ $identitas->agama == 'Khonghucu' ? 'selected' : '' }}>Khonghucu</option>
                                </select>
                                @error('agama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="tempat_lahir" class="col-form-label">{{ __('Tempat Lahir') }}</label>
                                <input id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir"  value="{{ $identitas->tempat_lahir }}">

                                @error('tempat_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="col-form-label">{{ __('Tanggal Lahir') }}</label>
                                <input id="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror datepicker" name="tanggal_lahir" required  value="{{ $identitas->tanggal_lahir }}">
                                @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="status_perkawinan" class="col-form-label">{{ __('Status Perkawinan') }}</label>
                                <select name="status_perkawinan" id="status_perkawinan" class="form-control form-select" data-bs-toggle="dropdown">
                                    <option value="Belum Kawin" {{ $identitas->status_perkawinan == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                                    <option value="Kawin" {{ $identitas->status_perkawinan == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                                </select>

                                @error('status_perkawinan')
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
                            <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm">Batal</a>
                        </div>
                    </div>
                </form>
            </section>
        </main>
    </div>
</div>
@endsection
