@extends('layouts.web')

@section('content')
  <header class="bg-dark min-vh-100" style="background-image: url({{ asset('img/background/2.jpg') }}); padding: 200px 0 200px;">
    <div class="container ">
      <div class="row">
        <div class="col-lg-5 order-lg-1 text-right">
          <img src="{{ asset('img/logo/1.png') }}" alt="Moot Logo"  style="max-width: 100%;" class="mb-5">
        </div>
        <div class="col-lg-7 order-lg-2">
          <h1 class="hero-header">34th National <br> Rover Scout Moot</h1>
          <p class="lead" style="font-size: 18px; font-weight: 500;">Welcome to the first ever national rover scout moot</p>
          
          <a href="{{ route('moot.register') }}" class="btn btn-lg btn-outline-rover">Register Now!</a>
          <a href="{{ url('/#about') }}" class="btn  btn-outline-warning">Learn More</a>
        </div>
      </div>
    </div>
  </header>

  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>About the Moot</h2>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus sequi voluptatum quidem optio! Nisi assumenda illum, facilis doloremque quam obcaecati magnam, consequatur vel beatae totam tempore, vitae ducimus a autem.</p>
          
        </div>
      </div>
    </div>
  </section>

  <section id="programme" class="bg-light text-dark">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Programme</h2>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut optio velit inventore, expedita quo laboriosam possimus ea consequatur vitae, doloribus consequuntur ex. Nemo assumenda laborum vel, labore ut velit dignissimos.</p>
        </div>
      </div>
    </div>
  </section>


  <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
    @foreach($newss as $news)
        @if ($loop->first)
        
      <div class="carousel-item active">
          <img src="{{ asset('/storage/news/'.$news->image) }}" style="height: auto;" class="d-block w-100" alt="Moot News">
      </div>
    @endif
      <div class="carousel-item">
          <img src="{{ asset('/storage/news/'.$news->image) }}" style="height: auto;" class="d-block w-100" alt="Moot News">
      </div>
      
    @endforeach
    </div>
  </div>


  <section id="register" class="bg-light text-dark">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Register</h2>
          <p>To join with the Virtual National Rover Scout Moot, You need to follow these steps.</p>
          <ul>
            <li>
              <p>
                Step 01: Sign up and create your account with your email and password (You need to verify your email to complete signup)
              </p>
            </li>
            <li>
              <p>
                Step 02: Complete your Rover Moot Registration Payment to the below account and  
              </p>
            </li>
            <li>
              <p>
                Step 03: Go to Register and fill out the Rover Moot Application providing all the required details including the photo of your paid bank slip or receipt. (You can save your details and submit your application later, your details will be editable until you submit)
              </p>
            </li>
            <li>
              <p>
                Step 04: After submitting the application, Print the auto generated application and get it verified by your Rover Scout Master, Your District's Asst. District Commissioner (Rovers) And District Commissioner with their relevant stamps.
              </p>
            </li>
            <li>
              <p>
                Step 05: Go to "Register" and Upload a clear photo of your signed application.
              </p>
            </li>
          </ul>

          <p>You'll be notified by email once your application and payment is approved.</p>
          <p>Both your Application and Payment will need to be approved to complete your registration.</p>
          <p>Only registered participants will be able to access the Moot page and other Moot benefits (e.g. Moot Scarf, Certificate etc.).</p>
        </div>
        <div class="col-lg-4 justify-content-center" style="background-image:url({{ asset('img/background/mascot1.jpg') }});">
        
        </div>
      </div>
    </div>
  </section>
@endsection