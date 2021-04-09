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
        $role = Auth::user()->role;

        if( $role == 'foreign' ||  $role == 'super_admin' ):
            return $next($request);
        else:
            return redirect('/login');
        endif;
    }
}
