@extends('layouts.dashboard')

@section('title')
    
@endsection

@section('content')
<div class="card shadow bg-white flex-row card-rounded">
    <div class="card-body my-auto">
        <div class="title">
            <i class="fas fa-user fa-lg pe-2"></i>
            <span class="fw-bold fs-5">PROFILE</span>
            <hr>
        </div>
        @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3 ">
                <label for="nidn" class="col-md-4 col-form-label mx-5">{{ __('NIDN') }}</label>

                <div class="mx-5">
                    <input id="nidn" type="text" class="form-control @error('nidn') is-invalid @enderror" name="nidn" value="{{ $user->nidn }}">

                    @error('nidn')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="col-md-4 col-form-label mx-5">{{ __('Email') }}</label>

                <div class="mx-5">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" value="{{ $user->email }}" disabled>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 ">
                <label for="name" class="col-md-4 col-form-label mx-5">{{ __('Name') }}</label>

                <div class="mx-5">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required value="{{ $user->name }}">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 ">
                <label for="no_telpn" class="col-md-4 col-form-label mx-5">{{ __('Phone') }}</label>

                <div class="mx-5">
                    <input id="no_telpn" type="text" class="form-control @error('no_telpn') is-invalid @enderror" name="no_telpn" value="{{ $user->no_telpn }}">

                    @error('no_telpn')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 ">
                <label for="image" class="col-md-4 col-form-label mx-5">{{ __('Profile') }}</label>
                
                <div class="mx-5">
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ $user->image }}">
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <div class="mx-5 d-flex justify-content-end align-items-end">
                    {{-- <a href="" class="btn btn-sm btn-dark mb-3">Update Data</a> --}}
                    <button type="submit" class="btn btn-sm btn-success mx-3">Update Data</button>
                    <a href="{{ route('home') }}" class="btn btn-sm btn-danger px-5">Kembali</a>
                    {{-- <button type="submit" class="btn btn-sm btn-danger" onclick="history.back(-1)">Kembali</button> --}}
                </div>
            </div>
        </form>
    </div>
</div>
@endsection