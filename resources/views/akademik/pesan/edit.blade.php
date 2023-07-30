@extends('layouts.akademik-dashboard')

@section('title')
    
@endsection

@section('content')
<div class="card shadow bg-white flex-row card-rounded">
    <div class="card-body my-auto">
        <div class="title">
            <i class="fas fa-comment-dots fa-lg pe-2"></i>
            <span class="fw-bold fs-5">EDIT PESAN</span>
            <hr>
        </div>
        <main>
            <section class="intro">
                <form method="POST" action="{{ route('pesan.update', $pesan->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3 ">
                        <label for="pesan" class="col-form-label">{{ __('Pesan') }} <span class="text-danger"> *</span></label>
                        <input id="pesan" type="text" class="form-control @error('pesan') is-invalid @enderror" name="pesan" value="{{ $pesan->message }}">
    
                        @error('pesan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
        
                    </div>
                    <div class="row mb-3">
                        <div class="col-mb-6 d-flex justify-content-end align-items-end">
                            <button type="submit" class="btn btn-success btn-sm mx-3">Update Data</button>
                            <button type="submit" class="btn btn-danger btn-sm">Batal</button>
                        </div>
                    </div>
                </form>
            </section>
        </main>
    </div>
</div>
@endsection