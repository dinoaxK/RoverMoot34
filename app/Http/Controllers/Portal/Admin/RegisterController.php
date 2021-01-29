<?php

namespace App\Http\Controllers\Portal\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ApplicationApproveMail;
use App\Mail\ApplicationDeclineMail;
use App\Mail\PaymentApproveMail;
use App\Mail\PaymentDeclineMail;
use App\Models\Participant;
use Dotenv\Store\File\Paths;
use Illuminate\Http\Request;
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
            $data = Participant::where('application_submit', 1)->orWhere('payment_submit', 1)->latest();
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
            if(Participant::where('id', $request->id)->update(['payment_status'=>2, 'payment_proof'=>Null, 'payment_submit'=>0, 'payment_status_msg'=>$request->message ]) && Storage::delete('public/participants/payments/'.$participant->payment_proof)):
         
                return response()->json(['success'=>'success']);
            endif;
        endif;
        return response()->json(['error'=>'error']);     
    }
}
