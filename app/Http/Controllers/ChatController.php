<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use App\Models\LoginDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isEmpty;

class ChatController extends Controller
{    
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware(['auth', 'check.registration']);
    }

    public function index()
    {
        return view('chat');
    }

    public function fetchChat()
    { 
        $messages = ChatMessage::all();
        $chat=NULL;
        foreach ($messages as $message) {
            $number1 =  substr(str_repeat(0, 6) . $message->user->id, -3);
            $number2 =  substr(str_repeat(0, 6) . ($message->user->id*5), -3);
            $color = '#'.$number2.$number1;
            if($message->user_id == 1):
                
                $chat='<p class="text-center"><strong style="color: #881919;" title="'.$message->created_at.'" > ADMIN: </p><p class="text-center bg-warning"></strong><b>'.$message->message.'</b> </p>
                <hr class="bg-light">'.$chat;
            elseif($message->user_id == Auth::user()->id):
                $chat='<p class="text-right"> '.$message->message.' <strong style="color: #000;" title="'.$message->created_at.'" > :You</strong> </p>
                <hr class="bg-light">'.$chat;
            else:
                $chat='<p><strong style="color: '.$color.';" title="'.$message->created_at.'" > '.$message->user->participant->first_name.': </strong>'.$message->message.' </p>
                <hr class="bg-light">'.$chat;
            endif;
        }
        return $chat;
    }

    public function sendMessage(Request $request)
    {

        if (
            preg_match('/\bfuck\b/', strtolower($request->message)) ||
            preg_match('/\bsuck\b/', strtolower($request->message)) ||
            preg_match('/\bsex\b/', strtolower($request->message)) ||
            preg_match('/\bdick\b/', strtolower($request->message)) ||
            preg_match('/\bpussy\b/', strtolower($request->message)) ||
            preg_match('/\bass\b/', strtolower($request->message)) ||
            preg_match('/\bmasturbate\b/', strtolower($request->message)) ||
            preg_match('/\bmasturbation\b/', strtolower($request->message)) ||
            preg_match('/\bcock\b/', strtolower($request->message)) ||
            preg_match('/\bboobs\b/', strtolower($request->message)) ||
            preg_match('/\bboob\b/', strtolower($request->message)) ||
            preg_match('/\bhorny\b/', strtolower($request->message)) ||
            preg_match('/\bpee\b/', strtolower($request->message)) ||
            preg_match('/\bfucker\b/', strtolower($request->message)) 
            ):
            return 'bad words';
        endif;

        $validator = Validator::make($request->all(), [
            'message'=>['required']
        ]);

        if($validator->fails()):
            return response()->json(['errors'=>$validator->errors()]);
        endif;


        $message = new ChatMessage();

        $message->user_id=Auth::user()->id;
        $message->message=$request->message;
        $message->save();

    }

    public function stillActive()
    {
        if(LoginDetail::where('user_id', Auth::user()->id)->first()):
            LoginDetail::where('user_id', Auth::user()->id)->update(['user_id'=> Auth::user()->id]);
        else:
            LoginDetail::create(['user_id'=> Auth::user()->id]);
        endif;
    }

    public function activeUsers()
    {        
        $current_timestamp = strtotime(date('Y-m-d H:i:s'). '-60 second');
        $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
        $users = LoginDetail::where('user_id', '!=', Auth::user()->id)->where('user_id', '!=', 1)->get();
        $user_list = '<p>ADMIN</p><hr>';
        foreach ($users as $user) {
            if($user->updated_at > $current_timestamp):
                $user_list .= '<p>'.$user->user->participant->initials.' '.$user->user->participant->last_name.'</p>';
            endif;
        
        }
        if ($user_list == '<p>ADMIN</p><hr>') {
            $user_list .= 'No Active users';
        }
        return $user_list;
    }
}
