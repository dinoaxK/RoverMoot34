<?php

namespace App\Http\Controllers\Portal\Admin;

use App\Exports\ParticipantExport;
use App\Http\Controllers\Controller;
use App\Mail\ApplicationApproveMail;
use App\Mail\ApplicationDeclineMail;
use App\Mail\GeneralEmail;
use App\Mail\PaymentApproveMail;
use App\Mail\PaymentDeclineMail;
use App\Models\Activity;
use App\Models\Participant;
use App\Models\ScoutDistrict;
use App\Models\User;
use Carbon\Carbon;
use Dotenv\Store\File\Paths;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Excel;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $districts = ScoutDistrict::all();
        $countries = Participant::where('country', '!=', NULL)->distinct()->select('country')->get();
        return view('portal.admin.register', compact('districts', 'countries'));
    }

    public function get_participants_list(Request $request)
    {
        if ($request->ajax()) :
            $data = Participant::where('created_at', '!=', Null);
            if($request->name!=null):
                $data = $data->where('first_name','like', '%'. $request->name.'%')
                ->orWhere('last_name','like', '%'. $request->name.'%')
                ->orWhere('full_name','like', '%'. $request->name.'%')
                ->orWhere('initials','like', '%'. $request->name.'%')
                ->orWhere('middle_names','like', '%'. $request->name.'%');
            endif; 
            if($request->nic!=null):
                $data = $data->where('number','like','%'. $request->nic.'%');
            endif;  
            if($request->district!=null):
                $data = $data->where('crew_district',$request->district);
            endif; 
            if($request->country!=null):
                $data = $data->where('country',$request->country);
            endif; 
            if($request->payment!=null):
                if($request->payment==0){
                    $data = $data->where('payment_proof',NULL);
                }else if($request->payment==1){
                    $data = $data->where('payment_proof','!=', NULL);
                }
            endif;          
            // if($request->application!=null){
            //     if($request->application == 0){
            //         $data = $data->where('application_status',NULL);
            //     }else{
            //         $data = $data->where('application_status',$request->application);
            //     }
            // }
            // if($request->payment!=null){
            //     if($request->payment == 0){
            //         $data = $data->where('payment_status',NULL);
            //     }else{
            //         $data = $data->where('payment_status',$request->payment);
            //     }
            // }
            if($request->registration!=null):
                if($request->registration == 0){
                    $data = $data->where('application_submit', 0);
                }else if($request->registration == 1){
                    $data = $data->where('application_submit', 1)->where('payment_submit', 1)->where('application_proof', Null);
                }else if($request->registration == 2){
                    $data = $data->where('application_proof','!=', Null);
                }else if($request->registration == 3){
                    $data = $data->where('payment_status',1)->where('application_status', 1);
                }
            endif; 
            $data = $data->get();
            return DataTables::of($data)
                ->editColumn('updated_at', function($data){ $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->updated_at); return $formatedDate; })                
                ->addIndexColumn()
                ->make(true);
        endif; 
    }

    public function loadApplication(Request $request)
    {
        $image = Participant::select('application_proof')->where('id', $request->id)->first();
        return $image->application_proof;
    }
    
    public function loadPayment(Request $request)
    {
        $image = Participant::select('payment_proof')->where('id', $request->id)->first();
        return $image->payment_proof;
    }

    public function approve_application(Request $request)
    {
        $participant = Participant::find($request->id);
        $email = $participant->user->email;

        
        if(Mail::to($email)->send(new ApplicationApproveMail($participant))):             
        else: 
            $activity = new Activity;
            $activity->user = Auth::user()->name;
            $activity->activity = 'approve application';          
            $activity->reference = $participant->id; 
            $activity->save(); 
            if(Participant::where('id', $request->id)->update(['application_status'=>1])):  
        
                return response()->json(['success'=>'success']);
            endif;
        endif;
        return response()->json(['error'=>'error']);        
    }    
    
    public function decline_application(Request $request)
    {
        $participant = Participant::find($request->id);        
        $email = $participant->user->email;

        $details = [
            'first_name' => $participant->first_name,
            'message' => $request->message
        ];

        if(Mail::to($email)->send(new ApplicationDeclineMail($details))):             
        else: 
            $activity = new Activity;
            $activity->user = Auth::user()->name;
            $activity->activity = 'decline application';          
            $activity->reference = $participant->id; 
            $activity->save(); 
            if(Participant::where('id', $request->id)->update(['application_status'=>2, 'application_proof'=>Null, 'submit_date'=>Null, 'application_submit'=>0, 'application_status_msg'=>$request->message ]) && Storage::delete('public/participants/applications/'.$participant->application_proof)):            

                return response()->json(['success'=>'success']);
            endif;
            
        endif;
        return response()->json(['error'=>'error']);     
    }

    public function approve_payment(Request $request)
    {        
        $participant = Participant::find($request->id);
        $email = $participant->user->email;


        if(Mail::to($email)->send(new PaymentApproveMail($participant))):             
        else: 
            $activity = new Activity;
            $activity->user = Auth::user()->name;
            $activity->activity = 'approve payment';          
            $activity->reference = $participant->id; 
            $activity->save();   
            if(Participant::where('id', $request->id)->update(['payment_status'=>1])):
          
                return response()->json(['success'=>'success']);
            endif;
        endif;
        return response()->json(['error'=>'error']);  
    }    
    
    public function decline_payment(Request $request)
    {
        $participant = Participant::find($request->id);
        $email = $participant->user->email;

        $details = [
            'first_name' => $participant->first_name,
            'message' => $request->message
        ];

        if(Mail::to($email)->send(new PaymentDeclineMail($details))):             
        else: 
            $activity = new Activity;
            $activity->user = Auth::user()->name;
            $activity->activity = 'decline payment';          
            $activity->reference = $participant->id; 
            $activity->save(); 
            if(Participant::where('id', $request->id)->update(['payment_status'=>2, 'payment_proof'=>Null, 'payment_submit'=>0, 'payment_status_msg'=>$request->message ]) && Storage::delete('public/participants/payments/'.$participant->payment_proof)):

                return response()->json(['success'=>'success']);
            endif;
        endif;
        return response()->json(['error'=>'error']);     
    }

    function excel(Request $request)
    {
        $participant_data = Participant::where('created_at', '!=', Null);
        if($request->name != Null || $request->name != ""):
            $participant_data = $participant_data->where('first_name','like', '%'. $request->name.'%')
            ->orWhere('last_name','like', '%'. $request->name.'%')
            ->orWhere('full_name','like', '%'. $request->name.'%')
            ->orWhere('initials','like', '%'. $request->name.'%')
            ->orWhere('middle_names','like', '%'. $request->name.'%');
        endif; 
        if($request->nic!=null || $request->nic != ""):
            $participant_data = $participant_data->where('number','like','%'. $request->nic.'%');
        endif; 

        if($request->district!=null || $request->district != ""):
            $participant_data = $participant_data->where('crew_district',$request->district);
        endif;   
        
        if($request->country!=null):
            $participant_data = $participant_data->where('country',$request->country);
        endif; 
        if($request->payment!=null):
            if($request->payment==0){
                $participant_data = $participant_data->where('payment_proof',NULL);
            }else if($request->payment==1){
                $participant_data = $participant_data->where('payment_proof','!=', NULL);
            }
        endif;             
        // if($request->application!=null || $request->application != ""){
        //     if($request->application == 0){
        //         $participant_data = $participant_data->where('application_status',NULL);
        //     }else{
        //         $participant_data = $participant_data->where('application_status',$request->application);
        //     }
        // }
        // if($request->payment!=null || $request->payment != ""){
        //     if($request->payment == 0){
        //         $participant_data = $participant_data->where('payment_status',NULL);
        //     }else{
        //         $participant_data = $participant_data->where('payment_status',$request->payment);
        //     }
        // }
        if($request->registration!=null || $request->registration != ""):
            if($request->registration == 0){
                $participant_data = $participant_data->where('application_submit', 0);
            }else if($request->registration == 1){
                $participant_data = $participant_data->where('application_submit', 1)->where('payment_submit', 1)->where('application_proof', Null);
            }else if($request->registration == 2){
                $participant_data = $participant_data->where('application_proof','!=', Null);
            }else if($request->registration == 3){
                $participant_data = $participant_data->where('payment_status',1)->where('application_status', 1);
            }
        endif; 
        $participant_data = $participant_data->get();

        foreach($participant_data as $participant)
        {
            $participant_array[] = array(
                $participant->id,
                $participant->crew_district,
                $participant->title, 
                $participant->first_name,
                $participant->middle_names, 
                $participant->last_name,
                $participant->initials,
                $participant->full_name,
                $participant->dob,
                $participant->gender,
                $participant->citizenship,
                $participant->id_type,
                $participant->number,
                $participant->education,
                $participant->scout_award,
                $participant->scout_award_date,
                $participant->rover_award,
                $participant->rover_award_date,
                $participant->participant_type,
                $participant->warrant_number,
                $participant->warrant_expire,
                $participant->crew_number.' '.$participant->crew_district.' '.$participant->crew_name,
                $participant->mobile,
                $participant->telephone,
                $participant->address,
                $participant->country, 
                $participant->zip, 
                $participant->contact_person_title.' '.$participant->contact_person_name, 
                $participant->contact_person_mobile, 
                $participant->contact_person_telephone, 
                $participant->submit_date, 
                $participant->payment_date, 
                $participant->payment_reference
            );
        }

        $participant_array = new ParticipantExport($participant_array);
        return Excel::download($participant_array, $request->district.'Participants_'.date('Y-m-d H:i:s').'.xlsx');

        return redirect()->route('admin.register');


    }

    public function send_email(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'subject' => ['required'],
            'emailBody' => ['required'],
        ]);

        $data = User::where('users.created_at', '!=', Null)->where( 'email_verified_at', '!=', Null )->join('participants', 'users.id', '=', 'participants.user_id');        
        if($request->nameemail!=null){
            $data = $data->where('first_name','like', '%'. $request->nameemail.'%')
            ->orWhere('last_name','like', '%'. $request->nameemail.'%')
            ->orWhere('full_name','like', '%'. $request->nameemail.'%')
            ->orWhere('initials','like', '%'. $request->nameemail.'%')
            ->orWhere('middle_names','like', '%'. $request->nameemail.'%');
        }
        if($request->nicemail!=null){
            $data = $data->where('number','like','%'. $request->nicemail.'%');
        }          
        
        if($request->districtemail!=null){
            $data = $data->where('crew_district',$request->districtemail);
        }     
        
        if($request->countryemail!=null):
            $data = $data->where('country',$request->countryemail);
        endif;        
        // if($request->applicationemail!=null){
        //     if($request->applicationemail == 0){
        //         $data = $data->where('application_status',NULL);
        //     }else{
        //         $data = $data->where('application_status',$request->applicationemail);
        //     }
        // }
        // if($request->paymentemail!=null){
        //     if($request->paymentemail == 0){
        //         $data = $data->where('payment_status',NULL);
        //     }else{
        //         $data = $data->where('payment_status',$request->paymentemail);
        //     }
        // }
        if($request->registrationemail!=null){
            if($request->registrationemail == 0){
                $data = $data->where('application_submit', 0);
            }else if($request->registrationemail == 1){
                $data = $data->where('application_submit', 1)->where('payment_submit', 1)->where('application_proof', Null);
            }else if($request->registrationemail == 2){
                $data = $data->where('application_proof','!=', Null);
            }else if($request->registrationemail == 3){
                $data = $data->where('payment_status',1)->where('application_status', 1);
            }
        }
        $data = $data->get();

        if($validator->fails()):
            return response()->json(['errors'=>$validator->errors()]);
        else:

            $iteration = 0;
            $count = 0;
            foreach ($data as $participant):
                $delay_seconds = $iteration + 15;
                $details = [
                    'name' => $participant->name,
                    'email' => $participant->email,
                    'message' => $request->emailBody,
                    'subject' => $request->subject
                ];

                // echo $participant->email;
                // echo $delay_seconds;
                if( $count < 200 ):
                    Mail::mailer('smtp2')->to($participant->email)->later(now()->addSeconds($delay_seconds), new GeneralEmail($details));
                elseif( $count < 400 ):
                    Mail::mailer('smtp')->to($participant->email)->later(now()->addSeconds($delay_seconds), new GeneralEmail($details));
                elseif( $count < 600 ):
                    Mail::mailer('smtp3')->to($participant->email)->later(now()->addSeconds($delay_seconds), new GeneralEmail($details));
                elseif( $count < 800 ):
                    Mail::mailer('smtp4')->to($participant->email)->later(now()->addSeconds($delay_seconds), new GeneralEmail($details));
                elseif( $count < 1000 ):
                    Mail::mailer('smtp5')->to($participant->email)->later(now()->addSeconds($delay_seconds), new GeneralEmail($details));
                endif;
                $iteration = $iteration + 5;
                $count ++;
                // sleep(5);
            endforeach;
            return response()->json(['success'=>'success']);

        endif;
        return response()->json(['error'=>'error']);
    }
}
