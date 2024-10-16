@extends('layouts.akademik-dashboard')

@section('title')
    
@endsection

@section('content')
<div class="card shadow bg-white card-rounded">
    <div class="card-body my-auto">
        <div class="title">
            <i class="fas fa-info-circle fa-lg pe-2"></i>
            <span class="fw-bold fs-5">TAMBAH INFORMASI</span>
            <hr>
        </div>
        <main>
            <section class="intro">
                <form method="POST" action="{{ route('pusat_informasi.update', $pusat_informasi->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="col-form-label">{{ __('Title') }}</label>
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" required value="{{ $pusat_informasi->title }}">
    
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
        
                    </div>

                    <div class="mb-3">
                        <label for="thumbnail" class="col-form-label">{{ __('Thumbnail') }}</label>
                        <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail">
                        @error('thumbnail')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="text-danger fst-italic">thumbnail: using 1200 x 630 pixels</span>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="col-form-label">{{ __('Tanggal') }}</label>
                        <input id="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror datepicker" name="tanggal" required value="{{ $pusat_informasi->date }}">
                        
                        @error('tanggal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
        
                    </div>
                    
                    <div class="mb-3 ">
                        <label for="description" class="col-form-label">{{ __('Description') }}</label>
                        {{-- <input id="description" type="text" class="form-control @error('description') is-invalid @enderror " name="description" required> --}}
                        <textarea class="form-control" id="description" name="description">{{ $pusat_informasi->description }}</textarea>
                        
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                                            
                    </div>
                    <div class="row mb-3">
                        <div class="col-mb-6 d-flex justify-content-end align-items-end">
                            <button type="submit" class="btn btn-success btn-sm mx-3">Update Data</button>
                            <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm">Batal</a>
                        </div>
                        </div>
                    </div>
                </form>
            </section>
        </main>
    </div>
</div>
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script> --}}
 {{-- <script>
         ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script> --}}
@endsection