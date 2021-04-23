@extends('layouts.web')

@section('content')

<header class="bg-dark text-white" style="background-image: url({{ asset('img/background/1.jpg') }}); padding: 110px 0 80px;">
    <div class="container ">
        <div class="row">
        <div class="col-12">
            <h1 class="hero-header text-center text-lg-left text-uppercase">Moot Game</h1>
        </div>
        </div>
    </div>
</header>
<div class="container min-vh-80 mb-5">
    <div class="row justify-content-center">
        <div class="col-12  mt-5">
            <h3 class="text-center mb-0"><strong>Shall we play a game?</strong> </h3>
            <p class="text-center my-3"><small>We have something exciting planned for everyone taking part in Centenary Plus the 34th National Rover Scout Moot and we guarantee that it will be nothing but fun!</small> </p>
            <p class="text-center my-3"><small>Everyone registered for the Moot can take part in this game and the top scorers will get exciting rewards!</small> </p>
        </div>
        <div class="col-12">
            <p class="text-center my-3"><small>Here are the instructions:</small> </p>
        </div>
        <div class="col-lg-4 my-4 px-3">
            <a class="bg-transparent border-0 w-100 wow fadeInUp" href="{{ url('/game') }}" target="_blank">
                <img class="wow fadeInUp" width="100%" src="{{ asset('/img/Programme/moot/9.jpg') }}" alt="">
            </a>
        </div>
        <div class="chat col-lg-6 my-4 px-3">
            <div class="justify-content-center" >
                <ol class="">
                    <li>
                        <p class="my-4">The participant should log in to the game using a laptop or a  computer. This game does not support for mobile devices.</p>                
                    </li>
                    <li>
                        <p class="my-4">In this game, you have to catch the roosters.</p>                
                    </li>
                    <li>
                        <p class="my-4">You can control your self by left and right arrow keys. </p>                
                    </li>
                    <li>
                        <p class="my-4">You have to catch the maximum number of roosters during the given 90 seconds of time. </p>                
                    </li>
                    <li>
                        <p class="my-4">The leader board is shown with an icon of a crown in the main menu.</p>                
                    </li>
                    <li>
                        <p class="my-4">Top 3 scorers will be rewarded.</p>                
                    </li>
                </ol>

            </div>
        </div>
    </div>
</div>


@endsection


@section('script')


<script type="text/javascript">

    $(document).ready(function(){
        $('#myBtn2').addClass('d-none');
    });
</script>

@endsection