@extends('layouts.web')

@section('content')
<header class="bg-dark text-white" style="background-image: url({{ asset('img/background/1.jpg') }}); padding: 110px 0 80px;">
    <div class="container ">
        <div class="row">
        <div class="col-12">
            <h1 class="hero-header text-center text-lg-left text-uppercase">Confirm Password</h1>
        </div>
        </div>
    </div>
    </header>
<div class="container min-vh-80 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 mt-5">
            <p class="text-center">{{ __('Please confirm your password before continuing.') }}</p>
            
            <div class="py-5">                    

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <div class="form-group row justify-content-center">
                        <label for="password" class="col-md-8 col-form-label text-center">{{ __('Password') }}</label>

                        <div class="col-md-8">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row justify-content-center mb-0">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-lg btn-primary">
                                {{ __('Confirm Password') }}
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

            </div>
        </div>
    </div>
</div>
@endsection
