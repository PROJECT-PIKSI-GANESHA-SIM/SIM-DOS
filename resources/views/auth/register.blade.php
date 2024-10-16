@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row">
            <div>
                <div class="card shadow bg-white flex-row card-rounded ">
                    <div class="bg-custom-primary card-rounded-left image">
                        <img src="{{ asset('assets/register.svg') }}" class="mb-5 px-5 m-auto" alt="" height="400px"
                            height="400px" style="display: block; margin: 0 auto;">

                    </div>
                    <div class="card-body my-auto">
                        <div class="text-center mb-2">
                            <img src="{{ asset('/assets/PIKSI.png') }}" alt="logo-piksi" width="100px" height="100px">
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-2">
                                <label for="name" class="col-md-4 col-form-label mx-5">{{ __('Name') }}</label>

                                <div class="mx-5">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                    <input id="nidn" type="text"
                                        class="form-control @error('nidn') is-invalid @enderror" name="nidn"
                                        value="{{ old('nidn') }}" required autocomplete="nidn" autofocus>

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
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        value="{{ old('password') }}" required autocomplete="password" autofocus>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label mx-5">{{ __('Confirm Password') }}</label>

                                <div class="mx-5">
                                    <input id="password-confirm" type="password"
                                        class="form-control @error('password-confirm') is-invalid @enderror"
                                        name="password-confirm" value="{{ old('password-confirm') }}" required
                                        autocomplete="password" autofocus>
                                </div>
                            </div>
                            {{-- 
                        <div class="mb-2">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
    
                            <div class="mx-5">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> --}}

                            <div class="mb-0">
                                <div class="d-grid mx-5">
                                    <button type="submit" class="btn bg-custom-primary text-white">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
