<?php

namespace App\Http\Controllers;

use App\Model\Sport;
use App\Model\Event;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class SportsController extends Controller
{

	public function index($id = '')
	{

		$id = sm_crypt($id, 'd') ;
		if ($id == '') {


			$Sports = Sport::with('users')->get() ;

			//return $Sports ;

			return view('sports.sportsShow', compact('Sports')) ;

		}


		$Sport = Sport::with('users')
						->with('sportEvents')
						->find($id) ;
		//return $Sport ;
		if ($Sport == null) {
			abort(404) ;
		}
		
		//return $Sport ;
		return view('player.sport.pages.sport', compact('Sport')) ;
	}

    public function AddToUser(Sport $Sport)
    {
    	$request = request() ;

        $Sport->AddUser($request) ;

        return back() ;
 		
    }
}
