<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class ClubRegister
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
            //return redirect('/handlepreregister?type=2');
        }else{
            if (Auth::user()->our_is_active == 0) {
            //we need to do something to => return 'deactivated account' ;
            //abort(404) ;
            } elseif (Auth::user()->our_is_active == 1){

                return redirect('/club/' . Auth::user()->slug);

            } elseif (Auth::user()->our_is_active == 2){

                return new Response(view('club.register.pending'));

            } elseif (Auth::user()->our_is_active == 3){

                /*return redirect('/handlepreregister?type=2');*/
                //return new Response(view('club.Profile.Pages.ourIsActive'));
            }  
        }
        
        
        return $next($request);

    }
}
