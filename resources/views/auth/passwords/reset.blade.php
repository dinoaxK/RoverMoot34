@extends('layouts.web')

@section('content')
<header class="bg-dark text-white" style="background-image: url({{ asset('img/background/1.jpg') }}); padding: 110px 0 80px;">
    <div class="container ">
        <div class="row">
        <div class="col-12">
            <h1 class="hero-header text-center text-lg-left text-uppercase">Reset Password</h1>
        </div>
        </div>
    </div>
</header>
<div class="container min-vh-80 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 mt-5">
            <div class="py-5">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group row justify-content-center">
                        <label for="email" class="col-md-8 col-form-label text-center">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-8">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <label for="password" class="col-md-8 col-form-label text-center">{{ __('Password') }}</label>

                        <div class="col-md-8">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <label for="password-confirm" class="col-md-8 col-form-label text-center">{{ __('Confirm Password') }}</label>

                        <div class="col-md-8">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row justify-content-center mt-5  mb-0">
                        <div class="col-md-6  text-center">
                            <button type="submit" class="btn btn-lg btn-primary">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
