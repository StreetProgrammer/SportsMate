<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller ;
use Illuminate\Http\Request;

use App\DataTables\ClubsDatatable;

use App\Model\User ;
use App\Model\Rejectmsg ;
use App\Notifications\ClubAccountRejected ;
use App\Notifications\ClubAccountAccepted ;

class AdminClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ClubsDatatable $club)
    {
        return $club->render('admin.Clubs.index', ['title' => 'Club Control']);
    }

     public function singleClubDetails(User $User)
    {
        $User = User::with('clubProfile')
                    ->with('clubBranches')
                    ->with('clubPlaygrounds')
                    ->with('clubReservation')
                    ->where('id', $User->id)
                            ->firstOrFail();
        //return $User ;
        return view('admin.Clubs.Pages.AdminClubProfile', compact('User'));
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
         $User = User::with('clubProfile')
                    ->with('clubBranches')
                    ->with('clubPlaygrounds')
                    ->with('clubReservation')
                    ->where('id', $id)
                    ->firstOrFail();
        //return $User ;
        return view('admin.Clubs.Pages.AdminClubProfile', compact('User'));
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

    public function changeActivationStatus(Request $request)
    {
        $club = User::find($request->target);
        $OldRejectmsg = Rejectmsg::where( 'taraget_id', $request->target )->delete();

        if ($request->has('rejectReason')) {

            User::where('id', request()->target)
                  ->where('type', 2)
                  ->update(['our_is_active' => request()->status]);

            $Rejectmsg = Rejectmsg::create([

                'taraget_id'              => request()->target ,// id for the event contain that SubEvent
                'taraget_type'            => 'club',
                'reason'                  => request()->rejectReason , // SubEvent Creator ID
           ]);

            
            //return $admins ;

            $club->notify(new ClubAccountRejected($club->name, request()->rejectReason));
            //\Notification::send($club, new NewClubRegistered($club));

        }elseif ( request()->status = 1 ) {

            User::where('id', request()->target)
                  ->where('type', 2)
                  ->update(['our_is_active' => request()->status]);

            $club->notify(new ClubAccountAccepted($club->name));
        }
        

        session()->flash('Success', trans('admin.updated_record'));
        return back() ;
    }

    /*public function changeActivationStatus()
    {
        User::where('id', request()->target)
            ->where('type', 2)
            ->update(['our_is_active' => request()->status]);
            
        session()->flash('Success', trans('admin.updated_record'));
        return back() ;
    }*/
}
