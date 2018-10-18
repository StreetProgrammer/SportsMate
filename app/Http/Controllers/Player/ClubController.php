<?php

namespace App\Http\Controllers\Player;

//use App\Http\Controllers\App\User ;
use Storage ;

use App\Http\Controllers\Controller ;
use App\Notifications\NewClubRegistered ;
use App\Notifications\NewClubFixedErr ;
use App\Notifications\NewClubEditRequest ;

use App\Model\Admin;
use App\Model\Sport;
use App\Model\User;
use App\Model\clubProfile;
use App\Model\governorate;
use App\Model\PendingEdit ;

use App\DataTables\ClubUsersDatatable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Gate ;

class ClubController extends Controller
{
    /*
    *function to handle send data to the app admin to accept or reject club profile
    */
    public function index($id)
    {
        $club = User::find(sm_crypt($id, 'd'));
        
        //return $club ;

        return view('player.club.pages.club', compact('club') );
    }

}
