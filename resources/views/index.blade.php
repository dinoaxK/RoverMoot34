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


  <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
    @foreach($newss as $news)
      @if($loop->first)        
        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="active bg-dark"></li>
      @else
        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="bg-dark"></li>
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
  @if(date('Y-m-d')<='2021-04-23')
    <img src="{{ asset('/img/countdown/'.\Carbon\Carbon::parse('2021-04-24 00:00:00')->diffInDays(\Carbon\Carbon::now()).'.jpg') }}" alt="" width="100%">
  
  @endif
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
            <p class=" text-center">The Moot programme will be carried out under two sections; specially programmed for your convenience</p>
        </div>
        <div class="col-lg-12 ">
          <!-- <p class=" text-center">Stay Tuned!</p>  -->

          <ul class="nav nav-pills nav-fill ">
            <li class="nav-item border-info mx-5">
              <a class="nav-link active" id="pre_moot_fixtures-tab" data-toggle="pill" href="#pre_moot_fixtures" role="tab" aria-controls="pre_moot_fixtures" aria-selected="true">
                <div class="card bg-transparent border-0">
                  <div class="card-body">
                    Pre- Moot Fixtures
                  </div>
                </div>
              </a>
            </li>
            <li class="nav-item border-info mx-5">
              <a class="nav-link" id="moot_fixtures-tab" data-toggle="pill" href="#moot_fixtures" role="tab" aria-controls="moot_fixtures" aria-selected="true">
                <div class="card bg-transparent border-0">
                  <div class="card-body">
                    Moot Fixtures
                  </div>
                </div>
              </a>
            </li>
          </ul> 
          <p class=" text-center"><small>All the time slots are shown in 24 Hour format and in Local Time - Colombo/Sri Lanka (+0530) </small></p>  
          <div class="tab-content mx-3" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pre_moot_fixtures" role="tabpanel" aria-labelledby="pre_moot_fixtures-tab">
              <div class="card-deck ">
                <div class="card wow fadeInUp">
                  <img src="{{ asset('/img/Programme/Premoot/6.jpg') }}" class="card-img-top" alt="Image">
                  <div class="card-body">
                    <h5 class="card-title text-center">Environmental Development Programme</h5>
                    <p class="card-text">Global Environmental Awareness session will be conducted by UNDP - Sri Lanka</p>
                  </div>
                  <div class="card-footer bg-transparent border-0 text-center"><p class="card-text"><small class="text-muted">10th April 2021 | 18:30 Local Time (Sri Lanka)</small></p></div>
                </div>
                <div class="card wow fadeInUp" data-wow-delay="0.25s">
                  <img src="{{ asset('/img/Programme/Premoot/1.jpg') }}" class="card-img-top" alt="Image">
                  <div class="card-body">
                    <h5 class="card-title text-center">New Youth Programme</h5>
                    <p class="card-text">A Webinar to introduce the New Youth Rover Scouting Programme</p>
                  </div>
                  <div class="card-footer bg-transparent border-0 text-center"><p class="card-text"><small class="text-muted">11th April 2021 | 19:30 Local Time (Sri Lanka)</small></p></div>
                </div>
                <div class="card wow fadeInUp" data-wow-delay="0.5s">
                  <img src="{{ asset('/img/Programme/Premoot/3.jpg') }}" class="card-img-top" alt="Image">
                  <div class="card-body">
                    <h5 class="card-title text-center">Disaster Management Training</h5>
                    <p class="card-text">Online Training Programme (Webinar) collaboratively conducted with the Disaster Management Centre - Sri Lanka</p>
                  </div>
                  <div class="card-footer bg-transparent border-0 text-center"><p class="card-text"><small class="text-muted">17th April 2021 | 19:30 Local Time (Sri Lanka)</small></p></div>
                </div>
              </div>
              <div class="card-deck mt-5">
                <div class="card wow fadeInUp" data-wow-delay="0.75s">
                  <img src="{{ asset('/img/Programme/Premoot/4.jpg') }}" class="card-img-top" alt="Image">
                  <div class="card-body">
                    <h5 class="card-title text-center">STD/ AIDS Awareness</h5>
                    <p class="card-text">Online Training Programme (Webinar) on STD and HIV/AIDS prevention</p>
                  </div>
                  <div class="card-footer bg-transparent border-0 text-center"><p class="card-text"><small class="text-muted">18th April 2021 | 21:00 Local Time (Sri Lanka)</small></p></div>
                </div>
                <div class="card wow fadeInUp" data-wow-delay="1s">
                  <img src="{{ asset('/img/Programme/Premoot/5.jpg') }}" class="card-img-top" alt="Image">
                  <div class="card-body">
                    <h5 class="card-title text-center">Rover Youth Forum Pre-Moot Session</h5>
                    <p class="card-text">Releasing District Rover Video Presentation and the first session of Virtual Rover Youth Forum</p>
                  </div>
                  <div class="card-footer bg-transparent border-0 text-center"><p class="card-text"><small class="text-muted">19th April 2021 | 19:30 Local Time (Sri Lanka)</small></p></div>
                </div>
                <div class="card wow fadeInUp" data-wow-delay="1.25s">
                  <img src="{{ asset('/img/Programme/Premoot/2.jpg') }}" class="card-img-top" alt="Image">
                  <div class="card-body">
                    <h5 class="card-title text-center">International Rover Programme</h5>
                    <p class="card-text">Launching of the International Rover Scout Chat Room</p>
                  </div>
                  <div class="card-footer bg-transparent border-0 text-center"><p class="card-text"><small class="text-muted">21st April 2021 | 21:00 Local Time (Sri Lanka)</small></p></div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="moot_fixtures" role="tabpanel" aria-labelledby="moot_fixtures-tab">
              <div class="row">
                <div class="col-3">
                  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link text-center active" id="day1_tab" data-toggle="pill" href="#day1" role="tab" aria-controls="day1" aria-selected="true">Day 01</a>
                    <a class="nav-link text-center" id="day2_tab" data-toggle="pill" href="#day2" role="tab" aria-controls="day2" aria-selected="false">Day 02</a>
                    <a class="nav-link text-center" id="day3_tab" data-toggle="pill" href="#day3" role="tab" aria-controls="day3" aria-selected="false">Day 03</a>
                    <a class="nav-link text-center" id="day4_tab" data-toggle="pill" href="#day4" role="tab" aria-controls="day4" aria-selected="false">Day 04</a>
                  </div>
                </div>
                <div class="col-9">
                  <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active py-5" id="day1" role="tabpanel" aria-labelledby="day2_tab">
                      <h5 class=" text-center">23<sup>rd</sup> April 2021</h5>
                      <table class=" table text-center table-striped">
                        <tr>
                          <td>Opening Ceremony</td>
                          <td>18:00 Local Time (Sri Lanka)</td>
                        </tr>
                        <tr>
                          <td>BP Award Pathway (Q & A Session)</td>
                          <td>19:30 Local Time (Sri Lanka)</td>
                        </tr>
                        <tr>
                          <td>International Rover Exchange Programme</td>
                          <td>21:30 Local Time (Sri Lanka)</td>
                        </tr>
                        <tr>
                          <td>Moot Game Launch</td>
                          <td>22:30 Local Time (Sri Lanka)</td>
                        </tr>
                      </table>
                    </div>
                    <div class="tab-pane fade py-5" id="day2" role="tabpanel" aria-labelledby="day2_tab">
                      <h5 class=" text-center">24<sup>th</sup> April 2021</h5>
                      <table class=" table text-center table-striped">
                        <tr>
                          <td>Environmental Development Programme (Review)</td>
                          <td>18:15 Local Time (Sri Lanka)</td>
                        </tr>
                        <tr>
                          <td>100 Years Celebration</td>
                          <td>20:00 Local Time (Sri Lanka)</td>
                        </tr>
                        <tr>
                          <td>Cultural Show</td>
                          <td>21:45 Local Time (Sri Lanka)</td>
                        </tr>
                      </table>                      
                    </div>
                    <div class="tab-pane fade py-5" id="day3" role="tabpanel" aria-labelledby="day3_tab">
                      <h5 class=" text-center">25<sup>th</sup> April 2021</h5>
                      <table class=" table text-center table-striped">
                        <tr>
                          <td>Youth Forum</td>
                          <td>16:30 Local Time (Sri Lanka)</td>
                        </tr>
                        <tr>
                          <td>STD/ AIDS Awareness Programme Commissioning</td>
                          <td>18:30 Local Time (Sri Lanka)</td>
                        </tr>
                        <tr>
                          <td>Virtual Campfire</td>
                          <td>21:00 Local Time (Sri Lanka)</td>
                        </tr>
                        <tr>
                          <td>Torch Handover to 35<sup>th</sup> National RSM</td>
                          <td>22:00 Local Time (Sri Lanka)</td>
                        </tr>
                      </table>                      
                    </div>
                    <div class="tab-pane fade py-5" id="day4" role="tabpanel" aria-labelledby="day4_tab">
                      <h5 class=" text-center">26<sup>th</sup>  April 2021</h5>
                      <table class=" table text-center table-striped">
                        <tr>
                          <td>Career Guidance Programme</td>
                          <td>09:00 Local Time (Sri Lanka)</td>
                        </tr>
                        <tr>
                          <td>BP Guild Gathering</td>
                          <td>09:00 Local Time (Sri Lanka)</td>
                        </tr>
                        <tr>
                          <td>District Rover Disaster Acton Team Launch</td>
                          <td>13:00 Local Time (Sri Lanka)</td>
                        </tr>
                        <tr>
                          <td>Closing Ceremony</td>
                          <td>16:00 Local Time (Sri Lanka)</td>
                        </tr>
                      </table>                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>





  {{-- <section id="register" class="bg-light text-dark">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h5 class="text-center hero-header" style="font-size: 36px;">Register</h2>
        </div>
        
        <div class="col-lg-12 mx-auto">
          <p class=" text-center">To join the Virtual National Rover Scout Moot, you need to follow these steps.</p>

         
         
          <div class="row mb-5">
            <div class="col-12 my-3">
              <div class="card wow fadeInUp border-0 h-100">

                <div class="card-body p-0 m-0">
                  <iframe width="100%" height="300" src="https://www.youtube.com/embed/axVdtsRZcWA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                </div>
              </div>
            </div>

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

      </div>
    </div>
  </section> --}}

@endsection