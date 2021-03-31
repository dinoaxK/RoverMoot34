@extends('layouts.web')

@section('content')
<header class="bg-dark text-white" style="background-image: url({{ asset('img/background/1.jpg') }}); padding: 110px 0 80px;">
    <div class="container ">
        <div class="row">
        <div class="col-12">
            <h1 class="hero-header text-center text-lg-left text-uppercase">Login</h1>
        </div>
        </div>
    </div>
    </header>
<div class="container min-vh-70">
    <div class="row justify-content-center">
        <div class="col-lg-8 mt-5">
            <p class="text-center">Login or Signup to get started with an unforgetable rover moot experience</p>
            
            <div class="pt-5">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row justify-content-center">
                        <label for="email" class="col-md-8 col-form-label text-center">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-8">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row  justify-content-center">
                        <label for="password" class="col-md-8 col-form-label text-center">{{ __('Password') }}</label>

                        <div class="col-md-8">                               
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <span toggle="#password-field" class="fa fa-fw fa-eye toggle-password text-primary" style="float: right; margin-right: 10px; margin-left: -25px; margin-top: -25px; position: relative; z-index: 2;"></span>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12 text-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-5">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-lg btn-primary m-2">
                                {{ __('Login') }}
                            </button>
                        </div>

                        <div class="col-md-12 text-center mt-1">
                            @if (Route::has('password.request'))
                            <a class="btn btn-link mb-0" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
                    </div>
                </form>

                {{-- <p class=" text-center mt-1 mb-5">Don't have a account yet? <a href="{{ route('register') }}">Sign up here</a></p> --}}
            </div>
        </div>
    </div>
</div>
@endsection
