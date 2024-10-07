@extends('layouts.akademik-dashboard')

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
                <label for="nidn" class="col-form-label">{{ __('NIDN') }}</label>
                <input id="nidn" type="text" class="form-control @error('nidn') is-invalid @enderror" name="nidn" value="{{ $user->nidn }}">

                @error('nidn')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <div class="mb-3">
                <label for="email" class="col-form-label">{{ __('Email') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" value="{{ $user->email }}" disabled>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <div class="mb-3 ">
                <label for="name" class="col-form-label">{{ __('Name') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required value="{{ $user->name }}">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3 ">
                <label for="no_telpn" class="col-form-label">{{ __('Phone') }}</label>
                <input id="no_telpn" type="text" class="form-control @error('no_telpn') is-invalid @enderror" name="no_telpn" value="{{ $user->no_telpn }}">

                @error('no_telpn')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <div class="mb-3 ">
                <label for="image" class="col-form-label">{{ __('Profile') }}</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ $user->image }}">
                @error('image')
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
    </div>
</div>
@endsection