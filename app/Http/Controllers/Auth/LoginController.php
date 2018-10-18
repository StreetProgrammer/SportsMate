<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }
        
        
        if (Auth::user()->type == 1) { //if [[ Player ]]
            return '/home' ;
        } 
        elseif(Auth::user()->type == 2) { //if [[ club owner ]]
            return '/club/'.Auth::user()->id ;
        }  
        elseif(Auth::user()->type == 3) { //if [[ club admin ]]
            return '/club/'.Auth::user()->club_id ;
        }  
        elseif(Auth::user()->type == 4) { //if [[ club manager ]]
            return '/club/'.Auth::user()->club_id ;
        }
        

        //return Auth::user()->type == 1 ? '/home' : '/club/'.Auth::user()->slug;
        //return property_exists($this, 'redirectTo') && Auth::user()->type == 1 ? $this->redirectTo : '/home';
    }
}
