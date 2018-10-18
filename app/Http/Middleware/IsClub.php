<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class IsClub
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       if ( $request->user() === null) {
            return response('insufficient permissions', 401);
        }
        if ( !in_array(Auth::user()->type, [2, 3, 4]) ) {
           abort(404) ;
        }
        return $next($request);
    }
}
