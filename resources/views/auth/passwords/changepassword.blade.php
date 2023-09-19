@extends(auth()->user()->hasRole('dosen') ? 'layouts.dashboard' : 'layouts.akademik-dashboard')

@section('title')

@endsection

@section('content')
<div class="card shadow bg-white flex-row card-rounded">
    <div class="card-body my-auto">
        <div class="title">
            <i class="fas fa-unlock fa-lg pe-2"></i>
            <span class="fw-bold fs-5">CHANGE PASSWORD</span>
            <hr>
        </div>
        <main>
            <section class="intro">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form method="POST" action="{{ route('changepassword.update') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 mx-3">
                        <label for="current_password" class="col-form-label">{{ __('Current Password') }} <span class="text-danger"> *</span></label>
                        <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required>

                        @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="mb-3 mx-3">
                        <label for="new_password" class="col-form-label">{{ __('New Password') }} <span class="text-danger"> *</span></label>
                        <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required>

                        @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="mb-3 mx-3">
                        <label for="new_password_confirmation" class="col-form-label">{{ __('Confirm New Password') }} <span class="text-danger"> *</span></label>
                        <input id="new_password_confirmation" type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror" name="new_password_confirmation" required>

                        @error('new_password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="row my-4 mx-3">
                        <button type="submit" class="btn text-white" style="background-color: #8A00B9;">Change Password</button>
                    </div>
                </form>
            </section>
        </main>
    </div>
</div>
@endsection
