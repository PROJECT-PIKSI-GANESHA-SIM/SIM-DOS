@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row">
        <div>
            <div class="card shadow bg-white flex-row card-rounded">
                <div class="bg-custom-primary card-rounded-left image">
                    <h1 class="text-white text-bold text-center mt-3">W E L C O M E</h1>
                    <img src="{{ asset('assets/login.png') }}" class="mb-5 px-5" alt="" style="400px" height="400px">
                </div>
                
                <div class="card-body my-auto">
                    <div class="text-center mb-2">
                        <img src="{{ asset('/assets/PIKSI.png') }}" alt="logo-piksi" width="100px" height="100px">
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
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

                        <div class="mb-3 ">
                            <label for="password" class="col-md-4 col-form-label mx-5">{{ __('Password') }}</label>

                            <div class="mx-5">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}
                        <div class="mb-3 mx-5 text-end">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link text-custom-primary" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                        <div class="mb-0">
                            <div class="d-grid mx-5">
                                <button type="submit" class="btn bg-custom-primary text-white">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                        {{-- <div class="mb-0 text-center mt-2">
                            <p>Don't have an account <span><a href="{{ route('register') }}" class="text-no-underline text-custom-primary text-bold">Register</a></span> </p>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
