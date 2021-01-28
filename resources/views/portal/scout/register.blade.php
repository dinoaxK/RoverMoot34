@extends('layouts.web')

@section('content')
<header class="bg-dark text-white" style="background-image: url({{ asset('img/background/1.jpg') }}); padding: 110px 0 80px;">
    <div class="container ">
        <div class="row">
        <div class="col-12">
            <h1 class="hero-header text-center text-lg-left text-uppercase">Register</h1>
        </div>
        </div>
    </div>
</header>
<div class="container min-vh-80 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-9 mt-5">
            <div class="py-5">
            
                <p>Fields Marked with (*) are Mandatory.</p>

            @if( $participant != NULL && $participant->application_submit == 1 && $participant->payment_submit == 1 )
                
           
            
            @else


                <form id="scoutRegisterForm">
                    @csrf
                @if($participant != NULL && $participant->image != NULL)
                
                    <h3 class="text-left mt-4 mb-4">Profile Image</h3>
                    <hr class="bg-success">
                    <div class="form-row justify-content-center mt-5">
                        <div class="col-lg">
                            <div class="form-group">
                                <div class="drop-zone" style="background: url({{ asset('storage/participants/profile_images/'.$participant->image)}}) no-repeat center; background-size: cover;">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="button" class="btn btn-lg btn-outline-danger w-25" id="btnDeleteImage" role="button" aria-expanded="false" onclick="delete_profile_image()">
                                                    <i class="fa fa-trash"></i>
                                                    Delete
                                                    <span id="btnDeleteImageSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                                </button>
        
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                @else
                    {{-- <form id="profileImageForm"> --}}
                        @csrf
                        <h3 class="text-left mt-4 mb-4">Profile Image</h3>
                        <hr class="bg-success">
                        <p id="profileImageHelp" class="text-white text-center">Upload your Profile Image here in JPEG/ PNG file format.</span>
                        <div class="drop-zone" id="profileImage">
                            <span class="drop-zone__prompt">Upload your Profile Image * <br><small>Drop image File here or click to upload</small> </span>
                            <input accept="image/*" type="file" name="profileImage"  class="drop-zone__input"/>
                        </div>
                        <span id="profileImage-err" class="invalid-feedback text-center" role="alert"></span>  
                    {{-- </form> --}}
                    {{-- <p class="text-center text-white pt-2">
                        <small>Please recheck before submit, you can not change once Submitted</small> 
                    </p> 
                    <div class="form-group row mt-1 mb-0">
                        <div class="col-md-12 text-center">
                            <button id="btnUploadProfileImage" type="button" onclick="upload_profile_image()" class="btn btn-success w-25">
                                Upload
                                <span id="btnUploadProfileImageSpinner" class="spinner-border spinner-border-sm d-none " role="status" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div> --}}
                    <hr>                      
                @endif

                    <h3 class="text-left mt-4 mb-4">Personal Details</h3>
                    <hr class="bg-success">
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-4 mb-5">
                            <label for="title" class="col-form-label text-center w-100">Title *</label>    
                            <select name="title" id="title" class="form-control">                             
                                <option value="" >Select Title Here</option>                            
                                @foreach($titles as $title)
                                    @if($participant != NULL)
                                        @if($participant->title == $title->name)                                            
                                            <option value="{{ $title->name }}" selected>{{ $title->name }}</option> 
                                        @else
                                            <option value="{{ $title->name }}">{{ $title->name }}</option> 
                                        @endif
                                    @else
                                        <option value="{{ $title->name }}">{{ $title->name }}</option>   
                                    @endif                                                                 
                                @endforeach
                            </select>
                            <span id="title-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                        <div class="form-group col-md-8 mb-5">
                            <label for="firstName" class="col-form-label text-center w-100">First Name *</label>    
                            <input value="{{ $participant->first_name ?? "" }}" id="firstName" type="text" class="form-control name text-capitalize" name="firstName" placeholder="Start with Capital letter (e.g. Charith)" required autocomplete="first_name">
                            <span id="firstName-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                    </div>

                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-6 mb-5">
                            <label for="middleName" class="col-form-label text-center w-100">Middle Names</label>    
                            <input value="{{ $participant->middle_names ?? "" }}" id="middleName" type="text" class="form-control name text-capitalize" name="middleName" placeholder="First Letters of name with Capital letter (e.g. Kumara Sampath)" autocomplete="middle_names" >
                            <span id="middleName-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                        <div class="form-group col-md-6 mb-5">
                            <label for="lastName" class="col-form-label text-center w-100">Name with Initials *</label>  
                            <div class="input-group">
                                <div class="input-group-prepend col-4 px-0">
                                    <input value="{{ $participant->initials ?? "" }}" type="text" class="form-control" id="initials" name="initials" placeholder="e.g. CKS" required autocomplete="last_name"/>
                                </div>
                                <input value="{{ $participant->last_name ?? "" }}" id="lastName" type="text" class="form-control name text-capitalize" name="lastName" placeholder="e.g. Wickramarachchi" required autocomplete="last_name" >
                            </div>  
                            <span id="initials-err" class="invalid-feedback text-center" role="alert"></span> <br>
                            <span id="lastName-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                    </div>

                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-12 mb-5">
                            <label for="fullName" class="col-form-label text-center w-100">Full Name *</label>    
                            <input value="{{ $participant->full_name ?? "" }}" id="fullName" type="text" class="form-control text-capitalize" name="fullName" placeholder="e.g. Charith Kumara Sampath Wickramarachchi" required autocomplete="full_name" >
                            <span id="fullName-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                    </div>

                    <div class="form-row justify-content-center mt-5">
                        <div class="form-group col-md-2 mb-5">
                            <label for="gender" class="col-form-label text-center w-100">Gender *</label>    
                            <select name="gender" id="gender" class="form-control" required>                                
                                <option value="">Select Gender</option>
                                @if( $participant != Null && $participant->gender == "Male" )
                                    <option value="Male" Selected>Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                @elseif($participant != Null && $participant->gender == "Female")
                                    <option value="Male">Male</option>
                                    <option value="Female" Selected>Female</option>
                                    <option value="Other">Other</option>  
                                @elseif($participant != Null && $participant->gender == "Other")   
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other" Selected>Other</option>                           
                                @else
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                @endif
                            </select>
                            <span id="gender-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>                        
                        <div class="form-group col-md-3 mb-5">
                            <label for="dob" class="col-form-label text-center w-100">Date of Birth *</label>    
                            <input value="{{ $participant->dob ?? "" }}" id="dob" type="date" class="form-control" name="dob" required autocomplete="dob" >
                            <span id="dob-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                        <div class="form-group col-md-3 mb-5">
                            <label for="citizenship" class="col-form-label text-center w-100">Citizenship *</label>    
                            <select name="citizenship" id="citizenship" class="form-control" required>   
                                @if( $participant != Null && $participant->gender == "Sri Lankan" )
                                    <option value="Sri Lankan" Selected>Sri Lankan</option>
                                    <option value="Foreign National">Foreign National</option>
                                @elseif($participant != Null && $participant->gender == "Foreign National")
                                    <option value="Sri Lankan">Sri Lankan</option>
                                    <option value="Foreign National" Foreign National>Female</option>
                                @else
                                    <option value="Sri Lankan">Sri Lankan</option>
                                    <option value="Foreign National">Foreign National</option>
                                @endif
                            </select>
                            <span id="citizenship-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>                      
                        <div class="form-group col-md-4 mb-5 text-center">
                            <div class="form-check form-check-inline my-1">
                                <input type="radio" class="form-check-input" name="idType" id="idType" value="nic" checked />
                                <label for="nic" class="form-check-label">National ID No</label>
                            </div>   
                            <div class="form-check form-check-inline my-1">
                                <input @if($participant != Null && $participant->id_type == "passport") checked @endif type="radio" class="form-check-input" name="idType" id="idType" value="passport"/>
                                <label for="passport" class="form-check-label">Passport *</label>
                            </div>   
                            <input value="{{ $participant->number ?? "" }}" id="number" type="text" class="form-control text-uppercase" name="number" placeholder="NIC/ Passport" required>
                            <span id="number-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                    </div>

                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-12 mb-5">
                            <label for="educationDetails" class="col-form-label text-center w-100">Educational/ Job Details</label> 
                            <small class="form-text text-center text-white">
                                Enter only letters
                            </small>    
                            <input value="{{ $participant->education ?? "" }}" id="educationDetails" type="text" class="form-control" name="educationDetails" placeholder="Highest Qualification/ Occupation">
                            <span id="educationDetails-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                    </div>
                    
                    <h3 class="text-left mt-4 mb-4">Scouting Details</h3>
                    <hr class="bg-success">

                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-9 mb-5">
                            <label for="highestScoutAward" class="col-form-label text-center w-100">Highest Scout Award</label>    
                            <select name="highestScoutAward" id="highestScoutAward" class="form-control" required>                                
                                <option value="">Select Award</option>                           
                                @foreach($scouts as $scout)
                                    @if($participant != NULL)
                                        @if($participant->scout_award == $scout->name)                                            
                                            <option value="{{ $scout->name }}" selected>{{ $scout->name }}</option> 
                                        @else
                                            <option value="{{ $scout->name }}">{{ $scout->name }}</option> 
                                        @endif
                                    @else
                                        <option value="{{ $scout->name }}">{{ $scout->name }}</option>   
                                    @endif                                                                 
                                @endforeach
                            </select>
                            <span id="highestScoutAward-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                        <div class="form-group col-md-3 mb-5">
                            <label for="highestScoutAwardDate" class="col-form-label text-center w-100">Date</label>    
                            <input value="{{ $participant->scout_award_date ?? "" }}" id="highestScoutAwardDate" type="date" class="form-control" name="highestScoutAwardDate" required>
                            <span id="highestScoutAwardDate-err" class="invalid-feedback text-center" role="alert"></span>
                        </div> 
                    </div>

                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-9 mb-5">
                            <label for="highestRoverAward" class="col-form-label text-center w-100">Highest Rover Award *</label>    
                            <select name="highestRoverAward" id="highestRoverAward" class="form-control" required>                                
                                <option value="">Select Award</option>                          
                                @foreach($rovers as $rover)
                                    @if($participant != NULL)
                                        @if($participant->rover_award == $rover->name)                                            
                                            <option value="{{ $rover->name }}" selected>{{ $rover->name }}</option> 
                                        @else
                                            <option value="{{ $rover->name }}">{{ $rover->name }}</option> 
                                        @endif
                                    @else
                                        <option value="{{ $rover->name }}">{{ $rover->name }}</option>   
                                    @endif                                                                 
                                @endforeach
                            </select>
                            <span id="highestRoverAward-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                        <div class="form-group col-md-3 mb-5">
                            <label for="highestRoverAwardDate" class="col-form-label text-center w-100">Date *</label>    
                            <input value="{{ $participant->rover_award_date ?? "" }}" id="highestRoverAwardDate" type="date" class="form-control" name="highestRoverAwardDate"  required>
                            <span id="highestRoverAwardDate-err" class="invalid-feedback text-center" role="alert"></span>
                        </div> 
                    </div>

                    <div class="form-row justify-content-center">                                           
                        <div class="form-group col-md-12 mb-5 text-center">
                            <div class="form-check form-check-inline my-1">
                                <input type="radio" class="form-check-input" name="participantType" id="participantType" value="Rover" checked />
                                <label for="Rover" class="form-check-label">Rover Scout Participant</label>
                            </div>   
                            <div class="form-check form-check-inline my-1">
                                <input @if($participant != Null && $participant->participant_type == "Scout Master") checked @endif type="radio" class="form-check-input" name="participantType" id="participantType" value="Scout Master"/>
                                <label for="Scout Master" class="form-check-label">Scout Master *</label>
                            </div> 
                            <span id="participantType-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                    </div>

                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-4 mb-5">
                            <label for="warrantNumber" class="col-form-label text-center w-100">Warrant Number (If Any)</label>    
                            <input value="{{ $participant->warrant_number ?? "" }}" id="warrantNumber" type="text" class="form-control text-uppercase" name="warrantNumber">
                            <span id="warrantNumber-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                        <div class="form-group col-md-3 mb-5">
                            <label for="warrantRank" class="col-form-label text-center w-100">Rank</label>    
                            <select name="warrantRank" id="warrantRank" class="form-control">                                
                                <option value="">Select Section</option>                          
                                @foreach($ranks as $rank)
                                    @if($participant != NULL)
                                        @if($participant->warrant_rank == $rank->name)                                            
                                            <option value="{{ $rank->name }}" selected>{{ $rank->name }}</option> 
                                        @else
                                            <option value="{{ $rank->name }}">{{ $rank->name }}</option> 
                                        @endif
                                    @else
                                        <option value="{{ $rank->name }}">{{ $rank->name }}</option>   
                                    @endif                                                                 
                                @endforeach
                            </select>
                            <span id="warrantRank-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                        <div class="form-group col-md-3 mb-5">
                            <label for="warrantSection" class="col-form-label text-center w-100">Section</label>    
                            <select name="warrantSection" id="warrantSection" class="form-control">                                
                                <option value="">Select Section</option>                          
                                @foreach($warrants as $warrant)
                                    @if($participant != NULL)
                                        @if($participant->warrant_section == $warrant->name)                                            
                                            <option value="{{ $warrant->name }}" selected>{{ $warrant->name }}</option> 
                                        @else
                                            <option value="{{ $warrant->name }}">{{ $warrant->name }}</option> 
                                        @endif
                                    @else
                                        <option value="{{ $warrant->name }}">{{ $warrant->name }}</option>   
                                    @endif                                                                 
                                @endforeach
                            </select>
                            <span id="warrantSection-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                        <div class="form-group col-md-2 mb-5">
                            <label for="warrantValidDate" class="col-form-label text-center w-100">Valid Till</label>    
                            <input value="{{ $participant->warrant_expire ?? "" }}" id="warrantValidDate" type="date" class="form-control" name="warrantValidDate">
                            <span id="warrantValidDate-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                    </div>
                    
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-12">
                            <label class="col-form-label text-center w-100">Crew Details</label>
                            <small class="form-text text-center text-white">
                                e.g. 500th Kandy Rego Rovers
                            </small>  
                        </div> 
                        <div class="form-group col-md-4 mb-5">
                            <label for="crewNumber" class="col-form-label text-center w-100">Crew Number *</label>    
                            <input value="{{ $participant->crew_number ?? "" }}" id="crewNumber" type="number" min="0" class="form-control" name="crewNumber" placeholder="e.g. 500" required>
                            <span id="crewNumber-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                        <div class="form-group col-md-4 mb-5">
                            <label for="crewDistrict" class="col-form-label text-center w-100">Crew District *</label>    
                            <select name="crewDistrict" id="crewDistrict" class="form-control">                                
                                <option value="">Select District</option>                      
                                @foreach($districts as $district)
                                    @if($participant != NULL)
                                        @if($participant->crew_district == $district->name)                                            
                                            <option value="{{ $district->name }}" selected>{{ $district->name }}</option> 
                                        @else
                                            <option value="{{ $district->name }}">{{ $district->name }}</option> 
                                        @endif
                                    @else
                                        <option value="{{ $district->name }}">{{ $district->name }}</option>   
                                    @endif                                                                 
                                @endforeach
                            </select>
                            <span id="crewDistrict-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>                        
                        <div class="form-group col-md-4 mb-5">
                            <label for="crewName" class="col-form-label text-center w-100">Crew Name *</label>    
                            <input value="{{ $participant->crew_name ?? "" }}" id="crewName" type="text" class="form-control text-capitalize" name="crewName" placeholder="e.g. Rego Rovers" required>
                            <span id="crewName-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                    </div>

                    <h3 class="text-left mt-4 mb-4">Contact Details</h3>
                    <hr class="bg-success">
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-6 mb-5">
                            <label for="mobileNumber" class="col-form-label text-center w-100">Telephone (Mobile) *</label> 
                            <small  id="mobileNumberHelpBlock" class="form-text text-center text-white">
                                If using Whatsapp/ Viber, Please mention that number here
                            </small>   
                            <input value="{{ $participant->mobile ?? "" }}" id="mobileNumber" type="number" min="0" class="form-control" name="mobileNumber" placeholder="Number with country code (e.g. 0094777123456)" required autocomplete="phone" >
                            <span id="mobileNumber-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                        <div class="form-group col-md-6 mb-5">
                            <label for="telephoneNumber" class="col-form-label text-center w-100">Telephone (Residence/ Office) *</label>
                            <small id="telephoneNumberHelpBlock" class="form-text text-center text-white">
                               &nbsp;
                            </small>     
                            <input value="{{ $participant->telephone ?? "" }}" id="telephoneNumber" type="number" min="0" class="form-control" name="telephoneNumber" placeholder="Number with country code (e.g. 0094812212345)" required autocomplete="phone" >
                            <span id="telephoneNumber-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                    </div>

                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-12 mb-5">
                            <label for="address" class="col-form-label text-center w-100">Address *</label>    
                            <small id="addressHelpBlock" class="form-text text-center text-white">
                                Include City (e.g. No.123, Street Name, City)
                            </small>
                            <input value="{{ $participant->address ?? "" }}" id="address" type="text" class="form-control text-capitalize" name="address" placeholder="Postal Address " required autocomplete="address" >
                            <span id="adress-err" class="invalid-feedback text-center" role="alert"></span>

                        </div>
                    </div>
                    
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-6 mb-5">
                            <label for="country" class="col-form-label text-center w-100">Country *</label>    
                            <select name="country" id="country" class="form-control" required autocomplete="country">                                
                                <option value="">Select Country</option>                      
                                @foreach($countries as $country)
                                    @if($participant != NULL)
                                        @if($participant->country == $country->name)                                            
                                            <option value="{{ $country->name }}" selected>{{ $country->name }}</option> 
                                        @else
                                            <option value="{{ $country->name }}">{{ $country->name }}</option> 
                                        @endif
                                    @else
                                        <option value="{{ $country->name }}">{{ $country->name }}</option>   
                                    @endif                                                                 
                                @endforeach
                            </select>
                            <span id="country-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                        <div class="form-group col-md-6 mb-5">
                            <label for="zipCode" class="col-form-label text-center w-100">Zip/ Postal Code</label>    
                            
                            <input value="{{ $participant->zip ?? "" }}" id="zipCode" type="number" min="0" class="form-control" name="zipCode" placeholder="Zip/ Postal Code " required autocomplete="zip" >
                            <span id="zipCode-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                    </div>

                    
                    <h3 class="text-left mt-4 mb-4">Immediate Contact Person</h3>
                    <hr class="bg-success">
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-4 mb-5">
                            <label for="contactPersontTitle" class="col-form-label text-center w-100">Title *</label>    
                            <select name="contactPersontTitle" id="contactPersontTitle" class="form-control">                                
                                <option value="">Select Title Here</option>                            
                                @foreach($titles as $title)
                                    @if($participant != NULL)
                                        @if($participant->contact_person_title == $title->name)                                            
                                            <option value="{{ $title->name }}" selected>{{ $title->name }}</option> 
                                        @else
                                            <option value="{{ $title->name }}">{{ $title->name }}</option> 
                                        @endif
                                    @else
                                        <option value="{{ $title->name }}">{{ $title->name }}</option>   
                                    @endif                                                                 
                                @endforeach
                            </select>
                            <span id="contactPersontTitle-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                        <div class="form-group col-md-8 mb-5">
                            <label for="contactPersonName" class="col-form-label text-center w-100">Full Name *</label>    
                            <input value="{{ $participant->contact_person_name ?? "" }}" id="contactPersonName" type="text" class="form-control text-capitalize" name="contactPersonName" placeholder="Enter Full Name" required >
                            <span id="contactPersonName-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-6 mb-5">
                            <label for="contactPersonMobileNumber" class="col-form-label text-center w-100">Telephone (Mobile) *</label> 
                            <small  id="contactPersonMobileNumberHelpText" class="form-text text-center text-white">
                                If using Whatsapp/ Viber, Please mention that number here
                            </small>   
                            <input value="{{ $participant->contact_person_mobile ?? "" }}" id="contactPersonMobileNumber" type="number" min="0" class="form-control" name="contactPersonMobileNumber" placeholder="Number with country code (e.g. 0094777123456)" required>
                            <span id="contactPersonMobileNumber-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                        <div class="form-group col-md-6 mb-5">
                            <label for="contactPersonTelephoneNumber" class="col-form-label text-center w-100">Telephone (Residence/ Office)</label>
                            <small id="contactPersonTelephoneNumberHelpText" class="form-text text-center text-white">
                               &nbsp;
                            </small>     
                            <input value="{{ $participant->contact_person_telephone ?? "" }}" id="contactPersonTelephoneNumber" type="number" min="0" class="form-control" name="contactPersonTelephoneNumber" placeholder="Number with country code (e.g. 0094812212345)" >
                            <span id="contactPersonTelephoneNumber-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                    </div>

                    <h3 class="text-left mt-4 mb-4">Payment Details</h3>
        
                    <div class="form-row justify-content-center"> 
                        <div class="form-group col-md-6 mb-5">
                            <label for="paymentDate" class="col-form-label text-center w-100">Paid Date *</label>    
                            <input value="{{ $participant->payment_date ?? "" }}" id="paymentDate" type="date" class="form-control" name="paymentDate"required autocomplete="paidDate">
                            <span id="paymentDate-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                        <div class="form-group col-md-6 mb-5">
                            <label for="paymentReference" class="col-form-label text-center w-100">Payment Reference *</label>    
                            <input value="{{ $participant->payment_reference ?? "" }}" id="paymentReference" type="text" class="form-control" name="paymentReference" placeholder=" (e.g. cheque no, transaction id)" required autocomplete="paymentReference">
                            <span id="paymentReference-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                    </div>
                    @if($participant != NULL && $participant->payment_proof != NULL)
                        <div class="form-row justify-content-center mt-5">
                            <div class="col-lg">
                                <div class="form-group">
                                    <div class="drop-zone" style="background: url({{ asset('storage/participants/payments/'.$participant->payment_proof)}}) no-repeat center; background-size: cover;">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12">
                                                    <button type="button" class="btn btn-lg btn-outline-danger w-25" id="btnDeletePayment" role="button" aria-expanded="false" onclick="delete_payment_proof()">
                                                        <i class="fa fa-trash"></i>
                                                        Delete
                                                        <span id="btnDeletePaymentSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                                    </button>
            
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    @else
                        <span id="paymentProofHelp" class="form-text text-white text-center">Upload your scanned bank slip/ payment proof here in JPEG/ PNG file format</span>
                        <div class="drop-zone" id="paymentProof">
                            <span class="drop-zone__prompt">Upload your Scanned Bank Slip/ Payment Proof * <br><small>Drop image File here or click to upload</small> </span>
                            <input accept="image/*" type="file" name="paymentProof"  class="drop-zone__input"/>
                        </div>
                        <span id="paymentProof-err" class="invalid-feedback text-center" role="alert"></span>
                    
                    @endif

                </form>
                
                <div class="form-group row mt-5 mb-0">
                    <div class="col-md-12 text-center">
                        <button id="btnSaveScout" type="button" onclick="save_info()" class="btn btn-lg btn-primary w-25">
                            Save Info
                            <span id="btnSaveScoutSpinner" class="spinner-border spinner-border-sm d-none " role="status" aria-hidden="true"></span>
                        </button>
                    </div>
                </div>                
                <p class="text-center text-white">
                    You can submit your application once you are done saving all the required information
                </p> 
                    
                @if($participant)
                          
                <p class="text-center text-white">
                    <small>Please recheck before submit, you can not change once Submitted</small> 
                 </p> 
                <div class="form-group row mt-5 mb-0">
                    <div class="col-md-12 text-center">
                        <button id="btnSubmitScout" type="button" onclick="submit_application()" class="btn btn-lg btn-success w-50">
                            Submit Application
                            <span id="btnSubmitScoutSpinner" class="spinner-border spinner-border-sm d-none " role="status" aria-hidden="true"></span>
                        </button>
                    </div>
                </div>                    
                @endif
                <hr>
            @endif
            
            @if( $participant != NULL && $participant->application_submit == 1 && $participant->application_proof ==NULL )
            <div class="form-row justify-content-center">            
                <p class="text-center">
                    Printed application must be scanned and submitted along with the signature verifications of: <br> Rover Scout Master, ADC(Rovers) and District Commissioner                
                </p>
                <p class="text-center col-12">
                    All <span class=" text-success">printed, verified and scanned Applications</span> should be uploaded inorder to complete the registration
                    <br>
                </p>
                <p class="text-center">
                    Application closing date will be <span class=" text-success">05th March 2021</span>, All <span class=" text-success">printed, verified and scanned Application</span>
                    must be submitted on or before the given deadline.   
                </p>
            </div>
            @if( $participant != NULL && $participant->application_submit == 1 )
            <div class="form-row justify-content-center">
                <button onclick="print_application()" class="col-md-4 btn btn-primary float-right">
                    <i class="fa fa-print"></i> 
                    Click Here to Print Your Application
                </button>
            </div>
            @endif

            <form id="applicationProofForm">
                @csrf
                <h3 class="text-left mt-4 mb-4">Printed, Verified and Scanned Application</h3>    

                <span id="applicationProofHelp" class="form-text text-white text-center">Upload your scanned application here in JPEG/ PNG file format</span>
                <div class="drop-zone" id="applicationProof">
                    <span class="drop-zone__prompt">Upload your Scanned Application *<br><small>Drop image File here or click to upload</small> </span>
                    <input accept="image/*" type="file" name="applicationProof"  class="drop-zone__input"/>
                </div>
                <span id="applicationProof-err" class="invalid-feedback text-center" role="alert"></span>
            </form>
            <p class="text-center text-white pt-5">
                <small>Please recheck before submit, you can not change once Submitted</small> 
            </p> 
            <div class="form-group row mt-5 mb-0">
                <div class="col-md-12 text-center">
                    <button id="btnScannedScout" type="button" onclick="submit_scanned_application()" class="btn btn-lg btn-success w-50">
                        Submit Scanned Application
                        <span id="btnScannedScoutSpinner" class="spinner-border spinner-border-sm d-none " role="status" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
            @endif

            
            @if( $participant != NULL && $participant->application_submit == 1 && $participant->payment_submit == 1 && $participant->application_proof != NULL && $participant->image != NULL && $participant->application_status == NULL )

            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Registration Successfully Submitted!</h4>
                <p>Your documents will be reviewed. You'll be Notified on {{ Auth::user()->email }}, once your registration is approved</p>
                <hr>
                <p class="mb-0">Thank you for registering to 34th National Rover Moot, Feel free to contact us on admin@scout.lk for assistance</p>
            </div>
            @endif
                <p class="text-center text-white">
                    If you have any issues regarding registration, please contact Administrator: admin@scout.lk
                </p> 
            </div>
        </div>
    </div>
</div>


@include('portal.scout.register.scripts')

@endsection
