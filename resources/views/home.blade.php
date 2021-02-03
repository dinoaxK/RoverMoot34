@extends('layouts.web')

@section('content')

<header class="bg-dark min-vh-100" style="background-image: url({{ asset('img/background/2.jpg') }}); padding: 200px 0 200px;">
<div class="container ">
    <div class="row">
    <div class="col-lg-5 order-lg-1 text-right">
        <img src="{{ asset('img/logo/1.png') }}" alt="Moot Logo"  style="max-width: 100%;" class="mb-5">
    </div>
    <div class="col-lg-7 order-lg-2">
        <h1 class="hero-header">34th National Centenary<br> Rover Scout Moot</h1>
        <p class="lead" style="font-size: 18px; font-weight: 500;">Welcome to the first ever virtual national rover scout moot</p>
        
        @if(Auth::user()->participant && Auth::user()->participant->application_status == 1 && Auth::user()->participant->payment_status == 1)
        
          <a href="{{ url('#carouselExampleIndicators') }}" class="btn  btn-outline-warning">Let's Start</a>
        @else
        <a href="{{ route('moot.register') }}" class="btn btn-lg btn-outline-rover">Register</a>
        @endif
    </div>
    </div>
</div>
</header>
<div class="container min-vh-80 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-9 mt-5">
            <div class="py-5">
                @if(Auth::user()->participant && Auth::user()->participant->application_status == 1 && Auth::user()->participant->payment_status == 1)


                    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
                        <ol class="carousel-indicators">
                        @foreach($newss as $news)
                        @if($loop->first)        
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="active"></li>
                        @else
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}"></li>
                        @endif

                        @endforeach
                        </ol>
                        <div class="carousel-inner">
                        @foreach($newss as $news)
                        @if ($loop->first)      
                            <div class="carousel-item active">
                                <img   src="{{ asset('/storage/news/'.$news->image) }}" style="height: auto;" class="d-block w-100" alt="Moot News">
                            </div>
                        @else
                            <div class="carousel-item">
                                <img src="{{ asset('/storage/news/'.$news->image) }}" style="height: auto;" class="d-block w-100" alt="Moot News">
                            </div>
                        @endif
                        
                        @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                        </a>
                    </div>




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
