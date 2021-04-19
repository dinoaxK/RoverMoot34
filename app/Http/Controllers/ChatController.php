<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use App\Models\LoginDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
                $chat='<p class="text-right"> '.$message->message.' <strong style="color: #000;"> :You</strong> '.$message->created_at.'</p>
                <hr class="bg-light">'.$chat;
            elseif($message->user_id == 1):
                
                $chat='<p>'.$message->created_at.' <strong style="color: #881919;"> ADMIN: </strong>'.$message->message.' </p>
                <hr class="bg-light">'.$chat;
            else:
                $chat='<p>'.$message->created_at.' <strong style="color: '.$color.';"> '.$message->user->participant->first_name.': </strong>'.$message->message.' </p>
                <hr class="bg-light">'.$chat;
            endif;
        }
        return $chat;
    }

    public function sendMessage(Request $request)
    {

        if (
            preg_match('/\bfuck\b/', $request->message) ||
            preg_match('/\bsuck\b/', $request->message) ||
            preg_match('/\bdick\b/', $request->message) ||
            preg_match('/\bcock\b/', $request->message) 
            ) {
            return 'bad words';
        }
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
        $current_timestamp = strtotime(date('Y-m-d H:i:s'). '-30 second');
        $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
        $users = LoginDetail::where('user_id', '!=', Auth::user()->id)->where('user_id', '!=', 1)->get();
        $user_list = '<p>ADMIN</p><hr>';
        foreach ($users as $user) {
            if($user->updated_at > $current_timestamp):
                $user_list .= '<p>'.$user->user->name.'</p>';
            endif;
        
        }
        if ($user_list == '<p>ADMIN</p><hr>') {
            $user_list .= 'No Active users';
        }
        return $user_list;
    }
}
