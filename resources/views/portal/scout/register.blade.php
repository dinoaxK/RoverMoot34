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
                <form id="scoutRegisterForm">
                    @csrf

                    <h3 class="text-left mt-4 mb-4">Personal Details</h3>
                    <hr class="bg-success">
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-4 mb-5">
                            <label for="title" class="col-form-label text-center w-100">Title *</label>    
                            <select name="title" id="title" class="form-control">                                
                                <option value="">Select Title Here</option>
                                <option value="Mr">Mr</option>
                                <option value="Master">Master</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Miss">Miss</option>
                                <option value="Dr">Dr</option>
                                <option value="Rev">Rev</option>
                            </select>
                            <span id="title-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                        <div class="form-group col-md-8 mb-5">
                            <label for="firstName" class="col-form-label text-center w-100">First Name *</label>    
                            <input id="firstName" type="text" class="form-control text-capitalize" name="firstName" placeholder="Start with Capital letter (e.g. Charith)" required autocomplete="first_name">
                            <span id="firstName-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                    </div>

                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-6 mb-5">
                            <label for="middleName" class="col-form-label text-center w-100">Middle Names</label>    
                            <input id="middleName" type="text" class="form-control text-capitalize" name="middleName" placeholder="First Letters of name with Capital letter (e.g. Kumara Sampath)" autocomplete="middle_names" >
                            <span id="middleName-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                        <div class="form-group col-md-6 mb-5">
                            <label for="lastName" class="col-form-label text-center w-100">Name with Initials *</label>  
                            <div class="input-group">
                                <div class="input-group-prepend col-4 px-0">
                                    <input type="text" class="form-control text-uppercase" id="initials" name="initials" placeholder="e.g. CKS" required autocomplete="last_name"/>
                                    <span id="initials-err" class="invalid-feedback text-center" role="alert"></span>
                                </div>
                                <input id="lastName" type="text" class="form-control text-capitalize" name="lastName" placeholder="e.g. Wickramarachchi" required autocomplete="last_name" >
                            </div>  
                            <span id="lastName-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                    </div>

                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-12 mb-5">
                            <label for="initials" class="col-form-label text-center w-100">Full Name *</label>    
                            <input id="initials" type="text" class="form-control text-capitalize" name="initials" placeholder="e.g. Charith Kumara Sampath Wickramarachchi" required autocomplete="full_name" >
                            <span id="initials-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                    </div>

                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-3 mb-5">
                            <label for="gender" class="col-form-label text-center w-100">Gender *</label>    
                            <select name="gender" id="gender" class="form-control" required>                                
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                            <span id="gender-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>                        
                        <div class="form-group col-md-3 mb-5">
                            <label for="dob" class="col-form-label text-center w-100">Date of Birth *</label>    
                            <input id="dob" type="date" class="form-control" name="dob" required autocomplete="dob" >
                            <span id="dob-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>                     
                        <div class="form-group col-md-6 mb-5 text-center">
                            <div class="form-check form-check-inline my-1">
                                <input type="radio" class="form-check-input" name="uniqueType" id="uniqueTypeNic" value="nic" checked />
                                <label for="nic" class="form-check-label">National ID No</label>
                            </div>   
                            <div class="form-check form-check-inline my-1">
                                <input type="radio" class="form-check-input" name="uniqueType" id="uniqueTypeNic" value="passport"/>
                                <label for="passport" class="form-check-label">Passport *</label>
                            </div>   
                            <input id="nic" type="text" class="form-control text-uppercase" name="nic" placeholder="NIC/ Passport" required>
                            <span id="nic-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                    </div>

                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-12 mb-5">
                            <label for="educationDetails" class="col-form-label text-center w-100">Educational/ Job Details</label>    
                            <input id="educationDetails" type="text" class="form-control" name="educationDetails" placeholder="Highest Qualification/ Occupation">
                            <span id="educationDetails-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                    </div>
                    
                    <h3 class="text-left mt-4 mb-4">Scouting Details</h3>
                    <hr class="bg-success">

                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-9 mb-5">
                            <label for="highestScoutAward" class="col-form-label text-center w-100">Highest Scout Award *</label>    
                            <select name="highestScoutAward" class="form-control" required>                                
                                <option value="">Select Award</option>
                                <option value="Membership">Membership</option>
                                <option value="Bronze Star">Bronze Star</option>
                                <option value="Silver Star">Silver Star</option>
                                <option value="Gold Star">Gold Star</option>
                                <option value="Scout Award/ Scout Master's">Scout Award/ Scout Master's</option>
                                <option value="District Commissioner's Cord">District Commissioner's Cord</option>
                                <option value="Chief Commissioner's Award">Chief Commissioner's Award</option>
                                <option value="President Scout Award">President Scout Award</option>
                            </select>
                            <span id="highestScoutAward-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                        <div class="form-group col-md-3 mb-5">
                            <label for="highestScoutAwardDate" class="col-form-label text-center w-100">Date *</label>    
                            <input id="highestScoutAwardDate" type="date" class="form-control" name="highestScoutAwardDate" required>
                            <span id="highestScoutAwardDate-err" class="invalid-feedback text-center" role="alert"></span>
                        </div> 
                    </div>

                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-9 mb-5">
                            <label for="highestRoverAward" class="col-form-label text-center w-100">Highest Rover Award *</label>    
                            <select name="highestRoverAward" id="highestRoverAward" class="form-control" required>                                
                                <option value="">Select Award</option>
                                <option value="Rover Ideals Badge">Rover Ideals Badge</option>
                                <option value="Membership">Membership</option>
                                <option value="Invested Rover">Invested Rover</option>
                                <option value="Good Citizen's Decoration">Good Citizen's Decoration</option>
                                <option value="BP Award">BP Award</option>
                                <option value="Rover Instructor">Rover Instructor</option>
                            </select>
                            <span id="highestRoverAward-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                        <div class="form-group col-md-3 mb-5">
                            <label for="highestRoverAwardDate" class="col-form-label text-center w-100">Date *</label>    
                            <input id="highestRoverAwardDate" type="date" class="form-control" name="highestRoverAwardDate"  required>
                            <span id="highestRoverAwardDate-err" class="invalid-feedback text-center" role="alert"></span>
                        </div> 
                    </div>

                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-5 mb-5">
                            <label for="warrantNumber" class="col-form-label text-center w-100">Warrant Number (If Any)</label>    
                            <input id="warrantNumber" type="text" class="form-control text-uppercase" name="warrantNumber">
                            <span id="warrantNumber-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                        <div class="form-group col-md-4 mb-5">
                            <label for="warrantSection" class="col-form-label text-center w-100">Rank/ Section</label>    
                            <select name="warrantSection" id="warrantSection" class="form-control">                                
                                <option value="">Select Section</option>
                                <option value="Singithi Scout">Singithi Scout</option>
                                <option value="Cub Scout">Cub Scout</option>
                                <option value="Scout">Scout</option>
                                <option value="Rover Scout">Rover Scout</option>
                                <option value="ALT">ALT</option>
                                <option value="LT">LT</option>
                            </select>
                            <span id="warrantSection-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                        <div class="form-group col-md-3 mb-5">
                            <label for="warrantValidDate" class="col-form-label text-center w-100">Valid Till</label>    
                            <input id="warrantValidDate" type="date" class="form-control" name="warrantValidDate">
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
                            <input id="crewNumber" type="number" class="form-control" name="crewNumber" placeholder="e.g. 500" required>
                            <span id="crewNumber-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                        <div class="form-group col-md-4 mb-5">
                            <label for="crewDistrict" class="col-form-label text-center w-100">Crew District *</label>    
                            <select name="crewDistrict" id="crewDistrict" class="form-control">                                
                                <option value="">Select District</option>
                                <option value="Akkaraipaththu-Kalmunai">Akkaraipaththu-Kalmunai</option>
                                <option value="Ampara">Ampara</option>
                                <option value="Anuradhapura">Anuradhapura</option>
                                <option value="Avissawella">Avissawella</option>
                                <option value="Badulla">Badulla</option>
                                <option value="Batticaloa">Batticaloa</option>
                                <option value="Chillaw">Chillaw</option>
                                <option value="Colombo">Colombo</option>
                                <option value="Galle">Galle</option>
                                <option value="Gampaha">Gampaha</option>
                                <option value="Hambanthota">Hambanthota</option>
                                <option value="Homagama">Homagama</option>
                                <option value="JaffnaKaluthara">JaffnaKaluthara</option>
                                <option value="Kaluthara">Kaluthara</option>
                                <option value="Kandy">Kandy</option>
                                <option value="Kankasanthurai">Kankasanthurai</option>
                                <option value="Kegalle">Kegalle</option>
                                <option value="Kilinochchi">Kilinochchi</option>
                                <option value="Kurunegala">Kurunegala</option>
                                <option value="MannarMatale">MannarMatale</option>
                                <option value="Matale">Matale</option>
                                <option value="Matara">Matara</option>
                                <option value="Monaragala">Monaragala</option>
                                <option value="Moratuwa-Piliyandala">Moratuwa-Piliyandala</option>
                                <option value="Mulativu">Mulativu</option>
                                <option value="Nawalapitiya">Nawalapitiya</option>
                                <option value="Negambo">Negambo</option>
                                <option value="Nuwaraeliya">Nuwaraeliya</option>
                                <option value="Panadura">Panadura</option>
                                <option value="Point-Pedro">Point-Pedro</option>
                                <option value="Polonnaruwa">Polonnaruwa</option>
                                <option value="Puttalam">Puttalam</option>
                                <option value="Rathnapura">Rathnapura</option>
                                <option value="Trincomalee">Trincomalee</option>
                                <option value="Vavuniya">Vavuniya</option>
                                <option value="Wattala-Jaela">Wattala-Jaela</option>
                                <option value="Wennappuwa">Wennappuwa</option>
                            </select>
                            <span id="crewDistrict-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>                        
                        <div class="form-group col-md-4 mb-5">
                            <label for="crewName" class="col-form-label text-center w-100">Crew Name *</label>    
                            <input id="crewName" type="text" class="form-control text-capitalize" name="crewName" placeholder="e.g. Rego Rovers" required>
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
                            <input id="mobileNumber" type="number" class="form-control" name="mobileNumber" placeholder="Number with country code (e.g. +94777123456)" required autocomplete="phone" >
                            <span id="mobileNumber-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                        <div class="form-group col-md-6 mb-5">
                            <label for="telephoneNumber" class="col-form-label text-center w-100">Telephone (Residence/ Office) *</label>
                            <small id="telephoneNumberHelpBlock" class="form-text text-center text-white">
                               &nbsp;
                            </small>     
                            <input id="telephoneNumber" type="number" class="form-control" name="telephoneNumber" placeholder="Number with country code (e.g. +94812212345)" required autocomplete="phone" >
                            <span id="telephoneNumber-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                    </div>

                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-12 mb-5">
                            <label for="address" class="col-form-label text-center w-100">Address *</label>    
                            <small id="addressHelpBlock" class="form-text text-center text-white">
                                Include City (e.g. No.123, Street Name, City)
                            </small>
                            <input id="address" type="text" class="form-control text-capitalize" name="address" placeholder="Postal Address " required autocomplete="address" >
                            <span id="adress-err" class="invalid-feedback text-center" role="alert"></span>

                        </div>
                    </div>
                    
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-6 mb-5">
                            <label for="country" class="col-form-label text-center w-100">Country *</label>    
                            <select name="country" id="gender" class="form-control" required autocomplete="country">                                
                                <option value="">Select Country</option>
                            </select>
                            <span id="country-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                        <div class="form-group col-md-6 mb-5">
                            <label for="zipCode" class="col-form-label text-center w-100">Zip/ Postal Code *</label>    
                            
                            <input id="zipCode" type="number" class="form-control" name="zipCode" placeholder="Zip/ Postal Code " required autocomplete="zip" >
                            <span id="zipCode-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                    </div>

                    
                    <h3 class="text-left mt-4 mb-4">Immediate Contact Person</h3>
                    <hr class="bg-success">
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-4 mb-5">
                            <label for="contactPersontTitle" class="col-form-label text-center w-100">Title *</label>    
                            <select name="contactPersontTitle" id="titcontactPersontTitlele" class="form-control">                                
                                <option value="">Select Title Here</option>
                                <option value="Mr">Mr</option>
                                <option value="Master">Master</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Miss">Miss</option>
                                <option value="Dr">Dr</option>
                                <option value="Rev">Rev</option>
                            </select>
                            <span id="contactPersontTitle-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                        <div class="form-group col-md-8 mb-5">
                            <label for="contactPerson" class="col-form-label text-center w-100">Full Name *</label>    
                            <input id="contactPerson" type="text" class="form-control text-capitalize" name="contactPerson" placeholder="Enter Full Name" required >
                            <span id="contactPerson-err" class="invalid-feedback text-center" role="alert"></span>
                        </div>
                    </div>
                </form>
                
                <div class="form-group row mt-5 mb-0">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-lg btn-primary w-50">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('portal.scout.register.scripts')

@endsection
