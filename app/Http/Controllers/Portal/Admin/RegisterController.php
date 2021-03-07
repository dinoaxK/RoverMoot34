<?php

namespace App\Http\Controllers\Portal\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ApplicationApproveMail;
use App\Mail\ApplicationDeclineMail;
use App\Mail\PaymentApproveMail;
use App\Mail\PaymentDeclineMail;
use App\Models\Activity;
use App\Models\Participant;
use Dotenv\Store\File\Paths;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

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
        return view('portal.admin.register');
    }

    public function get_participants_list(Request $request)
    {
        if ($request->ajax()) {
            $data = Participant::where('created_at', '!=', Null);
            if($request->name!=null){
                $data = $data->where('first_name','like', '%'. $request->name.'%')
                ->orWhere('last_name','like', '%'. $request->name.'%')
                ->orWhere('full_name','like', '%'. $request->name.'%')
                ->orWhere('initials','like', '%'. $request->name.'%')
                ->orWhere('middle_names','like', '%'. $request->name.'%');
            }
            if($request->nic!=null){
                $data = $data->where('number','like','%'. $request->nic.'%');
            }            
            if($request->application!=null){
                if($request->application == 0){
                    $data = $data->where('application_status',NULL);
                }else{
                    $data = $data->where('application_status',$request->application);
                }
            }
            if($request->payment!=null){
                if($request->payment == 0){
                    $data = $data->where('payment_status',NULL);
                }else{
                    $data = $data->where('payment_status',$request->payment);
                }
            }
            if($request->registration!=null){
                if($request->registration == 0){
                    $data = $data->where('application_submit', 0)->orWhere('payment_submit', 0);
                }else if($request->registration == 1){
                    $data = $data->where('application_submit', 1)->orWhere('payment_submit', 1);
                }else if($request->registration == 2){
                    $data = $data->where('application_proof','!=', Null);
                }else if($request->registration == 3){
                    $data = $data->where('payment_status',1)->orWhere('application_status', 1);
                }
            }
            $data = $data->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
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
}
