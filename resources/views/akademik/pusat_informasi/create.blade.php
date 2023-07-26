@extends('layouts.akademik-dashboard')

@section('title')
    
@endsection

@section('content')
<div class="card shadow bg-white flex-row card-rounded">
    <div class="card-body my-auto">
        <div class="title">
            <i class="fas fa-info-circle fa-lg pe-2"></i>
            <span class="fw-bold fs-5">TAMBAH INFORMASI</span>
            <hr>
        </div>
        <main>
            <section class="intro">
                <form method="POST" action="{{ route('pusat_informasi.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 ms-5">
                        <label for="title" class="col-md-4 col-form-label me-5">{{ __('Title') }}</label>
        
                        <div class="me-5">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" required>
        
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="thumbnail" class="col-md-4 col-form-label mx-5">{{ __('Thumbnail') }}</label>
                        
                        <div class="mx-5">
                            <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail">
                            @error('thumbnail')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="col-md-4 col-form-label mx-5">{{ __('Tanggal') }}</label>
        
                        <div class="mx-5">
                            <input id="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror datepicker" name="tanggal" required>
        
                            @error('tanggal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="mb-3 ">
                        <label for="description" class="col-md-4 col-form-label mx-5">{{ __('Description') }}</label>
        
                        <div class="mx-5">
                            <textarea class="form-control" id="description" name="description"></textarea>
                            
                            @error('description')
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
<script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
 <script>
         ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection