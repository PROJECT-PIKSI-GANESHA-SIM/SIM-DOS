@extends('layouts.dashboard')

@section('title')

@endsection

@section('content')
<div class="card shadow bg-white flex-row card-rounded">
    <div class="card-body my-auto">
        <div class="title">
            <i class="fas fa-band-aid fa-lg pe-2"></i>
            <span class="fw-bold fs-5">VIEW CAPAIAN LUARAN</span>
            <hr>
        </div>
        <main>
            <section class="intro">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <form method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="jenis_luaran" class="col-form-label">{{ __('Jenis Luaran') }} <span class="text-danger"> *</span></label>
                                    <select name="jenis_luaran" id="jenis_luaran" class="form-control form-select" data-bs-toggle="dropdown" disabled>
                                        <option value="Paten Nasional" {{ $capaian_luaran->jenis_luaran == 'Paten Nasional' ? 'selected' : '' }}>Paten Nasional</option>
                                        <option value="Paten Internasional" {{ $capaian_luaran->jenis_luaran == 'Paten Internasional' ? 'selected' : '' }}>Paten Internasional</option>
                                        <option value="Hak Cipta Nasional" {{ $capaian_luaran->jenis_luaran == 'Hak Cipta Nasional' ? 'selected' : '' }}>Hak Cipta Nasional</option>
                                        <option value="Hak Cipta Internasional" {{ $capaian_luaran->jenis_luaran == 'Hak Cipta Internasional' ? 'selected' : '' }}>Hak Cipta Internasional</option>
                                        <option value="Modul" {{ $capaian_luaran->jenis_luaran == 'Modul' ? 'selected' : '' }}>Modul</option>
                                        <option value="Buku" {{ $capaian_luaran->jenis_luaran == 'Buku' ? 'selected' : '' }}>Buku</option>
                                    </select>

                                    @error('jenis_luaran')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="judul_karya" class="col-form-label">{{ __('Judul Karya') }} <span class="text-danger"> *</span></label>
                                    <input id="judul_karya" type="text" class="form-control @error('judul_karya') is-invalid @enderror" name="judul_karya" required value="{{ $capaian_luaran->judul_karya }}" disabled>

                                    @error('judul_karya')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="tanggal" class="col-form-label">{{ __('tanggal') }} <span class="text-danger"> *</span></label>
                                    <input id="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror datepicker" name="tanggal" required value="{{ $capaian_luaran->tanggal }}" disabled>

                                    @error('tanggal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="mb-3">
                                    <label for="tautan_eksternal" class="col-form-label">{{ __('Tautan Eksternal') }} <span class="text-danger"> *</span></label>
                                    <input id="tautan_eksternal" type="text" class="form-control @error('tautan_eksternal') is-invalid @enderror" name="tautan_eksternal" required value="{{ $capaian_luaran->tautan_eksternal }}" disabled>

                                    @error('tautan_eksternal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="upload_document" class="col-form-label">{{ __('Upload Document') }}</label>
                                    <input type="file" class="form-control @error('upload_document') is-invalid @enderror" name="upload_document" disabled>
                                    @if ($capaian_luaran->upload_document != null)
                                        <span class="fst-italic"><a href="{{ Storage::url('dosen/capaian_luaran/upload_document/' . $capaian_luaran->upload_document) }}" target="_blank" rel="noopener noreferrer" class="text-danger text-decoration-none"> View File</a></span>
                                    @else
                                        <span class="fst-italic text-danger"> pdf:max 2 mb</a></span>
                                    @endif

                                    @error('upload_document')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="row mb-3">
                                    <div class="col-mb-6 d-flex justify-content-end align-items-end">
                                        <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm">Batal</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
