@extends('layouts.web')

@section('content')
  <header class="bg-dark min-vh-100" style="background-image: url({{ asset('img/background/2.jpg') }}); padding: 200px 0 200px;">
    <div class="container ">
      <div class="row">
        <div class="col-lg-5 order-lg-1 text-right">
          <img src="{{ asset('img/logo/1.png') }}" alt="Moot Logo"  style="max-width: 100%;" class="mb-5">
        </div>
        <div class="col-lg-7 order-lg-2">
          <h1 class="hero-header">34th National Centenary <br> Rover Scout Moot</h1>
          {{-- <p class="lead" style="font-size: 18px; font-weight: 500;">Welcome to the first ever virtual national rover scout moot</p> --}}
          <p class="lead" style="font-size: 18px; font-weight: 500;">Celebrating 100 years of Rover Scouting in Sri Lanka</p>
          
          <a href="{{ route('moot.register') }}" class="btn btn-lg btn-outline-rover">Register Now!</a>
          <a href="{{ url('/#about') }}" class="btn  btn-outline-warning">Learn More</a>
        </div>
      </div>
    </div>
  </header>

  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h5 class="text-center hero-header text-white" style="font-size: 36px;">About the Moot</h2>
        </div>
        <div class="col-lg-8 mx-auto">
          <p class="lead text-center">34th National Rover Moot- the biannual gathering of Rover Scouts of Sri Lanka Scout Association, will be held virtually from 25th to 28th of March 2021 via Zoom, Facebook & YouTube. Young scouts between the age of 17 to 26 years are eligible to participate in this camp.</p>
          <p class="lead text-center">Rover scouting was initiated in Sri Lanka in 1920. Since its inception, Rover scouting has grown up to a larger platform which gathers the youth of the country, mentoring  them to lead a successful adult life utilising the guidance and the philosophy for a thriving adulthood mentioned in "Rovering to Success"  the life-guide book for Rovers written by Baden-Powell himself..</p>
          <p class="lead text-center">While celebrating  the Rover Centenary, the 34th National Rover Moot will provide  an opportunity to the creative young Rovers to take part in the Moot logo and theme competition from which an official logo and a theme for the Moot will be selected. The competition will be launched on the [date]  and we invite all the talented Rovers out there to take part in this as an initial step of celebrating the centenary.</p>
         
          
        </div>
      </div>
    </div>
  </section>

  <section id="joinus" class="bg-light text-dark" style="background-image: url({{ asset('img/background/1.jpg') }});">
    <div class="container my-0 py-0" >
          <h5 class="text-center hero-header" style="font-size: 20px;">Join hands with us today to celebrate the service, unity and fellowship of 100 years!</h1>
    </div>
  </section>

  <section id="programme" class="bg-light text-dark" >
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h5 class="text-center hero-header" style="font-size: 36px;">Programme</h2>
        </div>
        <div class="col-lg-12 mx-0 px-0">
          <p class=" text-center">Coming Soon!</p> 
          <!-- <img src="{{ asset('img/background/comming-soon.jpg') }}" width="100%" alt=""> -->
        </div>
      </div>
    </div>
  </section>


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


  <section id="register" class="bg-light text-dark">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h5 class="text-center hero-header" style="font-size: 36px;">Register</h2>
        </div>
        <div class="col-lg-8 mx-auto">
          <p>To join the Virtual National Rover Scout Moot, you need to follow these steps.</p>
          <ul>
            <li>
              <p>
                Step 01: Sign up and create an account with your email and password (You need to verify your email to complete signup)
              </p>
            </li>
            <li>
              <p>
                Step 02: Complete your Rover Moot Registration Payment (Rs. 300.00) to the account below and snap a photo of the payment proof (e.g. Bank Slip) 
              </p>
            </li>
            <li>
              <p>
                Step 03: Go to Register and fill out the Rover Moot Application providing all the required details including the photo of your paid bank slip (Registration Fee: Rs. 300.00) or receipt. (You can save your details and submit your application later. your details will be editable until you submit)
              </p>
            </li>
            <li>
              <p>
                Step 04: After submitting the application, print the auto generated application and get it verified by your Rover Scout Master, Your District's Asst. District Commissioner (Rovers) And District Commissioner with their relevant stamps.
              </p>
            </li>
            <li>
              <p>
                Step 05: Go to "Register" and upload a clear photo of your signed application.
              </p>
            </li>
          </ul>

          <p>You'll be notified by email once your application and payment is approved.</p>
          <p>Both your Application and Payment will need to be approved to complete your registration.</p>
          <p>Only registered participants will be able to access the Moot page and other Moot benefits (e.g. Moot Scarf, Certificate etc.).</p>
        </div>
        {{-- <div class="col-lg-4 justify-content-center" style="background-image:url({{ asset('img/background/mascot1.jpg') }});">
        
        </div> --}}
      </div>
    </div>
  </section>
@endsection