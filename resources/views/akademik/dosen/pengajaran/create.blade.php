@extends('layouts.akademik-dashboard')

@section('title')
    
@endsection

@section('content')
<div class="card shadow bg-white flex-row card-rounded">
    <div class="card-body my-auto">
        <div class="title">
            <i class="fas fa-graduation-cap fa-lg pe-2"></i>
            <span class="fw-bold fs-5">TAMBAH PENGAJARAN</span>
            <hr>
        </div>
        <main>
            <section class="intro">
                <form method="POST" action="{{ route('dosen.pengajaran.store', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3 ">
                        <label for="tahun_ajar" class="col-md-4 col-form-label mx-5">{{ __('Tahun Ajaran') }} <span class="text-danger"> *</span></label>
        
                        <div class="mx-5">
                            <input id="tahun_ajar" type="text" class="form-control @error('tahun_ajar') is-invalid @enderror" name="tahun_ajar">
        
                            @error('tahun_ajar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="mb-3">
                        <label for="program_studi" class="col-md-4 col-form-label mx-5">{{ __('Program Studi') }} <span class="text-danger"> *</span></label>
        
                        <div class="mx-5">
                            <select name="program_studi" id="program_studi" class="form-control form-select" data-bs-toggle="dropdown">
                                @foreach ($program_studi as $p)
                                    <option value="{{ $p->id }}">{{ $p->name }}</option>
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
                        <label for="matkul" class="col-md-4 col-form-label mx-5">{{ __('Nama Mata Kuliah ') }} <span class="text-danger"> *</span></label>
        
                        <div class="mx-5">
                            <input id="matkul" type="text" class="form-control @error('matkul') is-invalid @enderror" name="matkul" required>
        
                            @error('matkul')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="mb-3 ">
                        <label for="jenis_matkul" class="col-md-4 col-form-label mx-5">{{ __('Jenis Mata Kuliah') }} <span class="text-danger"> *</span></label>
        
                        <div class="mx-5">
                            <select name="jenis_matkul" id="jenis_matkul" class="form-control form-select" data-bs-toggle="dropdown">
                                <option value="Mata Kuliah Wajib">Mata Kuliah Wajib</option>
                                <option value="Mata Kuliah Umum">Mata Kuliah Umum</option>
                                <option value="Mata Kuliah Pilihan">Mata Kuliah Pilihan</option>
                            </select>
        
                            @error('jenis_matkul')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 ">
                        <label for="kelas" class="col-md-4 col-form-label mx-5">{{ __('Kelas') }} <span class="text-danger"> *</span></label>
        
                        <div class="mx-5">
                            <input id="kelas" type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas" required>
        
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
                                <label for="sks" class="col-md-4 col-form-label ms-5">{{ __('Jumlah SKS') }} <span class="text-danger"> *</span></label>
                                
                                <div class="ms-5">
                                    <select name="sks" id="sks" class="form-control form-select" data-bs-toggle="dropdown">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
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
                                <label for="jumlah_mahasiswa" class="col-md-4 col-form-label me-5">{{ __('Jumlah Mahasiswa') }} <span class="text-danger"> *</span></label>
                
                                <div class="me-5">
                                    <input id="jumlah_mahasiswa" type="text" class="form-control @error('jumlah_mahasiswa') is-invalid @enderror" name="jumlah_mahasiswa" required>
                
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
                            <input type="file" class="form-control @error('bukti_pengajaran') is-invalid @enderror" name="bukti_pengajaran">
                            <span class="text-danger fst-italic">jpeg,png,jpg: max 2 mb</span>
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
                            <input type="file" class="form-control @error('bukti_presensi') is-invalid @enderror" name="bukti_presensi">
                            <span class="text-danger fst-italic">jpeg,png,jpg: max 2 mb</span>
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