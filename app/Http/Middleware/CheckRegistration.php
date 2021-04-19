<?php

namespace App\Http\Middleware;

use App\Models\Participant;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRegistration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user_id = Auth::user()->id;
        $participant = Participant::where('user_id', $user_id)->first();
        if ($participant!= Null && $participant->application_status == 1 && $participant->payment_status == 1 && $participant->user->status == 'active' ) {
            return $next($request);
        }else {
            return redirect('/');
        }
        
    }
}
