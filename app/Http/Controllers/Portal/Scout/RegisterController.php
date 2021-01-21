<?php

namespace App\Http\Controllers\Portal\Scout;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('portal.scout.register');
    }

    public function save_info(Request $request)
    {
        $user_id = Auth::user()->id;
        $validator = Validator::make($request->all(), 
        [            
            'title' => ['nullable', Rule::in(['Mr', 'Master', 'Mrs', 'Miss', 'Dr', 'Rev'])],
            'firstName' => ['nullable', 'alpha','min:3'],
            'middleName' => ['nullable', 'alpha_dash_space'],
            'lastName' => ['nullable', 'alpha', 'min:3'],
            'fullName' => ['nullable', 'alpha_dash_space'],
            'initials' => ['nullable', 'alpha_capital'],
            'dob' => ['nullable' , 'date','before:today'],
            'gender' => ['nullable', Rule::in(['Male', 'Female', 'Other'])],
            'idType' => ['nullable', Rule::in(['nic', 'passport'])],
                  
            'highestScoutAward' => ['nullable', Rule::in(['Membership','Bronze Star','Silver Star','Gold Star','Scout Award/ Scout Master Award','District Commissioner Cord','Chief Commissioner Award','President Scout Award'])],
            'highestScoutAwardDate' => ['nullable', 'date', 'before:today'],
            'highestRoverAward' => ['nullable', Rule::in(['Rover Ideals Badge', 'Membership','Invested Rover','Good Citizen Decoration','BP Award','Rover Instructor'])],
            'highestRoverAwardDate' => ['nullable', 'date', 'before:today'],

            'warrantNumber' => ['nullable'],
            'warrantSection' => ['nullable', Rule::in(['Singithi Scout', 'Cub Scout', 'Scout', 'Rover Scout', 'ALT', 'LT'])],
            'warrantValidDate' => ['nullable', 'date'],

            'crewNumber' => ['nullable', 'integer'],
            'crewDistrict' => ['nullable', Rule::in([
                'Akkaraipaththu-Kalmunai',
                'Ampara',
                'Anuradhapura',
                'Avissawella',
                'Badulla',
                'Batticaloa',
                'Chillaw',
                'Colombo',
                'Galle',
                'Gampaha',
                'Hambanthota',
                'Homagama',
                'Jaffna',
                'Kaluthara',
                'Kandy',
                'Kankasanthurai',
                'Kegalle',
                'Kilinochchi',
                'Kurunegala',
                'Mannar',
                'Matale',
                'Matara',
                'Monaragala',
                'Moratuwa-Piliyandala',
                'Mulativu',
                'Nawalapitiya',
                'Negambo',
                'Nuwaraeliya',
                'Panadura',
                'Point-Pedro',
                'Polonnaruwa',
                'Puttalam',
                'Rathnapura',
                'Trincomalee',
                'Vavuniya',
                'Wattala-Jaela',
                'Wennappuwa'
            ])],
            'crewName'=> ['nullable', 'alpha_dash_space', 'min:3'],
            'mobileNumber'=>['nullable', 'numeric', 'digits_between:8,15'],
            'telephoneNumber'=>['nullable', 'numeric', 'digits_between:8,15'],            
            'address' => ['nullable', 'address'],
            'country' => ['nullable', 'exists:world_countries,name'],
            'zipCode' => ['nullable', 'numeric', 'digits_between:5,10'],
            
            'contactPersontTitle' => ['nullable', Rule::in(['Mr', 'Master', 'Mrs', 'Miss', 'Dr', 'Rev'])],
            'contactPersonName' => ['nullable', 'alpha_dash_space'],
            'contactPersonMobileNumber'=>['nullable', 'numeric', 'digits_between:8,15'],
            'contactPersonTelephoneNumber'=>['nullable', 'numeric', 'digits_between:8,15'],

            'educationDetails' => ['nullable', 'regex:/^[a-zA-Z\s]*$/', 'min:3'],


        ]);

            //CHECK UNIQUE TYPE AND VALIDATE UNIQUE ID
        if($request->idType == 'nic'):
            if(strlen($request->nic)>10):
            $uniqueID_validator =  Validator::make($request->all(), [
                'nic' => ['nullable', 'numeric', 'digits:12'],
            ]);
            else:
            $uniqueID_validator =  Validator::make($request->all(), [
                'nic' => ['nullable', 'alpha_num', 'min:10', 'regex:/^([0-9]{9}[x|X|v|V])$/'],
            ]);
            endif;
        else:
            $uniqueID_validator =  Validator::make($request->all(), [
            'unique_id' => ['nullable', 'alpha_num'],
            ]);
        endif;

        if($validator->fails() || $uniqueID_validator->fails()):
            return response()->json(['errors'=>$validator->errors()->merge($uniqueID_validator->errors())]);
        else:
            if(Participant::where('user_id', $user_id)->first()):
                $participant = Participant::where('user_id', $user_id)->first();
            else:
                $participant = new Participant;
                $participant->user_id = $user_id;
            endif;
            
            $participant->title = $request->title;
            $participant->first_name = $request->firstName;
            $participant->middle_names = $request->middleName;
            $participant->last_name = $request->lastName;
            $participant->full_name = $request->fullName;
            $participant->initials = $request->initials;
            $participant->dob = $request->dob;
            $participant->gender = $request->gender;
            $participant->id_type = $request->idType;
            $participant->nic = $request->nic;
            $participant->scout_award = $request->highestScoutAward;
            $participant->scout_award_date = $request->highestScoutAwardDate;
            $participant->rover_award = $request->highestRoverAward;
            $participant->rover_award_date = $request->highestRoverAwardDate;
            $participant->warrant_number = $request->warrantNumber;
            $participant->warrant_section = $request->warrantSection;
            $participant->warrant_expire = $request->warrantValidDate;
            $participant->crew_number = $request->crewNumber;
            $participant->crew_district = $request->crewDistrict;
            $participant->crew_name = $request->crewName;
            $participant->mobile = $request->mobileNumber;
            $participant->telephone = $request->telephoneNumber;
            $participant->address = $request->address;
            $participant->country = $request->country;
            $participant->zip = $request->zipCode;
            $participant->contact_person_title = $request->contactPersontTitle;
            $participant->contact_person_name = $request->contactPersonName;
            $participant->contact_person_mobile = $request->contactPersonMobileNumber;
            $participant->contact_person_telephone = $request->contactPersonTelephoneNumber;
            $participant->education = $request->educationDetails;

            if($participant->save()):
                return response()->json(['success'=>'success']);
            endif;
        endif;
        return response()->json(['error'=>'error']);
    }
}
