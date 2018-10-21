<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller ;

use App\Model\User ;
use App\Model\clubBranche ;
use App\Model\Playground ;
use App\Model\Event ;
use App\Model\Challenge ;
use App\Model\Reservation ;
use App\Model\Sport ;
use App\Model\governorate;
use Illuminate\Http\Request;

use App\Model\PlayerFilters ;
use App\Model\PlaygroundFilters ;

class SearchController extends Controller
{

/* %%%%%%%%%%%%%%%%%%%%%% start of player search for [ players ] %%%%%%%%%%%%%%%%%%%5 */
    public function index($model = '')
    {
		$governorate = governorate::with('areas')->get();
    	switch ($model) {
		    case 'player':
		        $players =  User::where('our_is_active', '=', 1)
		        				->where('type', '=', 1)
		        				->get() ;
		    	//return $players;
		    	return view('player.search.pages.search', compact('players', 'model', 'governorate') );
		        break;
		    case 'playground':
		        $playgrounds =  Playground::with('Photos')->where('our_is_active', '=', 1)
		        				->where('is_active', '=', 1)
		        				->get() ; 
		    	return view('player.search.pages.search', compact('playgrounds', 'model', 'governorate') );
		        break;
		    default:
		        $players =  User::where('our_is_active', '=', 1)
		        				->where('type', '=', 1)
		        				->get() ;
		    	//return $players;
		    	return view('player.search.pages.search', compact('players', 'model', 'governorate') );
		}
    	//return view('player.search.pages.search' );
    }

	/* search for player function */
	public function getPlayerSearchResults(Request $request, PlayerFilters $filters)
	{
		
		$players = User::filter($filters)->get() ;
		
		$view = view('player.search.pageParts.player-search.player-result', compact('players', 'model') )->render();
		return response($view);
		//return $users;
	}

	/* fresh player search result for [player] function */
	public function freshPlayerSearchResults(Request $request)
	{
		
		$players =  User::where('our_is_active', '=', 1)
		        				->where('type', '=', 1)
		        				->get() ;
		//return $players ;		
		$view = view('player.search.pageParts.player-search.player-result', compact('players', 'model') )->render();
		return response($view);
		//return $users;
	}

	/* to make reload of player-filter part */
	public function getPlayerFilter()
	{	$governorate = governorate::with('areas')->get();
		return view('player.search.pageParts.player-search.player-filtter', compact('governorate')) ;
	}

/* %%%%%%%%%%%%%%%%%%%%%% end of player search for [ players ] %%%%%%%%%%%%%%%%%%%5 */

	
/* %%%%%%%%%%%%%%%%%%%%%% start of playground search for [ players ] %%%%%%%%%%%%%%%%%%%5 */
/* search for playground function */
	public function getPlaygroundSearchResults(Request $request, PlaygroundFilters $filters)
	{
		//return $request ;
		$playgrounds = Playground::with('Photos')->filter($filters)->get() ;
		//return $playgrounds ;
		$view = view('player.search.pageParts.playground-search.playground-result', compact('playgrounds', 'model') )->render();
		return response($view);
		//return $users;
	}

	/* fresh playground search result for [player] function */
	public function freshPlaygroundSearchResults(Request $request)
	{
		
		$playgrounds =  Playground::with('Photos')->where('our_is_active', '=', 1)
		        				->where('type', '=', 1)
		        				->get() ;
		//return $playgrounds ;		
		$view = view('player.search.pageParts.playground-search.playground-result', compact('playgrounds', 'model') )->render();
		return response($view);
		//return $playground;
	}

	/* to make reload of playground-filter part */
	public function getPlaygroundFilter()
	{	$governorate = governorate::with('areas')->get();
		return view('player.search.pageParts.playground-search.playground-filtter', compact('governorate')) ;
	}

	/* %%%%%%%%%%%%%%%%%%%%%% end of playground search for [ players ] %%%%%%%%%%%%%%%%%%%5 */

	
	

}
