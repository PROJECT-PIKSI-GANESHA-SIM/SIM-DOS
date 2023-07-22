@extends('layouts.dashboard')

@section('title')
    
@endsection

@section('content')
<div class="card shadow bg-white flex-row card-rounded">
    <div class="card-body my-auto">
        <div class="title">
            <i class="fas fa-graduation-cap fa-lg pe-2"></i>
            <span class="fw-bold fs-5">VIEW PENGAJARAN</span>
            <hr>
        </div>
        <main>
            <section class="intro">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3 ">
                        <label for="tahun_ajar" class="col-md-4 col-form-label mx-5">{{ __('Tahun Ajaran') }}</label>
        
                        <div class="mx-5">
                            <input id="tahun_ajar" type="text" class="form-control @error('tahun_ajar') is-invalid @enderror" name="tahun_ajar" value="{{ $pengajaran->tahun_ajaran }}" readonly>
        
                            @error('tahun_ajar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="mb-3">
                        <label for="program_studi" class="col-md-4 col-form-label mx-5">{{ __('Program Studi') }}</label>
        
                        <div class="mx-5">
                            <select name="program_studi" id="program_studi" class="form-control form-select" data-bs-toggle="dropdown" disabled>
                                @foreach ($program_studi as $p)
                                    <option value="{{ $p->id }}" {{ $p->id == $pengajaran->program_studi ? 'selected' : '' }}>{{ $p->name }}</option>
                                @endforeach
                            </select>
        
                            @error('program_studi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="mb-3 ">
                        <label for="matkul" class="col-md-4 col-form-label mx-5">{{ __('Nama Mata Kuliah ') }}</label>
        
                        <div class="mx-5">
                            <input id="matkul" type="text" class="form-control @error('matkul') is-invalid @enderror" name="matkul" required value="{{ $pengajaran->nama_mata_kuliah }}" readonly>
        
                            @error('matkul')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="mb-3 ">
                        <label for="jenis_matkul" class="col-md-4 col-form-label mx-5">{{ __('Jenis Mata Kuliah') }}</label>
        
                        <div class="mx-5">
                            <select name="jenis_matkul" id="jenis_matkul" class="form-control form-select" data-bs-toggle="dropdown" disabled>
                                <option value="Mata Kuliah Wajib" {{ $pengajaran->jenis_mata_kuliah == 'Mata Kuliah Wajib' ? 'selected' : '' }}>Mata Kuliah Wajib</option>
                                <option value="Mata Kuliah Umum" {{ $pengajaran->jenis_mata_kuliah == 'Mata Kuliah Umum' ? 'selected' : '' }}>Mata Kuliah Umum</option>
                                <option value="Mata Kuliah Pilihan" {{ $pengajaran->jenis_mata_kuliah == 'Mata Kuliah Pilihan' ? 'selected' : '' }}>Mata Kuliah Pilihan</option>
                            </select>
        
                            @error('jenis_matkul')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 ">
                        <label for="kelas" class="col-md-4 col-form-label mx-5">{{ __('Kelas') }}</label>
        
                        <div class="mx-5">
                            <input id="kelas" type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas" required value="{{ $pengajaran->kelas }}" readonly>
        
                            @error('kelas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="sks" class="col-md-4 col-form-label ms-5">{{ __('Jumlah SKS') }}</label>
                                
                                <div class="ms-5">
                                    <select name="sks" id="sks" data-placeholder="Pilih Jenis Mata Kuliah" class="form-control form-select" data-bs-toggle="dropdown" disabled>
                                        <option value="1" {{ $pengajaran->jumlah_sks == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ $pengajaran->jumlah_sks == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ $pengajaran->jumlah_sks == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ $pengajaran->jumlah_sks == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ $pengajaran->jumlah_sks == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                </div>
                                @error('sks')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jumlah_mahasiswa" class="col-md-4 col-form-label me-5">{{ __('Jumlah Mahasiswa') }}</label>
                
                                <div class="me-5">
                                    <input id="jumlah_mahasiswa" type="text" class="form-control @error('jumlah_mahasiswa') is-invalid @enderror" name="jumlah_mahasiswa" required value="{{ $pengajaran->jumlah_mahasiswa }}" disabled>
                
                                    @error('jumlah_mahasiswa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="mb-3">
                        <label for="bukti_pengajaran" class="col-md-4 col-form-label mx-5">{{ __('Bukti Pengajaran') }}</label>
                        
                        <div class="mx-5">
                            <input type="file" class="form-control @error('bukti_pengajaran') is-invalid @enderror" name="bukti_pengajaran" disabled>
                            @error('bukti_pengajaran')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="bukti_presensi" class="col-md-4 col-form-label mx-5">{{ __('Bukti Presensi') }}</label>
                        
                        <div class="mx-5">
                            <input type="file" class="form-control @error('bukti_presensi') is-invalid @enderror" name="bukti_presensi" disabled>
                            @error('bukti_presensi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="mx-5 d-flex justify-content-end align-items-end">
                            {{-- <a href="" class="btn btn-sm btn-dark mb-3">Update Data</a> --}}
                            {{-- <button type="submit" class="btn btn-sm btn-success px-5 mx-3">Simpan</button> --}}
                            {{-- <button type="submit" class="btn btn-sm btn-danger px-5">Batal</button> --}}
                            <button type="submit" class="btn btn-sm btn-danger px-5" onclick="history.back(-1)">Kembali</button>
                        </div>
                    </div>
                </form>
            </section>
        </main>
    </div>
</div>
@endsection