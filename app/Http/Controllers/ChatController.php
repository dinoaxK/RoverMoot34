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
            if($message->user_id == Auth::user()->id):
                $chat='<p class="text-right"> '.$message->message.' <strong style="color: #000;" title="'.$message->created_at.'" > :You</strong> </p>
                <hr class="bg-light">'.$chat;
            elseif($message->user_id == 1):
                
                $chat='<p><strong style="color: #881919;" title="'.$message->created_at.'" > ADMIN: </strong>'.$message->message.' </p>
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
            preg_match('/fuck/', strtolower($request->message)) ||
            preg_match('/punda/', strtolower($request->message)) ||
            preg_match('/kotte/', strtolower($request->message)) ||
            preg_match('/oka/', strtolower($request->message)) ||
            preg_match('/okka/', strtolower($request->message)) ||
            preg_match('/suththukudi/', strtolower($request->message)) ||
            preg_match('/suttukudi/', strtolower($request->message)) ||
            preg_match('/kallawettama/', strtolower($request->message)) ||
            preg_match('/kalla/', strtolower($request->message)) ||
            preg_match('/wettama/', strtolower($request->message)) ||
            preg_match('/suck/', strtolower($request->message)) ||
            preg_match('/dick/', strtolower($request->message)) ||
            preg_match('/pussy/', strtolower($request->message)) ||
            preg_match('/ass/', strtolower($request->message)) ||
            preg_match('/masturbate/', strtolower($request->message)) ||
            preg_match('/masturbation/', strtolower($request->message)) ||
            preg_match('/cock/', strtolower($request->message)) ||
            preg_match('/boobs/', strtolower($request->message)) ||
            preg_match('/boob/', strtolower($request->message)) ||
            preg_match('/horny/', strtolower($request->message)) ||
            preg_match('/pee/', strtolower($request->message)) ||
            preg_match('/fucker/', strtolower($request->message)) ||
            preg_match('/huth/', strtolower($request->message)) ||
            preg_match('/paka/', strtolower($request->message)) ||
            preg_match('/kari/', strtolower($request->message)) ||
            preg_match('/wes/', strtolower($request->message)) ||
            preg_match('/hukan/', strtolower($request->message)) ||
            preg_match('/kimb/', strtolower($request->message)) ||
            preg_match('/puka/', strtolower($request->message)) ||
            preg_match('/walla/', strtolower($request->message)) ||
            preg_match('/paiya/', strtolower($request->message)) ||
            preg_match('/ponna/', strtolower($request->message)) 
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
