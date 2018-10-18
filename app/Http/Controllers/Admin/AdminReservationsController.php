<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller ;
use Illuminate\Http\Request;

use App\DataTables\ReservationsDatatable;

use App\Model\Reservation ;
use App\Model\User ;

class AdminReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ReservationsDatatable $reservation)
    {
        return $reservation->render('admin.Reservations.index', ['title' => 'Reservations Control']);
    }

     public function singleClubDetails(Reservation $Reservation)
    {
        $Reservation = Reservation::find($id);
        //return $Event ;
        return view('admin.Reservations.Pages.AdminReservation', compact('Reservation'));
    }


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
        $Reservation = Reservation::with('ReservationCreator.playerProfile')->find($id);

        $ResOwnerId = $Reservation->ReservationCreator->id ;
        if ($Reservation->ReservationCreator->id == $Reservation->ReservedClub->id) {
            $is_ownerClub = 'clubs' ;
            $is_owner = 'Owner';
            $ResOwner = User::with('clubProfile')->find($ResOwnerId) ;
        } else {
           $is_ownerClub = 'players' ;
           $is_owner = 'Player';
           $ResOwner = User::with('playerProfile')->find($ResOwnerId) ;
        }
       

        //return $ResOwner ;
        return view('admin.Reservations.Pages.AdminReservation', compact('Reservation', 'ResOwner', 'is_ownerClub', 'is_owner'));
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

   /* public function changeActivationStatus()
    {
        User::where('id', request()->target)
            ->where('type', 2)
            ->update(['our_is_active' => request()->status]);
            
        session()->flash('Success', trans('admin.updated_record'));
        return back() ;
    }*/
}
