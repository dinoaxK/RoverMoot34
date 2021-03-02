<?php

namespace App\Http\Controllers\Portal\Scout;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Participant;
use App\Models\RoverAward;
use App\Models\ScoutAward;
use App\Models\ScoutDistrict;
use App\Models\Title;
use App\Models\WarrantRank;
use App\Models\WarrantSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        $this->middleware(['auth', 'verified', 'block.registration']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $participant = NULL;
        if(Participant::where('user_id', Auth::user()->id)->first()):
            $participant = Participant::where('user_id', Auth::user()->id)->first();
        endif;
        $titles = Title::all();
        $scouts = ScoutAward::all();
        $rovers = RoverAward::all();
        $warrants = WarrantSection::all();
        $districts = ScoutDistrict::orderBy('name')->get();
        $countries = Country::orderBy('name')->get();
        $ranks = WarrantRank::all();
        return view ('portal.scout.register', compact(
            'participant', 
            'titles', 
            'scouts', 
            'rovers',
            'warrants',
            'districts',
            'countries',
            'ranks'
         ));
    }

    public function save_info(Request $request)
    {
        $user_id = Auth::user()->id;
        $validator = Validator::make($request->all(), 
        [            
            'title' => ['nullable', 'exists:titles,name'],
            'firstName' => ['nullable', 'alpha','min:3'],
            'middleName' => ['nullable', 'alpha_dash_space'],
            'lastName' => ['nullable', 'alpha', 'min:3'],
            'fullName' => ['nullable', 'alpha_dash_space'],
            'initials' => ['nullable', 'alpha_capital'],
            'profileImage'=> ['nullable', 'image', 'mimes:jpeg,png'],
            'dob' => ['nullable' , 'date','before:today'],
            'gender' => ['nullable', Rule::in(['Male', 'Female', 'Other'])],
            'idType' => ['nullable', Rule::in(['nic', 'passport'])],
            'citizenship' => ['nullable', Rule::in(['Sri Lankan', 'Foreign National'])],
                  
            'highestScoutAward' => ['nullable', 'exists:scout_awards,name'],
            'highestScoutAwardDate' => ['nullable', 'date', 'before:today'],
            'highestRoverAward' => ['nullable', 'exists:rover_awards,name'],
            'highestRoverAwardDate' => ['nullable', 'date', 'before:today'],

            'participantType' => ['nullable', Rule::in(['Rover', 'Scout Master'])],
            'warrantNumber' => ['nullable'],
            'warrantRank' => ['nullable', 'exists:warrant_ranks,name'],
            'warrantSection' => ['nullable', 'exists:warrant_sections,name'],
            'warrantValidDate' => ['nullable', 'date'],

            'crewNumber' => ['nullable', 'integer', 'min:0'],
            'crewDistrict' => ['nullable', 'exists:scout_districts,name'],
            'crewName'=> ['nullable', 'alpha_dash_space', 'min:3'],
            'mobileNumber'=>['nullable', 'numeric', 'digits_between:11,15'],
            'telephoneNumber'=>['nullable', 'numeric', 'digits_between:11,15'],            
            'address' => ['nullable', 'address'],
            'country' => ['nullable', 'exists:countries,name'],
            'zipCode' => ['nullable', 'numeric', 'digits_between:5,10'],
            
            'contactPersontTitle' => ['nullable', 'exists:titles,name'],
            'contactPersonName' => ['nullable', 'alpha_dash_space'],
            'contactPersonMobileNumber'=>['nullable', 'numeric', 'digits_between:11,15'],
            'contactPersonTelephoneNumber'=>['nullable', 'numeric', 'digits_between:11,15'],

            'educationDetails' => ['nullable', 'min:3'],

            'paymentDate'=>['nullable', 'before_or_equal:today'],
            'paymentReference'=>['nullable'],
            'paymentProof'=>['nullable', 'image', 'mimes:jpeg,png']

        ],
        [
            'dimensions'=>'Image must be cropped to a square shape (Ratio= 1:1)'
        ]
    );

            //CHECK UNIQUE TYPE AND VALIDATE UNIQUE ID
        if($request->idType == 'nic'):
            if(strlen($request->nic)>10):
            $uniqueID_validator =  Validator::make($request->all(), [
                'number' => ['nullable', 'numeric', 'digits:12'],
            ]);
            else:
            $uniqueID_validator =  Validator::make($request->all(), [
                'number' => ['nullable', 'alpha_num', 'min:10', 'regex:/^([0-9]{9}[x|X|v|V])$/'],
            ]);
            endif;
        else:
            $uniqueID_validator =  Validator::make($request->all(), [
            'number' => ['nullable', 'alpha_num', 'max:9'],
            ]);
        endif;

        //CHECK PARTICIPANT TYPE AND VALIDATE WARRANT INFO
        if($request->participantType == 'Rover'):
            $warrant_validator =  Validator::make($request->all(), [
                'warrantNumber' => ['nullable'],
                'warrantSection' => ['nullable', 'exists:warrant_sections,name'],
                'warrantValidDate' => ['nullable', 'date'],
            ]);
        else:
            $warrant_validator =  Validator::make($request->all(), [
                'warrantNumber' => ['nullable'],
                'warrantSection' => ['nullable', 'exists:warrant_sections,name'],
                'warrantValidDate' => ['nullable', 'date'],
            ]);
        endif;


        if($validator->fails() || $uniqueID_validator->fails() || $warrant_validator->fails()):
            return response()->json(['errors'=>$validator->errors()->merge($uniqueID_validator->errors(),$warrant_validator->errors())]);
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
            $participant->citizenship = $request->citizenship;
            $participant->id_type = $request->idType;
            $participant->number = $request->number;
            $participant->scout_award = $request->highestScoutAward;
            $participant->scout_award_date = $request->highestScoutAwardDate;
            $participant->rover_award = $request->highestRoverAward;
            $participant->rover_award_date = $request->highestRoverAwardDate;
            
            $participant->participant_type = $request->participantType;
            $participant->warrant_number = $request->warrantNumber;
            $participant->warrant_rank = $request->warrantRank;
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
            $participant->payment_date = $request->paymentDate;
            $participant->payment_reference = $request->paymentReference;

            if($request->paymentProof):
                $file_ext = $request->file('paymentProof')->getClientOriginalExtension();
                $file_name = $participant->id.'_'.date('Y-m-d').'_'.time().'.'. $file_ext;
          
                $participant->payment_proof = $file_name;          
                if($path = $request->file('paymentProof')->storeAs('public/participants/payments/',$file_name)):
                    
                    if($request->profileImage):
                        $image_ext = $request->file('profileImage')->getClientOriginalExtension();
                        $img_name = $user_id.'_profile_pic_'.date('Y-m-d').'_'.time().'.'. $image_ext;
                        $participant->image = $img_name;   
                        //SAVE PROFILE IMAGE
                        if($path = $request->file('profileImage')->storeAs('public/participants/profile_images/', $img_name)):
                            //SAVE PROFILE IMAGE DB RECORD
                            
                            // $user->profile_pic = $img_name;
                            if($participant->save()):
                                    return response()->json(['success'=>'success']);
                            endif;
                        endif;
                    else:
                        if($participant->save()):
                            return response()->json(['success'=>'success']);
                        endif;
                    endif;          
                endif;                  
                
            else:
                if($request->profileImage):
                    $image_ext = $request->file('profileImage')->getClientOriginalExtension();
                    $img_name = $user_id.'_profile_pic_'.date('Y-m-d').'_'.time().'.'. $image_ext;
                    $participant->image = $img_name;   
                    //SAVE PROFILE IMAGE
                    if($path = $request->file('profileImage')->storeAs('public/participants/profile_images/', $img_name)):
                        //SAVE PROFILE IMAGE DB RECORD
                        
                        // $user->profile_pic = $img_name;
                        if($participant->save()):
                                return response()->json(['success'=>'success']);
                        endif;
                    endif;
                else:
                    if($participant->save()):
                        return response()->json(['success'=>'success']);
                    endif;
                endif;  


            endif;
            

        endif;
        return response()->json(['error'=>'error']);
    }

    public function submit_application(Request $request)
    {
        $user_id = Auth::user()->id;
        $validator = Validator::make($request->all(), 
        [            
            'title' => ['required', 'exists:titles,name'],
            'firstName' => ['required', 'alpha','min:3'],
            'middleName' => ['nullable', 'alpha_dash_space'],
            'lastName' => ['required', 'alpha', 'min:3'],
            'fullName' => ['required', 'alpha_dash_space'],
            'initials' => ['required', 'alpha_capital'],
            'dob' => ['required' , 'date','before:today'],
            'gender' => ['required', Rule::in(['Male', 'Female', 'Other'])],
            'idType' => ['required', Rule::in(['nic', 'passport'])],
            'citizenship' => ['required', Rule::in(['Sri Lankan', 'Foreign National'])],
                  
            'highestScoutAward' => ['nullable', 'exists:scout_awards,name'],
            'highestScoutAwardDate' => ['nullable', 'date', 'before:today'],
            'highestRoverAward' => ['nullable', 'exists:rover_awards,name'],
            'highestRoverAwardDate' => ['nullable', 'date', 'before:today'],

            'participantType' => ['required', Rule::in(['Rover', 'Scout Master'])],

            'crewNumber' => ['nullable', 'integer'],
            'crewDistrict' => ['nullable', 'exists:scout_districts,name'],
            'crewName'=> ['nullable', 'alpha_dash_space', 'min:3'],
            'mobileNumber'=>['required', 'numeric', 'digits_between:11,15'],
            'telephoneNumber'=>['required', 'numeric', 'digits_between:11,15'],            
            'address' => ['required', 'address'],
            'country' => ['required', 'exists:countries,name'],
            'zipCode' => ['nullable', 'numeric', 'digits_between:5,10'],
            
            'contactPersontTitle' => ['required', 'exists:titles,name'],
            'contactPersonName' => ['required', 'alpha_dash_space'],
            'contactPersonMobileNumber'=>['required', 'numeric', 'digits_between:11,15'],
            'contactPersonTelephoneNumber'=>['nullable', 'numeric', 'digits_between:11,15'],

            'educationDetails' => ['nullable', 'min:3'],

            'paymentDate'=>['required', 'before_or_equal:today'],
            'paymentReference'=>['required']


        ]);

        //CHECK UNIQUE TYPE AND VALIDATE UNIQUE ID
        if($request->idType == 'nic'):
            if(strlen($request->nic)>10):
            $uniqueID_validator =  Validator::make($request->all(), [
                'number' => ['required', 'numeric', 'digits:12'],
            ]);
            else:
            $uniqueID_validator =  Validator::make($request->all(), [
                'number' => ['required', 'alpha_num', 'min:10', 'regex:/^([0-9]{9}[x|X|v|V])$/'],
            ]);
            endif;
        else:
            $uniqueID_validator =  Validator::make($request->all(), [
                'number' => ['nullable', 'alpha_num', 'max:9' ],
            ]);
        endif;            

        //CHECK PARTICIPANT TYPE AND VALIDATE WARRANT INFO
        if($request->participantType == 'Rover'):
            $warrant_validator =  Validator::make($request->all(), [
                'warrantNumber' => ['nullable'],
                'warrantRank' => ['nullable', 'exists:warrant_ranks,name'],
                'warrantSection' => ['nullable', 'exists:warrant_sections,name'],
                'warrantValidDate' => ['nullable', 'date'],
            ]);
        else:
            $warrant_validator =  Validator::make($request->all(), [
                'warrantNumber' => ['required'],
                'warrantRank' => ['required', 'exists:warrant_ranks,name'],
                'warrantSection' => ['required', 'exists:warrant_sections,name'],
                'warrantValidDate' => ['required', 'date'],
            ]);
        endif;
        $participant = Participant::where('user_id', $user_id)->first();

        if($participant->image == Null):
            $image_validator =  Validator::make($request->all(), 
                [                         
                    'profileImage'=> ['required', 'image', 'mimes:jpeg,png'],
                ],
                [
                    'dimensions'=>'image must be cropped to a square shape (Ratio= 1:1)'
                ]
            );
        else:
            $image_validator =  Validator::make($request->all(), 
                [                         
                    'profileImage'=> ['nullable', 'image', 'mimes:jpeg,png'],
                ],
                [
                    'dimensions'=>'image must be cropped to a square shape (Ratio= 1:1)'
                ]
            );
        endif;

        if($participant->payment_proof == Null):
            $image_validator =  Validator::make($request->all(), 
                [                         
                    'paymentProof'=>['required', 'image', 'mimes:jpeg,png']
                ]
            );
        else:
            $image_validator =  Validator::make($request->all(), 
                [                         
                    'paymentProof'=>['nullable', 'image', 'mimes:jpeg,png']
                ]
            );
        endif;

        if($validator->fails() || $uniqueID_validator->fails() || $warrant_validator->fails() || $image_validator->fails()):
            return response()->json(['errors'=>$validator->errors()->merge($uniqueID_validator->errors())->merge($warrant_validator->errors())->merge($image_validator->errors())]);
        else:
            
            $participant->title = $request->title;
            $participant->first_name = $request->firstName;
            $participant->middle_names = $request->middleName;
            $participant->last_name = $request->lastName;
            $participant->full_name = $request->fullName;
            $participant->initials = $request->initials;
            $participant->dob = $request->dob;
            $participant->gender = $request->gender;
            $participant->citizenship = $request->citizenship;
            $participant->id_type = $request->idType;
            $participant->number = $request->number;
            $participant->scout_award = $request->highestScoutAward;
            $participant->scout_award_date = $request->highestScoutAwardDate;
            $participant->rover_award = $request->highestRoverAward;
            $participant->rover_award_date = $request->highestRoverAwardDate;

            $participant->participant_type = $request->participantType;
            $participant->warrant_number = $request->warrantNumber;
            $participant->warrant_rank = $request->warrantRank;
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
            $participant->application_submit = 1;
            $participant->submit_date = date('Y-m-d');
            $participant->payment_date = $request->paymentDate;
            $participant->payment_reference = $request->paymentReference;
            $participant->payment_submit = 1;

            if($request->paymentProof):
                $file_ext = $request->file('paymentProof')->getClientOriginalExtension();
                $file_name = $participant->id.'_'.date('Y-m-d').'_'.time().'.'. $file_ext;
          
                $participant->payment_proof = $file_name;          
                if($path = $request->file('paymentProof')->storeAs('public/participants/payments/',$file_name)):
                    
                    if($request->profileImage):
                        $image_ext = $request->file('profileImage')->getClientOriginalExtension();
                        $img_name = $user_id.'_profile_pic_'.date('Y-m-d').'_'.time().'.'. $image_ext;
                        $participant->image = $img_name;   
                        //SAVE PROFILE IMAGE
                        if($path = $request->file('profileImage')->storeAs('public/participants/profile_images/', $img_name)):
                            //SAVE PROFILE IMAGE DB RECORD
                            
                            // $user->profile_pic = $img_name;
                            if($participant->save()):
                                    return response()->json(['success'=>'success']);
                            endif;
                        endif;
                    else:
                        if($participant->save()):
                            return response()->json(['success'=>'success']);
                        endif;
                    endif;          
                endif;                  
                
            else:
                if($request->profileImage):
                    $image_ext = $request->file('profileImage')->getClientOriginalExtension();
                    $img_name = $user_id.'_profile_pic_'.date('Y-m-d').'_'.time().'.'. $image_ext;
                    $participant->image = $img_name;   
                    //SAVE PROFILE IMAGE
                    if($path = $request->file('profileImage')->storeAs('public/participants/profile_images/', $img_name)):
                        //SAVE PROFILE IMAGE DB RECORD
                        
                        // $user->profile_pic = $img_name;
                        if($participant->save()):
                                return response()->json(['success'=>'success']);
                        endif;
                    endif;
                else:
                    if($participant->save()):
                        return response()->json(['success'=>'success']);
                    endif;
                endif;  


            endif;
        endif;
        return response()->json(['error'=>'error']);
    }

    public function saveRegPayment(Request $request)
    {
      $user_id = Auth::user()->id;

      $validator = Validator::make($request->all(), 
        [     
            'paymentDate'=>['required', 'before_or_equal:today'],
            'paymentReference'=>['required'],
            'paymentProof'=>['required', 'image']
        ]
      );
      if($validator->fails()):
        return response()->json(['errors'=>$validator->errors()]);
      else:
        $participant = Participant::where('user_id', $user_id)->first();
        $participant->payment_date = $request->paymentDate;
        $participant->payment_reference = $request->paymentReference;
        $participant->payment_submit = 1;
  
        $file_ext = $request->file('paymentProof')->getClientOriginalExtension();
        $file_name = $participant->id.'_'.date('Y-m-d').'_'.time().'.'. $file_ext;
  
        $participant->payment_proof = $file_name;
  
        if($path = $request->file('paymentProof')->storeAs('public/participants/payments/',$file_name)):
          if($participant->save()):
            return response()->json(['success'=>'success']);
          endif;
  
        endif;
  
      endif;
      return response()->json(['error'=>'error']);
    }
    
    public function saveScannedApplication(Request $request)
    {
      $user_id = Auth::user()->id;

      $validator = Validator::make($request->all(), 
        [     
            'applicationProof'=>['required', 'image']
        ]
      );
      if($validator->fails()):
        return response()->json(['errors'=>$validator->errors()]);
      else:
        $participant = Participant::where('user_id', $user_id)->first();
  
        $file_ext = $request->file('applicationProof')->getClientOriginalExtension();
        $file_name = $participant->id.'_'.date('Y-m-d').'_'.time().'.'. $file_ext;
  
        $participant->application_proof = $file_name;
  
        if($path = $request->file('applicationProof')->storeAs('public/participants/applications/',$file_name)):
          if($participant->save()):
            return response()->json(['success'=>'success']);
          endif;
  
        endif;
  
      endif;
      return response()->json(['error'=>'error']);
    }


    public function deleteProfileImage(Request $request)
    {
        $image_name = Participant::where('user_id', Auth::user()->id )->first()->image;

        if(Participant::where('user_id', Auth::user()->id )->update(['image' => NULL]) && Storage::delete('public/participants/profile_images/'.$image_name)):
            return response()->json(['success'=>'success']);
        endif;
        return response()->json(['error'=>'error']);
    }

    public function deletePaymentProof(Request $request)
    {
        $image_name = Participant::where('user_id', Auth::user()->id )->first()->payment_proof;

        if(Participant::where('user_id', Auth::user()->id )->update(['payment_proof' => NULL]) && Storage::delete('public/participants/payments/'.$image_name)):
            return response()->json(['success'=>'success']);
        endif;
        return response()->json(['error'=>'error']);
    }
}
