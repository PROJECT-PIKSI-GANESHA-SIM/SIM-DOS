@extends('layouts.dashboard')

@section('title')
    
@endsection

@section('content')
<div class="card shadow bg-white flex-row card-rounded">
    <div class="card-body my-auto">
        <div class="title">
            <i class="fas fa-graduation-cap fa-lg pe-2"></i>
            <span class="fw-bold fs-5">LAIN - LAIN</span>
            <hr>
        </div>
        <main>
            <section class="intro">
                <form method="POST" action="{{ route('dosen.lain.update', [$user->id, $lain->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="col-md"> 
                        <div class="mb-3">
                            
                            <label for="npwp" class="col-form-label">{{ __('NPWP') }}</label>
                            <input id="npwp" type="text" class="form-control @error('npwp') is-invalid @enderror" name="npwp" value="{{ $lain->npwp }}">
        
                            @error('npwp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                        </div> 
                    </div>

                    <div class="col-md"> 
                        <div class="mb-3">
                            
                            <label for="nama_wajib_pajak" class="col-form-label">{{ __('Nama Wajib Pajak') }}</label>
                            <input id="nama_wajib_pajak" type="text" class="form-control @error('nama_wajib_pajak') is-invalid @enderror" name="nama_wajib_pajak" value="{{ $lain->nama_wajib_pajak }}">
        
                            @error('nama_wajib_pajak')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                        </div> 
                    </div>

                    <div class="col-md"> 
                        <div class="mb-3">
                            
                            <label for="sinta_id" class="col-form-label">{{ __('Sinta ID') }}</label>
                            <input id="sinta_id" type="text" class="form-control @error('sinta_id') is-invalid @enderror" name="sinta_id" value="{{ $lain->sinta_id }}">
        
                            @error('sinta_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                        </div> 
                    </div>

                    <div class="row mb-3">
                        <div class="col-mb-6 d-flex justify-content-end align-items-end">
                            <button type="submit" class="btn btn-success btn-sm mx-3">Simpan</button>
                            <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm">Batal</a>
                        </div>
                    </div>
                </form>
            </section>
        </main>
    </div>
</div>
@endsection