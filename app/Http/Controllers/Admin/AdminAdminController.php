<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller ;
use Illuminate\Http\Request;

use App\Model\Admin ;
use App\Model\User ;
use App\Model\clubBranche ;
use App\Model\Playground ;
use App\Model\Event ;
use App\Model\Challenge ;
use App\Model\Reservation ;
use App\Model\Sport ;

use App\DataTables\AdminsDatatable;

class AdminAdminController extends Controller
{
    public function main()
    {   
        ///////////////// get top player /////////////////////
        $topEventCreator        = getTopCount('createdEvents', 'created_events', 1) ;
        $topChallengeCreator    = getTopCount('createdChallenges', 'created_challenges', 1) ;
        $topappliedEvents       = getTopCount('appliedEvents', 'applied_events', 1) ;
        $topchallenged          = getTopCount('challengeEvents', 'challenge_events', 1) ;
        $topcandidatedEvents    = getTopCount('candidatedEvents', 'candidated_events', 1) ;
        $topPlayerReservations  = getTopCount('PlayerReservations', 'Player_reservations', 1) ;
        ///////////////// get top club /////////////////////
        $topclubBranches        = getTopCount('clubBranches', 'club_branches', 2) ;
        $topclubPlaygrounds     = getTopCount('clubPlaygrounds', 'club_playgrounds', 2) ;
        $topclubReservation     = getTopCount('clubReservation', 'club_reservation', 2) ;
        
        ///////////////// get top 10 players /////////////////////
        $topTenEventCreator        = getTopCount('createdEvents', 'created_events', 1, 10) ;
        $topTenChallengeCreator    = getTopCount('createdChallenges', 'created_challenges', 1, 10) ;
        $topTenappliedEvents       = getTopCount('appliedEvents', 'applied_events', 1, 10) ;
        $topTenchallenged          = getTopCount('challengeEvents', 'challenge_events', 1, 10) ;
        $topTencandidated          = getTopCount('candidatedEvents', 'candidated_events', 1, 10) ;
        $topTenReservations        = getTopCount('PlayerReservations', 'Player_reservations', 1, 10) ;
        ///////////////// get top 10 clubs /////////////////////
        $topTenclubBranches        = getTopCount('clubBranches', 'club_branches', 2, 10) ;
        $topTenclubPlaygrounds     = getTopCount('clubPlaygrounds', 'club_playgrounds', 2, 10) ;
        $topTenclubReservation       = getTopCount('clubReservation', 'club_reservation', 2, 10) ;
                
        //return $topTenReservations;

        $playersCount            = User::where('type', 1)->count() ;
        $clubsCount              = User::where('type', 2)->count() ;
        $clubBranchesCount       = clubBranche::count() ;
        $playgroundsCount        = Playground::count() ;
        $eventsCount             = Event::count() ;
        $challengesCount         = Challenge::count() ;
        $reservationsCount       = Reservation::count() ;
        $sportsCount             = Sport::count() ;
        
        //return $playgroundsCount ;
        return view('admin.home', compact('playersCount', 
                                            'clubsCount', 
                                            'clubBranchesCount', 
                                            'playgroundsCount', 
                                            'eventsCount',
                                            'challengesCount',
                                            'reservationsCount',
                                            'sportsCount',

                                            'topEventCreator',
                                            'topChallengeCreator',
                                            'topappliedEvents',
                                            'topchallenged',
                                            'topcandidatedEvents',
                                            'topPlayerReservations',
                                            'topclubBranches',
                                            'topclubPlaygrounds',
                                            'topclubReservation',
                                            'topTenEventCreator',
                                            'topTenChallengeCreator',
                                            'topTenappliedEvents',
                                            'topTenchallenged',
                                            'topTencandidated',
                                            'topTenReservations',
                                            'topTenclubBranches',
                                            'topTenclubPlaygrounds',
                                            'topTenclubReservation'
                                        ));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminsDatatable $admin)
    {
        /*if (admin()->user()->type == 1) {
            return 1 ;
        } else {
            return 2 ;
        }*/
    
        //return 1 ;
        return $admin->render('admin.Admins.index', ['title' => 'Admin Control']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = trans('admin.admin_create_title') ;
        return view('admin.Admins.create', compact('title')) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate(request(),
                [
                    'name'      => 'required',
                    'email'     => 'required|email|unique:admins',
                    'password'  => 'required|min:6',
                ],
                [],
                [
                    'name'      => 'Name',
                    'email'     => 'E-mail',
                    'password'  => 'Password',
                ]);
        $slugCode = substr(str_shuffle(str_repeat("0123456789", 5)), 0, 5);
        $slug = str_slug($data['name'] . '-' . $slugCode, '-');
        $activateCode = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 8)), 0, 8);

        $data['password']           =   bcrypt(request('password')) ;
        $data['slug']               =   $slug ;
        $data['type']               =   2 ;
        $data['admin_is_active']    =   1 ;
        $data['our_is_active']      =   1 ;
        $data['active_code']        =   $activateCode ;

        //return $data ;
        Admin::create($data) ;
        session()->flash('Success', 'Admin Account Added Successfully');
        return redirect(aurl('admins')) ;
        //return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        //return $admin ;
        //return view('admin.Admins.edit', ['title' => 'Admin Control'], ['admin' => 'admin']) ;
        $title = trans('admin.admin_control_title');
        return view('admin.Admins.edit', compact('admin', 'title')) ;
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
        $data = $this->validate(request(),
                [
                    'name'      => 'required',
                    'email'     => 'required|email|unique:admins,id,' . $id,
                    'password'  => 'sometimes|nullable|min:6',
                    'our_is_active' => 'required'
                ],
                [],
                [
                    'name'      => 'Name',
                    'email'     => 'E-mail',
                    'password'  => 'Password',
                    'Status'  => 'Status',
                ]);
        //return $data['our_is_active'] ;
         $slugCode = substr(str_shuffle(str_repeat("0123456789", 5)), 0, 5);
        $slug = str_slug($data['name'] . '-' . $slugCode, '-');
        $activateCode = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 8)), 0, 8);

        if (request()->has('password')) {
            $data['password']           =   bcrypt(request('password')) ;
        }

        $data['slug']               =   $slug ;
        //$data['type']               =   2 ;
        $data['admin_is_active']    =   1 ;
        //$data['our_is_active']      =   1 ;
        $data['active_code']        =   $activateCode ;

        //return $data ;
        Admin::where('id', $id)->update($data) ;
        session()->flash('Success', 'Admin Account Edited Successfully');
        return redirect(aurl('admins')) ;
        //return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //return $id;
        Admin::find($id)->delete() ;
        
        session()->flash('Success', 'Admin Acoount Deleted Successfully');
        return redirect(aurl('admins')) ;
    }

    public function multiDelete($value='')
    {
        if ( is_array( request('item') ) ) {
            Admin::destroy( request('item') ) ;
        }else{
            Admin::find( request('item') )->delete() ;
        }
        session()->flash('Success', 'Admin(s) Account Deleted Successfully');
        return redirect(aurl('admins')) ;
        //return back();
        //return request();
    }
}
