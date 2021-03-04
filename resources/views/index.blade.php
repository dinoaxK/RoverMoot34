@extends('layouts.web')

@section('content')
  <header class="bg-dark min-vh-100" style="background-image: url({{ asset('img/background/2.jpg') }}); padding: 200px 0 200px;">
    <div class="container ">
      <div class="row">
        <div class="col-lg-5 order-lg-1 text-right">
          <img src="{{ asset('img/logo/1.png') }}" alt="Moot Logo"  style="max-width: 100%;" class="mb-5">
        </div>
        <div class="col-lg-7 order-lg-2">
          <h1 class="hero-header wow pulse">34th National Centenary <br> Rover Scout Moot</h1>
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
          <p class="lead text-center">34th National Rover Moot- the biannual gathering of Rover Scouts of Sri Lanka Scout Association, will be held virtually from 23rd to 26th of April 2021 via Zoom, Facebook & YouTube. Young scouts between the age of 17 to 26 years are eligible to participate in this camp.</p>
          <p class="lead text-center">Rover scouting was initiated in Sri Lanka in 1920. Since its inception, Rover scouting has grown up to a larger platform which gathers the youth of the country, mentoring  them to lead a successful adult life utilising the guidance and the philosophy for a thriving adulthood mentioned in "Rovering to Success"  the life-guide book for Rovers written by Baden-Powell himself..</p>
          <p class="lead text-center">While celebrating  the Rover Centenary, the 34th National Rover Moot will provide  an opportunity to the creative young Rovers to take part in various pre-moot and moot activities</p>
         
          
        </div>
      </div>
    </div>
  </section>

  <section class="my-0 py-0">
    <img src="{{ asset('/img/countdown/'.\Carbon\Carbon::parse('2021-04-24 00:00:00')->diffInDays(\Carbon\Carbon::now()).'.jpg') }}" alt="" width="100%">
  </section>

  <section id="facts" class="bg-light text-dark">
    <div class="container wow fadeInUp">
      <div class="row counters">
        <div class="col-lg-4 col-12 text-center">
          <span data-toggle="counter-up">1000</span>
          <p>+ Participants</p>
        </div>

        <div class="col-lg-4 col-12 text-center">
          <span data-toggle="counter-up">37</span>
          <p>Districts</p>
        </div>

        <div class="col-lg-4 col-12 text-center">
          <span data-toggle="counter-up">4</span>
          <p>Days</p>
        </div>

      </div>

    </div>
  </section><!-- #facts -->

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
          <p class=" text-center">Stay Tuned!</p> 
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
        <div class="col-lg-12 mx-auto">
          <p class=" text-center">To join the Virtual National Rover Scout Moot, you need to follow these steps.</p>

          <div class="row mb-5">

            <div class="col-lg-6 my-3">
              <div class="card wow fadeInUp border-0 h-100">
                <div class="card-header bg-transparent border-0">
                  Step 01
                </div>

                <div class="card-body">
                  <p>
                    Go to login to Sign up and create an account with your email and password (You need to verify the email to complete your signup)
                  </p>
                </div>
              </div>
            </div>

            <div class="col-lg-6 my-3">
              <div class="card border-0 wow fadeInUp h-100" data-wow-delay="0.25s">
                <div class="card-header bg-transparent border-0">
                  Step 02
                </div>

                <div class="card-body">
                  <p>
                    Complete your Rover Moot Registration Payment <span class=" text-danger">(Rs. 300.00)</span> to the account below or by visiting National Scout Head Quarters; and snap a photo of the payment proof (e.g. Bank Slip) <br> <br>
                 
                  </p>
                </div>
              </div>
            </div>
            
            <div class="col-lg-6 my-3">
              <div class="card wow fadeInUp border-0 h-100" data-wow-delay="0.5s">
                <div class="card-header bg-transparent border-0">
                  Step 03
                </div>

                <div class="card-body">
                  <p>
                    Go to Register and fill out the Rover Moot Application providing all the required details including the photo of your paid bank slip or receipt. (You can save your details and submit your application later. your details will be editable until you submit)
                  </p>
                </div>
              </div>
            </div>
            
            <div class="col-lg-6 my-3">
              <div class="card border-0 wow fadeInUp h-100" data-wow-delay="0.75s">
                <div class="card-header bg-transparent border-0">
                  Step 04
                </div>

                <div class="card-body">
                  <p>
                    After submitting the application, print the auto generated application and get it verified by your Rover Scout Master, Your District's Asst. District Commissioner (Rovers) And District Commissioner with their relevant stamps.
                  </p>
                </div>
              </div>
            </div>
                        
            <div class="col-lg-6 my-3">
              <div class="card wow fadeInUp border-0 h-100" data-wow-delay="1s">
                <div class="card-header bg-transparent border-0">
                  Step 05
                </div>

                <div class="card-body">
                  <p>
                    Go to "Register" and upload a clear photo of your signed application.
                  </p>
                </div>
              </div>
            </div>
            
            <div class="col-lg-6 my-3">
              <div class="card border-0 wow fadeInUp bg-secondary text-light h-100" data-wow-delay="1.25s">
                <div class="card-header bg-transparent border-0">
                  Bank Details
                </div>

                <div class="card-body">
                  <p>
                    <small>When the deposit is made, please specify “ROVER MOOT 2021 / DISTRICT” in the Bank Deposit slip<br><br> </small>                                     
                    Account No: 2041 0015 0085 323<br>
                    Bank: Peoples Bank<br>
                    Branch: Head Office Branch, Colombo-02<br><br>

                    <small>(All Payments should be made payable in “Colombo”, and in favour of “Sri Lanka Scout Association”)</span>
                  </p>
                </div>
              </div>
            </div>

          </div>

          <div class="row justify-content-center px-5">

            <p>You'll be notified by email once your application and payment is approved.</p>
            <p>Both your Application and Payment must be approved to complete your moot registration.</p>
            <p>Only registered participants will be able to access the Moot page and other Moot benefits (e.g. Moot Scarf, Certificate etc.).</p>
  
            <a class="btn btn-lg btn-outline-rover w-50 my-5 wow fadeInUp" href="{{ route('moot.register') }}">Register Now!</a>
          </div>
        </div>
        {{-- <div class="col-lg-4 justify-content-center" style="background-image:url({{ asset('img/background/mascot1.jpg') }});">
        
        </div> --}}
      </div>
    </div>
  </section>
@endsection