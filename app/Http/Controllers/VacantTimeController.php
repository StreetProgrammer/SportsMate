<?php

namespace App\Http\Controllers;

use App\Model\User;
use App\Model\vacantTime;

use Illuminate\Http\Request;

class VacantTimeController extends Controller
{
    public function Add(Request $request)
    {
    	vacantTime::create([

                       'v_p_user_id'        => $request->playerId,//Auth::user()->id,
                       'day'      			=> $request->day,
                       'from'       		=> $request->from,
                       'to'    				=> $request->to,
                       'active'        		=> 1 ,
                    ]);

    	return 'true' ;
    }

    public function Delete(Request $request)
    {
    	vacantTime::destroy($request->vacantTimeId);

    	return 'true' ;
    }

     public function Edit(Request $request)
    {
    //	return $vacantTime ;
        $taraget_vacantTime = vacantTime::find($request->vacantTimeId);
    	$active_status = $taraget_vacantTime->active ;


    	if ($active_status == 0) {
    		$newStatus = 1 ;
    	}else{
    		$newStatus = 0 ;
    	}

    	$taraget_vacantTime = vacantTime::find($request->vacantTimeId);

		$taraget_vacantTime->active = $newStatus;

		$taraget_vacantTime->save();

        //return $taraget_vacantTime;

    	return 'true' ;
    }


}
