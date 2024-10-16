@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row">
        <div>
            <div class="card shadow bg-white flex-row card-rounded">
                <div class="bg-custom-primary card-rounded-left image">
                    <h1 class="text-white text-bold text-center mt-3" style="font-family: 'Poppins', sans-serif;">W E L C O M E</h1>
                    <img src="{{ asset('assets/login.png') }}" class="mb-5 px-5" alt="" style="height: 400px;">
                </div>
                
                <div class="card-body my-auto">
                    <div class="text-center mb-2">
                        <img src="{{ asset('/assets/PIKSI.png') }}" alt="logo-piksi" width="100px" height="100px">
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="col-md-4 col-form-label mx-5" style="font-family: 'Poppins', sans-serif;">{{ __('Email Address') }}</label>

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
                            <label for="password" class="col-md-4 col-form-label mx-5" style="font-family: 'Poppins', sans-serif;">{{ __('Password') }}</label>

                            <div class="mx-5">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 mx-5 text-end">
                            {{-- Optional password reset link --}}
                        </div>
                        <div class="mb-0">
                            <div class="d-grid mx-5">
                                <button type="submit" class="btn bg-custom-primary text-white" style="font-family: 'Poppins', sans-serif;">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
