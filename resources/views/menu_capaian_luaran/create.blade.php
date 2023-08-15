@extends('layouts.dashboard')

@section('title')

@endsection

@section('content')
<div class="card shadow bg-white flex-row card-rounded">
    <div class="card-body my-auto">
        <div class="title">
            <i class="fas fa-band-aid fa-lg pe-2"></i>
            <span class="fw-bold fs-5">TAMBAH CAPAIAN LUARAN</span>
            <hr>
        </div>
        <main>
            <section class="intro">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('capaian_luaran.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="jenis_luaran" class="col-form-label">{{ __('Jenis Luaran') }} <span class="text-danger"> *</span></label>
                                    <select name="jenis_luaran" id="jenis_luaran" class="form-control form-select" data-bs-toggle="dropdown">
                                        <option value="Paten Nasional">Paten Nasional</option>
                                        <option value="Paten Internasional">Paten Internasional</option>
                                        <option value="Hak Cipta Nasional">Hak Cipta Nasional</option>
                                        <option value="Hak Cipta Internasional">Hak Cipta Internasional</option>
                                        <option value="Modul">Modul</option>
                                        <option value="Buku">Buku</option>
                                    </select>

                                    @error('jenis_luaran')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="judul_karya" class="col-form-label">{{ __('Judul Karya') }} <span class="text-danger"> *</span></label>
                                    <input id="judul_karya" type="text" class="form-control @error('judul_karya') is-invalid @enderror" name="judul_karya" required>

                                    @error('judul_karya')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="tanggal" class="col-form-label">{{ __('tanggal') }} <span class="text-danger"> *</span></label>
                                    <input id="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror datepicker" name="tanggal" required>

                                    @error('tanggal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="mb-3">
                                    <label for="tautan_eksternal" class="col-form-label">{{ __('Tautan Eksternal') }} <span class="text-danger"> *</span></label>
                                    <input id="tautan_eksternal" type="text" class="form-control @error('tautan_eksternal') is-invalid @enderror" name="tautan_eksternal" required>

                                    @error('tautan_eksternal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="upload_document" class="col-form-label">{{ __('Upload Document') }}</label>
                                    <input type="file" class="form-control @error('upload_document') is-invalid @enderror" name="upload_document">
                                    <span class="text-danger fst-italic">pdf: max 2 mb</span>

                                    @error('upload_document')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="row mb-3">
                                    <div class="col-mb-6 d-flex justify-content-end align-items-end">
                                        <button type="submit" class="btn btn-success btn-sm mx-3">Simpan</button>
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
