<?php

//use Illuminate\Support\Facades\Auth;

Route::get('/well', function() {
	if (noSession()) {
	    return 'done';
	}
});

use Illuminate\Support\Facades\Auth;

Route::any('/mailRedirect',function(){
    //$type = Input::get ( 'type' );
    $taragetPage = $_GET['url'];
    $userKind = $_GET['kind'];

    return redirect( redirectToMailLink($taragetPage, $userKind) ) ;
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){

	Config::set('auth.defines', 'adminGuard');

	Route::get('login', 'AdminAuth@login');

	Route::post('login', 'AdminAuth@dologin');

	Route::get('forgot/password', 'AdminAuth@forgot_password');

	Route::post('forgot/password', 'AdminAuth@forgot_password_post');

	Route::get('reset/password/{token}', 'AdminAuth@reset_password');

	Route::post('reset/password/{token}', 'AdminAuth@reset_password_post');

	Route::group(['middleware' => 'admin:adminGuard'], function(){ // login as admin for this links

		// reservations datatable link
		Route::resource('reservations', 'AdminReservationsController');
		// reservations multidelete link
		Route::delete('reservations/destroy/all', 'AdminReservationsController@multiDelete');

		// events datatable link
		Route::resource('events', 'AdminEventController');
		// events multidelete link
		Route::delete('eventsControl/destroy/all', 'AdminEventController@multiDelete');

		// challenges datatable link
		Route::resource('challenges', 'AdminChallengeController');
		// challenges multidelete link
		Route::delete('challenges/destroy/all', 'AdminChallengeController@multiDelete');

		// sports datatable link
		Route::resource('sports', 'AdminSportsController');
		// sports multidelete link
		Route::delete('sports/destroy/all', 'AdminSportsController@multiDelete');

		// countries datatable link
		Route::resource('countries', 'AdminCountriesController');
		// countries multidelete link
		Route::delete('countries/destroy/all', 'AdminCountriesController@multiDelete');

		// Governorate datatable link
		Route::resource('governorates', 'AdminGovernorateController');
		// Area multidelete link
		Route::delete('governoratesControl/destroy/all', 'AdminGovernorateController@multiDelete');

		// Area datatable link
		Route::resource('areas', 'AdminAreaController');
		// Area multidelete link
		Route::delete('areasControl/destroy/all', 'AdminAreaController@multiDelete');

		// admin datatable link
		Route::resource('admins', 'AdminAdminController');
		// admin multidelete link
		Route::delete('adminsControl/destroy/all', 'AdminAdminController@multiDelete');

		// clubs datatable link
		Route::resource('clubs', 'AdminClubController');
		// clubs change Activation Status link
		Route::post('Club/changeActivationStatus/', 'AdminClubController@changeActivationStatus');

		// branches datatable link
		Route::resource('branches', 'AdminBranchController');
		// branches change Activation Status link
		Route::post('Branch/changeActivationStatus/', 'AdminBranchController@changeActivationStatus');

		// playgrounds datatable link
		Route::resource('playgrounds', 'AdminPlaygroundController');
		// playgrounds change Activation Status link
		Route::post('Playground/changeActivationStatus/', 'AdminPlaygroundController@changeActivationStatus');

		// players datatable link
		Route::resource('players', 'AdminPlayerController');
		// clubs change Activation Status link
		Route::post('Player/changeActivationStatus/', 'AdminPlayerController@changeActivationStatus');

		Route::get('/', 'AdminAdminController@main');

		Route::get('settings', 'SettingController@setting');
		Route::post('settings', 'SettingController@setting_save');
		Route::any('logout', 'AdminAuth@logout');
	});

	// helper route to toggle languages
	Route::get('lang/{lang}', function ($lang) {
		session()->has('lang')?session()->forget('lang'):'';
		$lang == 'ar'?session()->put('lang', 'ar'):session()->put('lang', 'en');
		return back();
	});

});
