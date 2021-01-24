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
                @if(Auth::user()->participant && Auth::user()->participant->application_status == 1)

                @else
                    <div class="alert alert-warning" role="alert">
                        <h2 class="alert-heading">Register Now!</h4>
                        <p>Moot will be available as soon as you are registered!! </p>
                        <p class="mb-0">Stay tuned for the First Ever Virtual National Rover Scout Moot...</p>
                    </div>          
                @endif
            </div>
        </div>
    </div>
</div>


@endsection
