<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
//***************** start routes for Home  **************//

Route::get('/', 'HomeController@index'); // final

//************************ start routes for Home ********************//

Route::get('/olfat', function () {
    //$user = App\User::with('roles')->first();
    $userModel = '\App\Model\User' ;

    $newReords= [
        'name' => 'Taha Mostafa Ali',
        'email' => 'tahamostfa8@gmail.com'
    ];

    $Model = $userModel::with('sports.playgrounds')->find(21);

    foreach ($newReords as $key => $record) {
        $Model->$key = $record;
    }
    

    $Model->save();
    return $Model;
});

//Route::get('/ll/', 'ClubProfilesController@ll');
//Route::get('/club/maininfodivload', 'ClubProfilesController@mainInfoDivLoad');
Route::get('/tabs', function () {

	$events = DB::table('events')
            ->Join('users AS Creator', 'events.E_creator_id', '=', 'Creator.id')
            ->Join('users AS Candidate', 'events.E_candidate_id', '=', 'Candidate.id')
            ->select(['events.*', 'Creator.name as Creator', 'Candidate.name as Candidate'])
            ->get();
	//if i want to get playground with it's user and so on user with it's profile !!!

	//$playgrounds = \App\Playground::with('branch.user.clubProfile')->get() ;
    //$CandidateGames =  \App\SubEvent::where('S_E_Event_id', '=', 899)
                                //->where('S_E_winer_id', '=', 2)
                                //->count();
	//$SubEvents = \App\SubEvent::with('SubEventResult')
		//						->with('MainEvent')
			//					->count() ;

	return $events ;
    //return view('club.clubEditProfile');

});

Auth::routes();

Route::get('/preregister', function () {
    return view('auth/preRegister');
});

Route::any('/handlepreregister',function(){
    //$type = Input::get ( 'type' );
    $type = $_GET['type'];

    //return $type ;
    if ($type == 1) {
        //return 1 ;
        return redirect('register');
    } elseif ($type == 2) {
        $governorate = \App\Model\governorate::with('areas')->get();
         return View::make("club.register.reghome", compact('governorate'));
    } else {
        return 3 ;
    }
})->middleware('clubRegister');


Route::get('/home', 'HomeController@index')->name('home'); // final





Route::group(['namespace' => 'Player'], function(){


//***************** routes for search **************//
    Route::get('/search/{model?}', 'SearchController@index'); // final
    
    Route::get('/getPlayerSearchResults', 'SearchController@getPlayerSearchResults'); // final

    Route::get('/freshPlayerSearchResults', 'SearchController@freshPlayerSearchResults'); // final

    Route::get('/getPlayerFilter', 'SearchController@getPlayerFilter'); // final

    Route::get('/getPlaygroundSearchResults', 'SearchController@getPlaygroundSearchResults'); // final

    Route::get('/freshPlaygroundSearchResults', 'SearchController@freshPlaygroundSearchResults'); // final

    Route::get('/getPlaygroundFilter', 'SearchController@getPlaygroundFilter'); // final
//**********************************************************************//

    //***************** routes for Players **************//

    Route::get('/profile/{id}', 'PlayerProfilesController@index'); // final

    //Route::get('/profile/{id}/edit', 'PlayerProfilesController@editProfile');

    //Route::post('/playerProfileEdit', 'PlayerProfilesController@updateProfile');

    Route::post('/player/changeProfilePhoto', 'PlayerProfilesController@updatePlayerProfilePhoto'); //final
    Route::post('/player/editMainInfo', 'PlayerProfilesController@editMainInfo'); //final
    Route::post('/player/attachSport', 'PlayerProfilesController@attachSport'); //final
    Route::post('/player/detachSport', 'PlayerProfilesController@detachSport'); //final
    Route::post('/player/updateSportRole', 'PlayerProfilesController@updateSportRole'); //final


    //**********************************************************************//


    //***************** start routes for clubs *********************************//

    Route::get('/Club/{id}', 'ClubController@index'); //final

    //Route::get('/Branch/{clubBranche}/Display', 'ClubController@BranchInfo');

    //Route::post('/clubProfileEdit', 'ClubProfileController@updateProfile');

    //=======================================================================//


    //***************** end routes for clubs *********************************//

    Route::post('/NewBranch', 'ClubBranchesController@create');

    Route::get('/Branch/{clubBranche}/Display', 'ClubBranchesController@BranchInfo');

    //Route::post('/clubProfileEdit', 'ClubProfileController@updateProfile');

    //=======================================================================//

    //***************** routes for playgrounds **************//

    //Route::get('/Playground/{Playground}/Display', 'PlaygroundsController@PlaygroundInfo');

    Route::get('/Playground/{id}', 'PlaygroundsController@index'); // final

    Route::post('/Branch/{clubBranche}/playground', 'PlaygroundsController@create');

    Route::get('/Playground/{Playground}/Edit', 'PlaygroundsController@PlaygroundEdit');

    //Route::post('/clubProfileEdit', 'ClubProfileController@updateProfile');

    //**********************************************************************//


    //***************** routes for Sports **************//

    Route::post('/Sports/{Sport}/Add', 'SportsController@AddToUser');

    //Route::get('/Sport/{Sport?}', 'SportsController@index');

    Route::get('/Sport/{Sport?}', 'SportsController@index'); // final

    //Route::post('/clubProfileEdit', 'ClubProfileController@updateProfile');

    //**********************************************************************//

    //***************** routes for Sports **************//

    Route::get('/Club/id}', 'SportsController@index'); // final

    //Route::post('/clubProfileEdit', 'ClubProfileController@updateProfile');

    //**********************************************************************//


    //***************** routes for Event  **************//

    //Route::get('/Event/Show/{id}', 'EventController@index');

    Route::get('/Event/Show/{id}', 'EventController@index'); // final

    Route::post('/Event/Add', 'EventController@Add'); // final

    Route::post('/Event/{User}/Save', 'EventController@Save'); // final

    Route::post('/Event/Apply', 'EventController@Apply'); // final

    //Route::post('/Event/{Event}/Apply', 'EventController@Apply'); //for add new Applicant for this Event
    //Route::post('/Event/{Event}/Accept', 'EventController@Accept');
    //Route::post('/Event/{Event}/SuggestPlayground', 'EventController@SuggestPlayground');
    //Route::post('/Event/{Event}/AcceptSuggestedPlayground', 'EventController@AcceptSuggestedPlayground');
    Route::post('/Event/AcceptApplicant', 'EventController@AcceptApplicant'); // final

    Route::post('/Event/SuggestPlayground', 'EventController@SuggestPlayground'); //final

    Route::post('/Event/AcceptRejectPlayground', 'EventController@AcceptRejectPlayground'); // final

    Route::post('/Event/{Event}/refuseSuggestedPlayground', 'EventController@refuseSuggestedPlayground');

    Route::post('/Event/{Event}/SuggestResult', 'EventController@SuggestResult');

    Route::post('/Event/{Event}/AcceptOrRefuseSuggestedResult', 'EventController@AcceptOrRefuseSuggestedResult');

    Route::post('/Event/{Event}/refuseSuggestedResult', 'EventController@refuseSuggestedResult');

    //**********************************************************************//

    //***************** routes for Challenge  **************//

    //Route::get('/Challenge/Show/{Challenge?}', 'ChallengeController@index');

    Route::get('/Challenge/Show/{id}', 'ChallengeController@index'); // final

    Route::post('/Challenge/Add', 'ChallengeController@Add'); // final

    Route::post('/Challenge/AcceptRejectchallenge', 'ChallengeController@AcceptRejectchallenge'); // final

    Route::post('/Challenge/AcceptRejectPlayground', 'ChallengeController@AcceptRejectPlayground'); // final

    Route::post('/Challenge/SuggestPlayground', 'ChallengeController@SuggestPlayground'); //final

    Route::post('/Challenge/AcceptRejectPlayground', 'ChallengeController@AcceptRejectPlayground'); // final

    Route::post('/Challenge/{User}/Save', 'ChallengeController@Save');

    //Route::post('/Challenge/{Challenge}/Accept', 'ChallengeController@Accept');

    //Route::post('/Challenge/{Challenge}/SuggestPlayground', 'ChallengeController@SuggestPlayground');

    //Route::post('/Challenge/{Challenge}/AcceptSuggestedPlayground', 'ChallengeController@AcceptSuggestedPlayground');

    //Route::post('/Challenge/{Challenge}/refuseSuggestedPlayground', 'ChallengeController@refuseSuggestedPlayground');

    //Route::post('/Challenge/{Challenge}/SuggestResult', 'ChallengeController@SuggestResult');

    //Route::post('/Challenge/{Challenge}/AcceptOrRefuseSuggestedResult', 'ChallengeController@AcceptOrRefuseSuggestedResult');

    //Route::post('/Challenge/{Challenge}/refuseSuggestedResult', 'ChallengeController@refuseSuggestedResult');

    //**********************************************************************//


    //***************** Start routes for SubEvent  **************//

    Route::post('/SubEvent/{Event}/Add', 'SubEventController@AddSubEvent');
    Route::post('/SubEvent/{SubEvent}/DeleteGame', 'SubEventController@deleteSuggestedGame');
    Route::post('/SubEvent/{SubEvent}/RefuseGame', 'SubEventController@refuseSuggestedGame');
    Route::post('/SubEvent/{SubEvent}/AcceptGame', 'SubEventController@acceptSuggestedGame');

    //rate %%%%%%%%%%% partial views %%%%%%%%%%% rate//
    Route::get('/Event/{Event}/Games', 'SubEventController@EventGames');
    //rate %%%%%%%%%%% partial views %%%%%%%%%%% rate//
    //*******************End routes for SubEvent***************************//


    //***************** routes for Event  **************//

    //Route::get('/Event/Show/{Event?}', 'EventController@index');

    Route::post('/Reservation/{Playground}/Add', 'ReservationController@Save');

    //Route::post('/Event/{User}/Save', 'EventController@Save');

    //Route::post('/Event/{Event}/Apply', 'EventController@Apply'); //for add new Applicant for this Event

    //Route::post('/Event/{Event}/Accept', 'EventController@Accept');

    //Route::post('/Event/{Event}/SuggestPlayground', 'EventController@SuggestPlayground');

    //Route::post('/Event/{Event}/AcceptSuggestedPlayground', 'EventController@AcceptSuggestedPlayground');

    //Route::post('/Event/{Event}/refuseSuggestedPlayground', 'EventController@refuseSuggestedPlayground');

    //**********************************************************************//


    //***************** routes for Vacant Times **************//

    Route::post('/Vacant/Add', 'VacantTimeController@Add'); // final

    Route::post('/Vacant/Edit', 'VacantTimeController@Edit'); // final

    Route::post('/Vacant/Delete', 'VacantTimeController@Delete'); // final

    //**********************************************************************//

    //***************** routes for Rate **************//

    Route::post('/Rate/{Event}/Add', 'RateController@AddPlayerRate');

    //Route::get('/Rate/{Event}/Add', 'RateController@AddPlayerRate');

    //Route::post('/Rate/{Event}/Add', 'RateController@AddPlayerRate');

    //rate %%%%%%%%%%% partial views %%%%%%%%%%% rate//
    Route::get('/Event/{Event}/Result', 'RateController@EventResult');
    //rate %%%%%%%%%%% partial views %%%%%%%%%%% rate//

    //**********************************************************************//


    //***************** routes for Governorates  **************//

    Route::get('/governorate/{governorate}', 'GovernorateController@GetAreas');

    //Route::post('/Vacant/{vacantTime}/Edit', 'VacantTimeController@Edit');

    //Route::get('/Sport/{Sport?}', 'SportsController@index');

    //Route::post('/clubProfileEdit', 'ClubProfileController@updateProfile');

    //**********************************************************************//


    //%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%//
    // [[ajaxLoad]] %%%%%%%%%%% partial views %%%%%%%%%%%  [[ajaxLoad]]//
    //%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%//

    // **********************************player profile ***********************//
        //for load main info div after update after completed account created
        Route::get('/getInfo/{data}', 'PlayerProfilesController@getInfo'); // final
        
        //for load main info div after update after completed account created
        Route::get('/displayMainInfo/player/{id}', 'PlayerProfilesController@displayMainInfo'); // final

        //for load part of sports model after update sport
        Route::get('/getPlayerSports/player/{id}', 'PlayerProfilesController@getPlayerSports'); // final

        //for load part of vacant model after update vacants
        Route::get('/getPlayerVacants/player/{id}', 'PlayerProfilesController@getPlayerVacants'); // final
        
    // **********************************player profile ***********************//
    // ********************************** event page ***********************//
        //for load event applicants div 
        Route::get('/event/applicants/{id}', 'EventController@getApplicants'); // final

        //for load event candidate div
        Route::get('/event/candidate/{id}', 'EventController@getCandidate'); // final

        //for load event Sport Playgrounds div
        Route::get('/event/eventSportPlaygrounds/{id}', 'EventController@getEventSportPlaygrounds'); // final

        //for load event Sport Playgrounds div
        Route::get('/event/suggestedPlaygrounds/{id}', 'EventController@getSuggestedPlaygrounds'); // final
    // ********************************** event page ***********************//

    // ********************************** challenge page ***********************//
        //for load challenge applicants div 
        Route::get('/challenge/applicants/{id}', 'ChallengeController@getApplicants'); // final

        //for load challenge candidate div
        Route::get('/challenge/candidate/{id}', 'ChallengeController@getCandidate'); // final

        //for load challenge Sport Playgrounds div
        Route::get('/challenge/challengeSportPlaygrounds/{id}', 'ChallengeController@getchallengeSportPlaygrounds'); // final

        //for load challenge Sport Playgrounds div
        Route::get('/challenge/suggestedPlaygrounds/{id}', 'ChallengeController@getSuggestedPlaygrounds'); // final
    // ********************************** challenge page ***********************//

        Route::get('/playerPlaygroundReservation/{id}/{type}', 'ReservationController@playerPlaygroundReservation');
        
    //%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%//
    // [[ajaxLoad]] %%%%%%%%%%% partial views %%%%%%%%%%%  [[ajaxLoad]]//
    //%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%//
            
    
});
