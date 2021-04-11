@extends('layouts.web')

@section('content')

<header class="bg-dark text-white" style="background-image: url({{ asset('img/background/1.jpg') }}); padding: 110px 0 80px;">
    <div class="container ">
        <div class="row">
        <div class="col-12">
            <h1 class="hero-header text-center text-lg-left text-uppercase">Moot Events</h1>
        </div>
        </div>
    </div>
</header>
<div class="container min-vh-80 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-12 mt-5">
            <div class="py-5" >
                @if(Auth::user()->participant && Auth::user()->participant->application_status == 1 && Auth::user()->participant->payment_status == 1)

                    <h1 class="hero-header text-center text-white">Upcoming Next</h1>
                    <div class="row">
                        <div class="col-md-6 my-4 px-3">
                            <a class="bg-transparent border-0 w-100 wow fadeInUp" href="#">
                                <img class="wow fadeInUp" width="100%" src="{{ asset('/img/Programme/Premoot/3.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="col-md-6 my-4 px-3">
                            <p class="mb-0 wow fadeInUp"><small>Pre-moot Session three:</small></p>
                            <h2 class="wow fadeInUp">Disaster Management Training</h3>
                            <p class="wow fadeInUp">Online Training Programme (Webinar) collaboratively conducted with the Disaster Management Centre - Sri Lanka</p>
                            <p class="wow fadeInUp">Time: <span class=" text-success">17th April 2021 | 1930 hours (Local Time - Colombo/Sri Lanka)</span> </p>
                            <p class="wow fadeInUp">Platform: ZOOM</p>
                            <p class="wow fadeInUp">Register in advance for this webinar: </p>
                            <a href="https://us02web.zoom.us/meeting/register/tZcpf-CppzwsGtfoXpp_RiOsKCsH6hQcTBB9" target="_blank" class="wow fadeInUp btn btn-light btn-lg w-100">Click Here to Register</a>
                        </div>
                    </div>
                    <div class="row mt-5" id="programme">
                        <div class="col-lg-12">
                          <h1 class="text-center">Moot Programme</h1>
                            <p class=" text-center">The Moot programme will be carried out under two sections; specially programmed for your convenience</p>
                        </div>
                        <div class="col-lg-12 ">
                
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
                                    <h5 class="card-title text-center text-dark">Environmental Development Programme</h5>
                                    <p class="card-text text-dark">Global Environmental Awareness session will be conducted by UNDP - Sri Lanka</p>
                                  </div>
                                  <div class="card-footer bg-transparent border-0 text-center"><p class="card-text"><small class="text-muted">10th April 2021 | 18:30 Local Time (Sri Lanka)</small></p></div>
                                </div>
                                <div class="card wow fadeInUp" data-wow-delay="0.25s">
                                  <img src="{{ asset('/img/Programme/Premoot/1.jpg') }}" class="card-img-top" alt="Image">
                                  <div class="card-body">
                                    <h5 class="card-title text-center text-dark">New Youth Programme</h5>
                                    <p class="card-text text-dark">A Webinar to introduce the New Youth Rover Scouting Programme</p>
                                  </div>
                                  <div class="card-footer bg-transparent border-0 text-center"><p class="card-text"><small class="text-muted">11th April 2021 | 19:30 Local Time (Sri Lanka)</small></p></div>
                                </div>
                                <div class="card wow fadeInUp" data-wow-delay="0.5s">
                                  <img src="{{ asset('/img/Programme/Premoot/3.jpg') }}" class="card-img-top" alt="Image">
                                  <div class="card-body">
                                    <h5 class="card-title text-center text-dark">Disaster Management Training</h5>
                                    <p class="card-text text-dark">Online Training Programme (Webinar) collaboratively conducted with the Disaster Management Centre - Sri Lanka</p>
                                  </div>
                                  <div class="card-footer bg-transparent border-0 text-center"><p class="card-text"><small class="text-muted">17th April 2021 | 19:30 Local Time (Sri Lanka)</small></p></div>
                                </div>
                              </div>
                              <div class="card-deck mt-5">
                                <div class="card wow fadeInUp" data-wow-delay="0.75s">
                                  <img src="{{ asset('/img/Programme/Premoot/4.jpg') }}" class="card-img-top" alt="Image">
                                  <div class="card-body">
                                    <h5 class="card-title text-center text-dark">STD/ AIDS Awareness</h5>
                                    <p class="card-text text-dark">Online Training Programme (Webinar) on STD and HIV/AIDS prevention</p>
                                  </div>
                                  <div class="card-footer bg-transparent border-0 text-center"><p class="card-text"><small class="text-muted">18th April 2021 | 21:00 Local Time (Sri Lanka)</small></p></div>
                                </div>
                                <div class="card wow fadeInUp" data-wow-delay="1s">
                                  <img src="{{ asset('/img/Programme/Premoot/5.jpg') }}" class="card-img-top" alt="Image">
                                  <div class="card-body">
                                    <h5 class="card-title text-center text-dark">Rover Youth Forum Pre-Moot Session</h5>
                                    <p class="card-text text-dark">Releasing District Rover Video Presentation and the first session of Virtual Rover Youth Forum</p>
                                  </div>
                                  <div class="card-footer bg-transparent border-0 text-center"><p class="card-text"><small class="text-muted">19th April 2021 | 19:30 Local Time (Sri Lanka)</small></p></div>
                                </div>
                                <div class="card wow fadeInUp" data-wow-delay="1.25s">
                                  <img src="{{ asset('/img/Programme/Premoot/2.jpg') }}" class="card-img-top" alt="Image">
                                  <div class="card-body">
                                    <h5 class="card-title text-center text-dark">International Rover Programme</h5>
                                    <p class="card-text text-dark">Launching of the International Rover Scout Chat Room</p>
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
                                      <table class=" table text-center table-striped text-white">
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
                                      <table class=" table text-center table-striped text-white">
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
                                      <table class=" table text-center table-striped text-white">
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
                                      <table class=" table text-center table-striped text-white">
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
