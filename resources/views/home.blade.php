@extends('layouts.web')

@section('content')
<header class="bg-dark min-vh-100" style="background-image: url({{ asset('img/background/1.jpg') }}); padding: 200px 0 200px;">
<div class="container ">
    <div class="row">
    <div class="col-lg-5 order-lg-1 text-right">
        <img src="{{ asset('img/logo/1.png') }}" alt="Moot Logo"  style="max-width: 100%;" class="mb-5">
    </div>
    <div class="col-lg-7 order-lg-2">
        <h1 class="hero-header">34th National <br> Rover Scout Moot</h1>
        <p class="lead" style="font-size: 18px; font-weight: 500;">Welcome to the first ever national rover scout moot</p>
        
        <a href="{{ route('moot.register') }}" class="btn btn-lg btn-outline-rover">Register</a>
    </div>
    </div>
</div>
</header>
<div class="container min-vh-80 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-9 mt-5">
            <div class="py-5">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
            </div>
        </div>
    </div>
</div>


@endsection
