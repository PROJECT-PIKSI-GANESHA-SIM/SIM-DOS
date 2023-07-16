@extends('layouts.dashboard')

@section('title')
    
@endsection

@section('content')
<div class="card shadow bg-white flex-row card-rounded">
    <div class="card-body my-auto">
        <div class="title">
            <i class="fas fa-graduation-cap fa-lg pe-2"></i>
            <span class="fw-bold fs-5">TAMBAH PENDIDIKAN</span>
            <hr>
        </div>
        <main>
            <section class="intro">
                <form method="POST" action="{{ route('dosen.pendidikan.store', $user->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jenjang_pendidikan" class="col-md-4 col-form-label ms-5">{{ __('Jenjang Pendidikan') }}</label>
                                
                                <div class="ms-5">
                                    <select name="jenjang_pendidikan" id="jenjang_pendidikan" class="form-control form-select" data-bs-toggle="dropdown">
                                        @foreach ($jenjang_pendidikan as $jp)
                                            <option value="{{ $jp->id }}">{{ $jp->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('jenjang_pendidikan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="bidang_studi" class="col-md-4 col-form-label me-5">{{ __('Bidang Studi') }}</label>
                
                                <div class="me-5">
                                    <input id="bidang_studi" type="text" class="form-control @error('bidang_studi') is-invalid @enderror" name="bidang_studi" required>
                
                                    @error('bidang_studi')
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
                                <label for="nama_institusi" class="col-md-4 col-form-label ms-5">{{ __('Nama Institusi') }}</label>
                
                                <div class="ms-5">
                                    <input id="nama_institusi" type="text" class="form-control @error('nama_institusi') is-invalid @enderror" name="nama_institusi" required>
                
                                    @error('nama_institusi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="lokasi_institusi" class="col-md-4 col-form-label me-5">{{ __('Lokasi Institusi') }}</label>
                
                                <div>
                                    <input id="lokasi_institusi" type="text" class="form-control @error('lokasi_institusi') is-invalid @enderror" name="lokasi_institusi" required>
                
                                    @error('lokasi_institusi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="dalam_luar_negeri" class="col-form-label">{{ __('Dalam/luar Negeri') }}</label>
                
                                <div class="me-5">
                                    <div>
                                        <select name="dalam_luar_negeri" id="dalam_luar_negeri" class="form-control form-select" data-bs-toggle="dropdown">
                                            <option value="Dalam Negeri">Dalam Negeri</option>
                                            <option value="Luar Negeri">Luar Negeri</option>
                                        </select>
                                    </div>
                
                                    @error('dalam_luar_negeri')
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
                                <label for="no_ijazah" class="col-md-4 col-form-label ms-5">{{ __('No Ijazah') }}</label>
                
                                <div class="ms-5">
                                    <input id="no_ijazah" type="text" class="form-control @error('no_ijazah') is-invalid @enderror" name="no_ijazah" required>
                
                                    @error('no_ijazah')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="predikat_kelulusan" class="col-md-4 col-form-label me-5">{{ __('Predikat Kelulusan') }}</label>
                                
                                <div class="me-5">
                                    <select name="predikat_kelulusan" id="predikat_kelulusan" class="form-control form-select" data-bs-toggle="dropdown">
                                        @foreach ($predikat_kelulusan as $pk)
                                            <option value="{{ $pk->id }}">{{ $pk->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('predikat_kelulusan')
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
                                <label for="gelar_singkat" class="col-md-4 col-form-label ms-5">{{ __('Gelar Singkat') }}</label>
                
                                <div class="ms-5">
                                    <input id="gelar_singkat" type="text" class="form-control @error('gelar_singkat') is-invalid @enderror" name="gelar_singkat" required>
                
                                    @error('gelar_singkat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="gelar_panjang" class="col-md-4 col-form-label me-5">{{ __('Gelar Panjang') }}</label>
                
                                <div class="me-5">
                                    <input id="gelar_panjang" type="text" class="form-control @error('gelar_panjang') is-invalid @enderror" name="gelar_panjang" required>
                
                                    @error('gelar_panjang')
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
                                <label for="tanggal_mulai_studi" class="col-md-4 col-form-label ms-5">{{ __('Tanggal Mulai Studi') }}</label>
                        
                                <div class="ms-5">
                                    <input id="tanggal_mulai_studi" type="date" class="form-control @error('tanggal_mulai_studi') is-invalid @enderror datepicker" name="tanggal_mulai_studi" required>
                                </div>
                        
                                @error('tanggal_mulai_studi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_berakhir_studi" class="col-md-4 col-form-label me-5">{{ __('Tanggal Berakhir Studi') }}</label>
                        
                                <div class="me-5">
                                    <input id="tanggal_berakhir_studi" type="date" class="form-control @error('tanggal_berakhir_studii') is-invalid @enderror datepicker" name="tanggal_berakhir_studi" required>
                                </div>
                        
                                @error('tanggal_berakhir_studi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="judul_penelitian" class="col-md-4 col-form-label mx-5">{{ __('Judul Penelitian') }}</label>
                        
                        <div class="mx-5">
                            <textarea class="form-control @error('judul_penelitian') is-invalid @enderror" name="judul_penelitian" rows="3"></textarea>
                            @error('judul_penelitian')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    

                    <div class="mb-3">
                        <label for="file_ijazah" class="col-md-4 col-form-label mx-5">{{ __('File Ijazah') }}</label>
                        
                        <div class="mx-5">
                            <input type="file" class="form-control @error('file_ijazah') is-invalid @enderror" name="file_ijazah">
                            @error('file_ijazah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="transkrip_nilai" class="col-md-4 col-form-label mx-5">{{ __('Transkrip Nilai') }}</label>
                        
                        <div class="mx-5">
                            <input type="file" class="form-control @error('transkrip_nilai') is-invalid @enderror" name="transkrip_nilai">
                            @error('transkrip_nilai')
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
                            <button type="submit" class="btn btn-sm btn-danger px-5 mx-3" onclick="history.back(-1)">Batal</button>
                        </div>
                    </div>
                </form>
            </section>
        </main>
    </div>
</div>
<script>
    $( function() {
      $( ".datepicker" ).datepicker();
    } );
</script>
@endsection