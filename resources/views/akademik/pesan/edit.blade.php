@extends('layouts.dashboard')

@section('title')
    
@endsection

@section('content')
<div class="card shadow bg-white flex-row card-rounded">
    <div class="card-body my-auto">
        <div class="title">
            <i class="fas fa-graduation-cap fa-lg pe-2"></i>
            <span class="fw-bold fs-5">EDIT PESAN</span>
            <hr>
        </div>
        <main>
            <section class="intro">
                <form method="POST" action="{{ route('pesan.update', $pesan->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3 ">
                        <label for="pesan" class="col-md-4 col-form-label mx-5">{{ __('Pesan') }} <span class="text-danger"> *</span></label>
        
                        <div class="mx-5">
                            <input id="pesan" type="text" class="form-control @error('pesan') is-invalid @enderror" name="pesan" value="{{ $pesan->message }}">
        
                            @error('pesan')
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