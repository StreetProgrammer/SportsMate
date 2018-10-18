<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller ;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\DataTables\PlayersDatatable;

use App\Model\User ;

class AdminPlayercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PlayersDatatable $player)
    {
        return $player->render('admin.Players.index', ['title' => 'Players Control']);
    }

    /*public function singlePlayesDetails(User $User)
    {
        $User = User::with('playerProfile')
                    ->with('sports')
                    ->with('appliedEvents')
                    ->with('createdChallenges')
                    ->with('challengeEvents')
                    ->with('createdEvents.candidate')
                    ->with('candidatedEvents')
                    ->with('createdSubEvents')
                    ->with('candidatedSubEvents')
                    ->with('PlayerReservations')
                    ->where('id', $User->id)
                            ->firstOrFail();
        //return $User ;
        return view('admin.players.Pages.AdminPlayerProfile', compact('User'));
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $User = User::with('playerProfile')
                    ->with('sports')
                    ->with('appliedEvents')
                    ->with('createdChallenges')
                    ->with('challengeEvents')
                    ->with('createdEvents.candidate')
                    ->with('candidatedEvents')
                    ->with('createdSubEvents')
                    ->with('candidatedSubEvents')
                    ->with('PlayerReservations')
                    ->where('id', $id)
                            ->firstOrFail();
        //return $User ;
        return view('admin.players.Pages.AdminPlayerProfile', compact('User'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function changeActivationStatus()
    {
        //$our_is_active = ( request()->status == bcrypt(1) ) ? 1 : 0 ;

        //return $our_is_active ;//request() ;
        User::where('id', request()->target)
            ->where('type', 1)
            ->update(['our_is_active' => request()->status]);
            
        session()->flash('Success', trans('admin.updated_record'));
        return back() ;
    }
}
