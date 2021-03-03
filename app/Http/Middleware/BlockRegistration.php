<?php

namespace App\Http\Middleware;

use App\Models\Participant;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlockRegistration
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
        $participant = Null;
        $uid = Auth::user()->id;

        if(Participant::where('user_id', $uid)->first()!=Null || date('Y-m-d')<='2021-03-31'):
            return $next($request);
        else:
            return redirect('/login');
        endif;
    }
}
