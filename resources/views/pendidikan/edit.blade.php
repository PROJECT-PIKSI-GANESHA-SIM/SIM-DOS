@extends('layouts.dashboard')

@section('title')
    
@endsection

@section('content')
<div class="card shadow bg-white flex-row card-rounded">
    <div class="card-body my-auto">
        <div class="title">
            <i class="fas fa-clipboard-list fa-lg pe-2"></i>
            <span class="fw-bold fs-5">EDIT PENDIDIKAN</span>
            <hr>
        </div>
        <main>
            <section class="intro">
                <form method="POST" action="{{ route('pendidikan.update', $pendidikan->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jenjang_pendidikan" class="col-form-label">{{ __('Jenjang Pendidikan') }} <span class="text-danger"> *</span></label>
                                <select name="jenjang_pendidikan" id="jenjang_pendidikan" class="form-control form-select" data-bs-toggle="dropdown">
                                    @foreach ($jenjang_pendidikan as $jp)
                                        <option value="{{ $jp->id }}" {{ $jp->id == $pendidikan->jenjang_pendidikan ? 'selected' : '' }}>{{ $jp->name }}</option>
                                    @endforeach
                                </select>

                                @error('jenjang_pendidikan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="bidang_studi" class="col-form-label">{{ __('Bidang Studi') }} <span class="text-danger"> *</span></label>
                                <input id="bidang_studi" type="text" class="form-control @error('bidang_studi') is-invalid @enderror" name="bidang_studi" required value="{{ $pendidikan->bidang_studi }}">
            
                                @error('bidang_studi')
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
                                <label for="nama_institusi" class="col-form-label">{{ __('Nama Institusi') }} <span class="text-danger"> *</span></label>
                                <input id="nama_institusi" type="text" class="form-control @error('nama_institusi') is-invalid @enderror" name="nama_institusi" required value="{{ $pendidikan->nama_instansi }}">
            
                                @error('nama_institusi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="lokasi_institusi" class="col-form-label">{{ __('Lokasi Institusi') }} <span class="text-danger"> *</span></label>
                                <input id="lokasi_institusi" type="text" class="form-control @error('lokasi_institusi') is-invalid @enderror" name="lokasi_institusi" required value="{{ $pendidikan->lokasi_institusi }}">
            
                                @error('lokasi_institusi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="dalam_luar_negeri" class="col-form-label">{{ __('Dalam/luar Negeri') }} <span class="text-danger"> *</span></label>
                                <div>
                                    <select name="dalam_luar_negeri" id="dalam_luar_negeri" class="form-control form-select" data-bs-toggle="dropdown">
                                        <option value="Dalam Negeri" {{ $pendidikan->dalam_luar_negeri == 'Dalam Negeri' ? 'selected' : '' }}>Dalam Negeri</option>
                                        <option value="Luar Negeri" {{ $pendidikan->dalam_luar_negeri == 'Luar Negeri' ? 'selected' : '' }}>Luar Negeri</option>
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

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="no_ijazah" class="col-form-label">{{ __('No Ijazah') }} <span class="text-danger"> *</span></label>
                                <input id="no_ijazah" type="text" class="form-control @error('no_ijazah') is-invalid @enderror" name="no_ijazah" required value="{{ $pendidikan->nomor_ijazah }}">
            
                                @error('no_ijazah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="predikat_kelulusan" class="col-form-label">{{ __('Predikat Kelulusan') }} <span class="text-danger"> *</span></label>
                                <select name="predikat_kelulusan" id="predikat_kelulusan" class="form-control form-select" data-bs-toggle="dropdown">
                                    @foreach ($predikat_kelulusan as $pk)
                                        <option value="{{ $pk->id }}" {{ $pk->id == $pendidikan->predikat_kelulusan ? 'selected' : '' }}>{{ $pk->name }}</option>
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

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="gelar_singkat" class="col-form-label">{{ __('Gelar Singkat') }} <span class="text-danger"> *</span></label>
                                <input id="gelar_singkat" type="text" class="form-control @error('gelar_singkat') is-invalid @enderror" name="gelar_singkat"  value="{{ $pendidikan->gelar_singkat }}">
            
                                @error('gelar_singkat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="gelar_panjang" class="col-form-label">{{ __('Gelar Panjang') }} <span class="text-danger"> *</span></label>
                                <input id="gelar_panjang" type="text" class="form-control @error('gelar_panjang') is-invalid @enderror" name="gelar_panjang" required value="{{ $pendidikan->gelar_panjang }}">
            
                                @error('gelar_panjang')
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
                                <label for="tanggal_mulai_studi" class="col-form-label">{{ __('Tanggal Mulai Studi') }} <span class="text-danger"> *</span></label>
                        
                                <input id="tanggal_mulai_studi" type="date" class="form-control @error('tanggal_mulai_studi') is-invalid @enderror datepicker" name="tanggal_mulai_studi" required value="{{ $pendidikan->tanggal_mulai_studi }}">
                                @error('tanggal_mulai_studi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_berakhir_studi" class="col-form-label">{{ __('Tanggal Berakhir Studi') }} <span class="text-danger"> *</span></label>
                                <input id="tanggal_berakhir_studi" type="date" class="form-control @error('tanggal_berakhir_studii') is-invalid @enderror datepicker" name="tanggal_berakhir_studi" required value="{{ $pendidikan->tanggal_berakhir_studi }}">
                    
                                @error('tanggal_berakhir_studi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="judul_penelitian" class="col-form-label">{{ __('Judul Penelitian') }}</label>
                        <textarea class="form-control @error('judul_penelitian') is-invalid @enderror" name="judul_penelitian" rows="3">{{ $pendidikan->judul_penelitian }}</textarea>
                        @error('judul_penelitian')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                    </div>
                    

                    <div class="mb-3">
                        <label for="file_ijazah" class="col-form-label">{{ __('File Ijazah') }}</label>
                        
                        <input type="file" class="form-control @error('file_ijazah') is-invalid @enderror" name="file_ijazah">
                        @if ($pendidikan->file_ijazah != null)
                            <span class="fst-italic"><a href="{{ Storage::url('dosen/pendidikan/ijazah/' . $pendidikan->file_ijazah) }}" target="_blank" rel="noopener noreferrer" class="text-danger text-decoration-none"> View File</a></span>
                        @else
                            <span class="fst-italic text-danger"> pdf:max 2 mb</a></span>
                        @endif
                        @error('file_ijazah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                    </div>

                    <div class="mb-3">
                        <label for="transkrip_nilai" class="col-form-label">{{ __('Transkrip Nilai') }}</label>
                        <input type="file" class="form-control @error('transkrip_nilai') is-invalid @enderror" name="transkrip_nilai">
                        @if ($pendidikan->transkrip_nilai != null)
                            <span class="fst-italic"><a href="{{ Storage::url('dosen/pendidikan/transkrip_nilai/' . $pendidikan->transkrip_nilai) }}" target="_blank" rel="noopener noreferrer" class="text-danger text-decoration-none"> View File</a></span>
                        @else
                            <span class="fst-italic text-danger"> pdf:max 2 mb</a></span>
                        @endif
                        @error('transkrip_nilai')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
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
<script>
    $( function() {
      $( ".datepicker" ).datepicker();
    } );
</script>
@endsection