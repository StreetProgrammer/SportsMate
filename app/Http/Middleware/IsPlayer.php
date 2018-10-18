<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class IsPlayer
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
        if (Auth::user()->type != 1) {
           abort(404) ;
        }
        return $next($request);
    }
}
