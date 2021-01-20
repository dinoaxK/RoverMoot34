<?php

namespace App\Http\Controllers\Portal\Scout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

        if($validator->fails()):
            return response()->json(['errors'=>$validator->errors()]);
        endif;
      
    }
}
