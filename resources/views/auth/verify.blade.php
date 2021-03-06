@extends('layouts.web')

@section('content')
<header class="bg-dark text-white" style="background-image: url({{ asset('img/background/1.jpg') }}); padding: 110px 0 80px;">
    <div class="container ">
        <div class="row">
        <div class="col-12">
            <h1 class="hero-header text-center text-lg-left text-uppercase">Verify Your Email</h1>
        </div>
        </div>
    </div>
</header>
<div class="container min-vh-80 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-9 mt-5">
            <div class="py-5">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif                       
                    <div class="alert alert-info" role="alert">
                        <h2 class="text-center alert-heading">{{ __('Before proceeding, please check your email for a verification link.') }}</h4>
                        <hr>
                        <p  class="text-center">{{ __('If you did not receive the email') }},</p>
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            
                            <div class="form-group row mt-2 mb-0">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-lg btn-link p-0 m-0 align-baseline text-center">{{ __('click here to request another') }}</button>.
                                
                                
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
