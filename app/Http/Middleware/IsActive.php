<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class IsActive
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
            //return response('insufficient permissions', 401);
            return redirect('/login');
            //abort(404) ;
        }
        if (Auth::user()->our_is_active == 0) {
            //return 'deactivated account' ;
           //abort(404) ;
            //return new Response(view('club.Profile.Pages.DeActivated'));
           //return view('club.Profile.Pages.ourIsActive');
            return redirect('/handlepreregister?type=2');
        } elseif (Auth::user()->our_is_active == 2){

            return new Response(view('club.register.pending'));

        } elseif (Auth::user()->our_is_active == 3){

            return redirect('/handlepreregister?type=2');
            //return new Response(view('club.Profile.Pages.ourIsActive'));
        }  
        
        return $next($request);
        
    }
}
