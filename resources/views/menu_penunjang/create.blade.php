@extends('layouts.dashboard')

@section('title')

@endsection

@section('content')
<div class="card shadow bg-white flex-row card-rounded">
    <div class="card-body my-auto">
        <div class="title">
            <i class="fas fa-clipboard-list fa-lg pe-2"></i>
            <span class="fw-bold fs-5">TAMBAH MENU PENUNJANG</span>
            <hr>
        </div>
        <main>
            <section class="intro">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('menu_penunjang.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="kategori_kegiatan" class="col-form-label">{{ __('Kategori Kegiatan') }} <span class="text-danger"> *</span></label>
                                    <select name="kategori_kegiatan" id="kategori_kegiatan" class="form-control form-select" data-bs-toggle="dropdown">
                                        <option value="Anggota Profesi">Anggota Profesi</option>
                                        <option value="Penghargaan">Penghargaan</option>
                                        <option value="Penunjang Lain">Penunjang Lain</option>
                                    </select>

                                    @error('kategori_kegiatan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="nama_kegiatan" class="col-form-label">{{ __('Nama Kegiatan') }} <span class="text-danger"> *</span></label>
                                    <input id="nama_kegiatan" type="text" class="form-control @error('nama_kegiatan') is-invalid @enderror" name="nama_kegiatan" required>

                                    @error('nama_kegiatan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="pelaksanaan" class="col-form-label">{{ __('Pelaksanaan') }} <span class="text-danger"> *</span></label>
                                    <input id="pelaksanaan" type="date" class="form-control @error('pelaksanaan') is-invalid @enderror datepicker" name="pelaksanaan" required>

                                    @error('pelaksanaan')
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
