@extends('layouts.web')

@section('content')
<header class="bg-dark text-white" style="background-image: url({{ asset('img/background/1.jpg') }}); padding: 110px 0 80px;">
    <div class="container ">
        <div class="row">
        <div class="col-12">
            <h1 class="hero-header text-center text-lg-left text-uppercase">Profile</h1>
        </div>
        </div>
    </div>
</header>
<div class="container min-vh-80 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-9 mt-5">
            <div class="py-5">

                @if( $participant != NULL )

                <div class="row">
                    <div class="col-3">
                        <p class="text-white text-uppercase">Registered As:</p>
                    </div>
                    <div class="col-9">                
                        <p class="text-white text-uppercase">{{ $participant->participant_type }}</p>
                    </div>
                  </div>
          
                  <div class="row">
                    <div class="col-3">
                        <p class="text-white text-uppercase">Rover Crew:</p>
                    </div>
                    <div class="col-9">                
                        <p class="text-white text-uppercase">{{ $participant->crew_number }} {{ $participant->crew_district }} {{ $participant->crew_name }}</p>
                    </div>
                  </div>             
                  
                  <h6 class="text-center text-white text-uppercase mt-3">Personal Details</h6>
                <hr class="bg-success">
                  
                  <div class="row">
                      <div class="col-9">
                          <div class="row">
                              <div class="col-4">
                                  <p class="text-white text-uppercase">Full Name:</p>
                              </div>
                              <div class="col-8">                
                                  <p class="text-white text-uppercase">{{ $participant->title }} {{ $participant->full_name }}</p>
                              </div>
                            </div>
                    
                                    
                            <div class="row">
                              <div class="col-4">
                                  <p class="text-white text-uppercase">Name with Initials:</p>
                              </div>
                              <div class="col-8">                
                                  <p class="text-white text-uppercase">{{ $participant->initials }} {{ $participant->last_name }}</p>
                              </div>
                            </div>
                    
                            
                            <div class="row">
                              <div class="col-4">
                                  <p class="text-white text-uppercase">Date of Birth:</p>
                              </div>
                              <div class="col-8">                
                                  <p class="text-white text-uppercase">{{ $participant->dob }}</p>
                              </div>
                            </div>
                            
                            <div class="row">
                              <div class="col-4">
                                  <p class="text-white text-uppercase">{{ $participant->id_type }}: </p>
                              </div>
                              <div class="col-8">                
                                  <p class="text-white text-uppercase">{{ $participant->number }}</p>
                              </div>
                            </div>
                      </div>
                      <div class="col-3">
                          <img src="{{ asset('storage/participants/profile_images/'.$participant->image) }}" alt="Profile Image" width="200px">
                      </div>
                  </div>
          
                  <h6 class="text-center text-white text-uppercase mt-3">Contact Details</h6>
              <hr class="bg-success">
          
                  <div class="row">
                    <div class="col-3">
                        <p class="text-white text-uppercase">Address:</p>
                    </div>
                    <div class="col-9">                
                        <p class="text-white text-uppercase">{{ $participant->address }}</p>
                    </div>
                  </div>
          
                  <div class="row">
                    <div class="col-3">
                        <p class="text-white text-uppercase">Country:</p>
                    </div>
                    <div class="col-9">                
                        <p class="text-white text-uppercase">{{ $participant->country }} {{ $participant->zip }}</p>
                    </div>
                  </div>
          
          
                  <div class="row">
                    <div class="col-3">
                        <p class="text-white text-uppercase">Telephone (Mobile): </p>
                    </div>
                    <div class="col-3">                
                        <p class="text-white text-uppercase">{{ $participant->mobile }}</p>
                    </div>
                    <div class="col-3">
                        <p class="text-white text-uppercase">Telephone (Other): </p>
                    </div>
                    <div class="col-3">                
                        <p class="text-white text-uppercase">{{ $participant->telephone }}</p>
                    </div>
                  </div>
          
          
                  <div class="row">
                    <div class="col-3">
                        <p class="text-white text-uppercase">Email:</p>
                    </div>
                    <div class="col-9">                
                        <p class="text-white ">{{ $participant->user->email }}</p>
                    </div>
                  </div>
          
          
                  <div class="row">
                    <div class="col-3">
                        <p class="text-white text-uppercase">Telephone (Mobile): </p>
                    </div>
                    <div class="col-3">                
                        <p class="text-white text-uppercase">{{ $participant->contact_person_mobile }}</p>
                    </div>
                    <div class="col-3">
                        <p class="text-white text-uppercase">Telephone (Other): </p>
                    </div>
                    <div class="col-3">                
                        <p class="text-white text-uppercase">{{ $participant->contact_person_telephone }}</p>
                    </div>
                  </div>
                 
          
          
                  <h6 class="text-center text-white text-uppercase mt-3">Scouting Details</h6>
              <hr class="bg-success">
          
                  <div class="row">
                    <div class="col-3">
                        <p class="text-white text-uppercase">Highest Scout Award: </p>
                    </div>
                    <div class="col-5">                
                        <p class="text-white text-uppercase">{{ $participant->scout_award }}</p>
                    </div>
                    <div class="col-2">
                        <p class="text-white text-uppercase">Date: </p>
                    </div>
                    <div class="col-2">                
                        <p class="text-white text-uppercase">{{ $participant->scout_award_date }}</p>
                    </div>
                  </div>
          
                  
                  <div class="row">
                    <div class="col-3">
                        <p class="text-white text-uppercase">Highest Rover Scout Award: </p>
                    </div>
                    <div class="col-5">                
                        <p class="text-white text-uppercase">{{ $participant->rover_award }}</p>
                    </div>
                    <div class="col-2">
                        <p class="text-white text-uppercase">Date: </p>
                    </div>
                    <div class="col-2">                
                        <p class="text-white text-uppercase">{{ $participant->rover_award_date }}</p>
                    </div>
                  </div>
          
                  <div class="row">
                    <div class="col-12">
                      <h5 class="text-white text-uppercase">Warrant Details: </h5>
                    </div>
                    <div class="col-1">
                        <p class="text-white text-uppercase">Number: </p>
                    </div>
                    <div class="col-3">                
                        <p class="text-white text-uppercase">{{ $participant->warrant_number }}</p>
                    </div>
                    <div class="col-1">
                        <p class="text-white text-uppercase">Section: </p>
                    </div>
                    <div class="col-3">                
                        <p class="text-white text-uppercase">{{ $participant->warrant_section }}</p>
                    </div>
                    <div class="col-2">
                        <p class="text-white text-uppercase">valid Till: </p>
                    </div>
                    <div class="col-2">                
                        <p class="text-white text-uppercase">{{ $participant->warrant_expire }}</p>
                    </div>
                  </div>
          
          
                  <div class="row">
                    <div class="col-3">
                        <p class="text-white text-uppercase">Educational/ Job Details:</p>
                    </div>
                    <div class="col-9">                
                        <p class="text-white text-uppercase ">{{ $participant->education }}</p>
                    </div>
                  </div>


                @else

                    <div class="alert alert-warning" role="alert">
                        <h2 class="alert-heading">Register Now!</h4>
                        
                        <p class="mb-0">Stay tuned for the First Ever Virtual National Rover Scout Moot...</p>
                    </div>
                    
                @endif

            </div>
        </div>
    </div>
</div>


@include('portal.scout.register.scripts')

@endsection
