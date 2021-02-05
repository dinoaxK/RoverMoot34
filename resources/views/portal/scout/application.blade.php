@extends('layouts.web')

@section('content')

<style>
@page {
    size: 21cm 29.7cm;
    /* margin: 30mm 45mm 30mm 45mm; */
     /* change the margins as you want them to be. */
}
</style>
<div class="pt-0 mt-0 ml-5" style="padding: 110px 0 80px;">
    <div class="container ">
        <div class="row">
          <div class="col-12 justify-content-center">
              <h3 class="print-header text-center text-uppercase">34th Natonal Rover Moot - Virtual (Based in Kandy)</h3>
              <h3 class="text-center text-dark text-uppercase">25th - 28th March, 2021</h3>
              <h3 class="print-header text-center text-dark text-uppercase">Participant's Registration</h3>
              <h3 class="text-right text-dark text-uppercase p-0 m-0"><small>(Office Use Only)</small> Serial-No: {{ $participant->id }} | {{ $participant->submit_date }}</h3>
          </div>
        </div>
<hr>
        <div class="row">
          <div class="col-3">
              <p class="text-dark text-uppercase">Registered As:</p>
          </div>
          <div class="col-9">                
              <p class="text-dark text-uppercase">{{ $participant->participant_type }}</p>
          </div>
        </div>

        <div class="row">
          <div class="col-3">
              <p class="text-dark text-uppercase">Rover Crew:</p>
          </div>
          <div class="col-9">                
              <p class="text-dark text-uppercase">{{ $participant->crew_number }} {{ $participant->crew_district }} {{ $participant->crew_name }}</p>
          </div>
        </div>             
        
        <h6 class="text-center text-dark text-uppercase mt-3">Personal Details</h6>
      <hr>
        
        <div class="row">
            <div class="col-9">
                <div class="row">
                    <div class="col-4">
                        <p class="text-dark text-uppercase">Full Name:</p>
                    </div>
                    <div class="col-8">                
                        <p class="text-dark text-uppercase">{{ $participant->title }} {{ $participant->full_name }}</p>
                    </div>
                  </div>
          
                          
                  <div class="row">
                    <div class="col-4">
                        <p class="text-dark text-uppercase">Name with Initials:</p>
                    </div>
                    <div class="col-8">                
                        <p class="text-dark text-uppercase">{{ $participant->initials }} {{ $participant->last_name }}</p>
                    </div>
                  </div>
          
                  
                  <div class="row">
                    <div class="col-4">
                        <p class="text-dark text-uppercase">Date of Birth:</p>
                    </div>
                    <div class="col-8">                
                        <p class="text-dark text-uppercase">{{ $participant->dob }}</p>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-4">
                        <p class="text-dark text-uppercase">{{ $participant->id_type }}: </p>
                    </div>
                    <div class="col-8">                
                        <p class="text-dark text-uppercase">{{ $participant->number }}</p>
                    </div>
                  </div>
            </div>
            <div class="col-3">
                <img src="{{ asset('storage/participants/profile_images/'.$participant->image) }}" alt="Profile Image" style="max-height: 200px; max-width: 200px;">
            </div>
        </div>

        <h6 class="text-center text-dark text-uppercase mt-3">Contact Details</h6>
    <hr>

        <div class="row">
          <div class="col-3">
              <p class="text-dark text-uppercase">Address:</p>
          </div>
          <div class="col-9">                
              <p class="text-dark text-uppercase">{{ $participant->address }}</p>
          </div>
        </div>

        <div class="row">
          <div class="col-3">
              <p class="text-dark text-uppercase">Country:</p>
          </div>
          <div class="col-9">                
              <p class="text-dark text-uppercase">{{ $participant->country }} {{ $participant->zip }}</p>
          </div>
        </div>


        <div class="row">
          <div class="col-3">
              <p class="text-dark text-uppercase">Telephone (Mobile): </p>
          </div>
          <div class="col-3">                
              <p class="text-dark text-uppercase">{{ $participant->mobile }}</p>
          </div>
          <div class="col-3">
              <p class="text-dark text-uppercase">Telephone (Other): </p>
          </div>
          <div class="col-3">                
              <p class="text-dark text-uppercase">{{ $participant->telephone }}</p>
          </div>
        </div>


        <div class="row">
          <div class="col-3">
              <p class="text-dark text-uppercase">Email:</p>
          </div>
          <div class="col-9">                
              <p class="text-dark ">{{ $participant->user->email }}</p>
          </div>
        </div>        
        
        <div class="row">
          <div class="col-3">
              <p class="text-dark text-uppercase">Email:</p>
          </div>
          <div class="col-9">                
              <p class="text-dark ">{{ $participant->contact_person_title }} {{ $participant->contact_person_name }}</p>
          </div>
        </div>


        <div class="row">
          <div class="col-3">
              <p class="text-dark text-uppercase">Telephone (Mobile): </p>
          </div>
          <div class="col-3">                
              <p class="text-dark text-uppercase">{{ $participant->contact_person_mobile }}</p>
          </div>
          <div class="col-3">
              <p class="text-dark text-uppercase">Telephone (Other): </p>
          </div>
          <div class="col-3">                
              <p class="text-dark text-uppercase">{{ $participant->contact_person_telephone }}</p>
          </div>
        </div>
       


        <h6 class="text-center text-dark text-uppercase mt-3">Scouting Details</h6>
    <hr>

        <div class="row">
          <div class="col-3">
              <p class="text-dark text-uppercase">Highest Scout Award: </p>
          </div>
          <div class="col-5">                
              <p class="text-dark text-uppercase">{{ $participant->scout_award }}</p>
          </div>
          <div class="col-2">
              <p class="text-dark text-uppercase">Date: </p>
          </div>
          <div class="col-2">                
              <p class="text-dark text-uppercase">{{ $participant->scout_award_date }}</p>
          </div>
        </div>

        
        <div class="row">
          <div class="col-3">
              <p class="text-dark text-uppercase">Highest Rover Scout Award: </p>
          </div>
          <div class="col-5">                
              <p class="text-dark text-uppercase">{{ $participant->rover_award }}</p>
          </div>
          <div class="col-2">
              <p class="text-dark text-uppercase">Date: </p>
          </div>
          <div class="col-2">                
              <p class="text-dark text-uppercase">{{ $participant->rover_award_date }}</p>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <h5 class="text-dark text-uppercase">Warrant Details: </h5>
          </div>
          <div class="col-1">
              <p class="text-dark text-uppercase">Number: </p>
          </div>
          <div class="col-2">                
              <p class="text-dark text-uppercase">{{ $participant->warrant_number }}</p>
          </div>
          <div class="col-1">
              <p class="text-dark text-uppercase">Section: </p>
          </div>
          <div class="col-4">                
              <p class="text-dark text-uppercase">{{ $participant->warrant_rank }} {{ $participant->warrant_section }}</p>
          </div>
          <div class="col-2">
              <p class="text-dark text-uppercase">valid Till: </p>
          </div>
          <div class="col-2">                
              <p class="text-dark text-uppercase">{{ $participant->warrant_expire }}</p>
          </div>
        </div>


        <div class="row">
          <div class="col-3">
              <p class="text-dark text-uppercase">Educational/ Job Details:</p>
          </div>
          <div class="col-9">                
              <p class="text-dark text-uppercase ">{{ $participant->education }}</p>
          </div>
        </div>


        <h6 class="text-center text-dark text-uppercase mt-3">Recommendations (Signatures)</h6>
    <hr class="mb-0 pb-5">

    <div class="row justify-content-center">
      <div class="col-4">
          <p class="text-center mb-2 pb-0">______________________</p>
      </div>
      <div class="col-4">
          <p class="text-center mb-2 pb-0">______________________</p>
      </div>
      <div class="col-4">
          <p class="text-center mb-2 pb-0">______________________</p>
      </div>
      <div class="col-4 mt-0">
          <p class="text-center text-dark">Rover Scout Master</p>
      </div>
      <div class="col-4 mt-0">
          <p class="text-center text-dark">ADC (Rovers)</p>
      </div>
      <div class="col-4 mt-0">
          <p class="text-center text-dark">District Commissioner</p>
      </div>
      <div class="col-4 mt-0">
          <p class="text-center text-light">------Name Or Stamp------</p>
      </div>
      <div class="col-4 mt-0">
          <p class="text-center text-light">------Name Or Stamp------</p>
      </div>
      <div class="col-4 mt-0">
          <p class="text-center text-light">------Stamp------</p>
      </div>
    </div>


    </div>
</div>







@include('portal.scout.application.scripts')
@endsection