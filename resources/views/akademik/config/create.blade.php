@extends('layouts.akademik-dashboard')

@section('title')

@endsection

@section('content')
<div class="card shadow bg-white card-rounded">
    <div class="card-body my-auto">
        <div class="title">
            <i class="fas fa-screwdriver fa-lg pe-2"></i>
            <span class="fw-bold fs-5">TAMBAH ACCOUNT</span>
            <hr>
        </div>
        <main>
            <section class="intro">
                <form method="POST" action="{{ route('config.store') }}">
                    @csrf

                    <div class="mb-2">
                        <label for="name" class="col-md-4 col-form-label mx-5">{{ __('Name') }}</label>

                        <div class="mx-5">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="nidn" class="col-md-4 col-form-label mx-5">{{ __('NIDN') }}</label>

                        <div class="mx-5">
                            <input id="nidn" type="text" class="form-control @error('nidn') is-invalid @enderror" name="nidn" value="{{ old('nidn') }}" required autocomplete="nidn" autofocus>

                            @error('nidn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="email" class="col-md-4 col-form-label mx-5">{{ __('Email Address') }}</label>

                        <div class="mx-5">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="password" class="col-md-4 col-form-label mx-5">{{ __('Password') }}</label>

                        <div class="mx-5">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row my-4 mx-5">
                        <button type="submit" class="btn text-white" style="background-color: #8A00B9;">Register</button>
                    </div>
                </form>
            </section>
        </main>
    </div>
</div>
@endsection
