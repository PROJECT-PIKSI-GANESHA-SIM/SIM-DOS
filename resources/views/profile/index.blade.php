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
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="mb-3 ">
                <label for="nidn" class="col-md-4 col-form-label mx-5">{{ __('NIDN') }}</label>

                <div class="mx-5">
                    <input id="nidn" type="text" class="form-control @error('nidn') is-invalid @enderror" name="nidn" required>

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
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 ">
                <label for="phone" class="col-md-4 col-form-label mx-5">{{ __('Phone') }}</label>

                <div class="mx-5">
                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="nidn">

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 ">
                <label for="image" class="col-md-4 col-form-label mx-5">{{ __('Profile') }}</label>
                
                <div class="mx-5">
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
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
                    <button type="submit" class="btn btn-sm btn-danger">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection