<?php

namespace App\Http\Controllers;

use App\Notifications\player\newEvent;

use DateTime;

use DB ;

use App\Model\Event;
use App\Model\User;
use App\Model\Sport;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
	/*
	* function to get one event by id
	*/
	public function index($id)
	{
		$id = sm_crypt($id, 'd') ;
		$event = Event::with('Applicants')
							->with('creator.playerProfile')
							->with('eventSport')->find($id) ;
		//return $event ;
		return view('player.event.pages.event', compact('event','E_result')) ;
		//$E_result = json_encode($Event->E_result) ;
		//$E_result = json_decode($E_result, true);

		/*if ($Event == '') {
			$Events = Event::with('Applicants')
								->with('creator.playerProfile')
								->with('eventSport')->get() ;
			return view('event.events', compact('Events')) ;

		}

		$Event = Event::with('Applicants')
							->with('creator.playerProfile')
							->with('eventSport')->find($Event) ;
		$E_result = json_encode($Event->E_result) ;
		$E_result = json_decode($E_result, true);

		//return $E_result['CreatorPendingResult']['CreatorScore'] ;


		if ($Event == null) {
			abort(404) ;
		}

		//$EventDetails = $Event ;
*/
		
	}


	/*
	* function to get add event form view
	*/
	public function AddForm()
	{
		$userInfo = User::with('sports')->find(Auth::user()->id) ;
		//return $userInfo ;
		return view('event.eventAddForm', compact('userInfo'));
	}


	/*
	* function to save new event to the database
	*/
    public function Save(User $User)
    {
		$E_JQueryFrom = new DateTime(request('E_date'));

		$E_JQueryFrom->modify('+' . request('E_from') . ' hour');

		$E_JQueryTo = new DateTime(request('E_date'));

		$E_JQueryTo->modify('+' . request('E_to') . ' hour');

		if (Auth::user()->id == $User->id) {

			$day = date("l", strtotime(request()->E_date));// to get day name to check if in user vacant time
			//to get day id and store it to check if in user vacant time and for relations
			$E_day = DB::table('days')->where('day_format', '=', $day)->first() ;
			//return $E_day->day_id ;

			Event::create([

						   'E_creator_id'        		=> $User->id,//Auth::user()->id,
						   'E_sport_id'      			=> request('E_sport_id'),
						   'E_preferred_rate'			=> request('E_preferred_rate'),
						   'E_date'    					=> request('E_date'),
						   'E_day'        				=> $E_day->day_id ,
						   'E_from'        				=> request('E_from'),
						   'E_to'        				=> request('E_to'),
						   'E_JQueryFrom'        		=> $E_JQueryFrom->format('Y-m-d H-i-s'),
						   'E_JQueryTo'        			=> $E_JQueryTo->format('Y-m-d H-i-s') ,
						]);
		}
    	//return $User ;



    	return back() ;
    }

	/*
	* function for apply on an event
	*/
    /*public function Apply(Event $Event)
    {
    	//return
    	$request = request() ;

    	$Event->AddApplicant($request) ;

        return back() ;
    }*/

    /*public function Accept(Event $Event)
    {
    	$request = request() ;



    	$Event->AcceptApplicant($request) ;

    	return back() ;

    	//return $request ;
    }*/
//%%%%%%%%%%%%%%%%%%% Event playground functions %%%%%%%%%%%%%%%%%%//
	/*// function to handle suggest A Playground !!!
	public function SuggestPlayground(Event $Event)
	{
		$request = request() ;

		//return $request ;

		$Event->SuggestPlayground($request) ;

		return back() ;
	}*/

	// function to accept suggested Playground !!!
	public function AcceptSuggestedPlayground(Event $Event)
	{
		$request = request() ;

		//return $request ;

		$Event->AcceptSuggestedPlayground($request) ;

		return back() ;
	}

	// function to accept suggested Playground !!!
	public function refuseSuggestedPlayground(Event $Event)
	{
		$request = request() ;

		//return $request ;

		$Event->refuseSuggestedPlayground($request) ;

		return back() ;
	}

//%%%%%%%%%%%%%%%%%%% End of Event playground functions %%%%%%%%%%%%%%%%%%//

//%%%%%%%%%%%%%%%%%%% start of Event Result functions %%%%%%%%%%%%%%%%%%//

	// function to handle suggest A Result !!!
	public function SuggestResult(Event $Event)
	{
		$request = request() ;

		//return $request ;

		$Event->SuggestResult($request) ;

		return back() ;
	}


//%%%%%%%%%%%%%%%%%%% End of Event Result functions %%%%%%%%%%%%%%%%%%//

	/*
    * function to load patrial view after A player give A rate to Ather player
    */
    public function EventResult(Event $Event)
    {
        $Event = Event::with('Applicants')
							->with('creator.playerProfile')
							->with('eventSport')->find($Event) ;
        //$Event = json_encode($Event) ;
        return $Event ;

        return view('event.parts.EventPart_1', compact('Event')) ;
    }


//%%%%%%%%%%%%%%%%%%% start of Event final functions %%%%%%%%%%%%%%%%%%//

	/*
	* function for add new event
	*/    
    public function Add(Request $request)
    {
    	$E_JQueryFrom = new DateTime($request->E_date);

		$E_JQueryFrom->modify('+' . $request->E_from . ' hour');

		$E_JQueryTo = new DateTime($request->E_date);

		$E_JQueryTo->modify('+' . $request->E_to . ' hour');

		if (Auth::user()->id == $request->playerId) {

			$day = date("l", strtotime(request()->E_date));// to get day name to check if in user vacant time
			//to get day id and store it to check if in user vacant time and for relations
			$E_day = DB::table('days')->where('day_format', '=', $day)->first() ;
			//return $E_day->day_id ;

			$event = Event::create([
						   'E_creator_id'        		=> $request->playerId,//Auth::user()->id,
						   'E_sport_id'      			=> $request->E_sport_id,
						   'E_preferred_rate'			=> $request->E_preferred_rate,
						   'E_date'    					=> $request->E_date,
						   'E_day'        				=> $E_day->day_id ,
						   'E_from'        				=> $request->E_from,
						   'E_to'        				=> $request->E_to,
						   'E_JQueryFrom'        		=> $E_JQueryFrom->format('Y-m-d H-i-s'),
						   'E_JQueryTo'        			=> $E_JQueryTo->format('Y-m-d H-i-s') ,
						]);
		}

		if ($event) {
			$users = Sport::find($request->E_sport_id)->users ;

			$creator = User::find($request->playerId);

			//$users->notify(new newEvent($creator, $event));
			//\Notification::send($users, new newEvent($creator, $event));

			return 'true' ;
		} else {
			return 'false' ;
		}	
    }

    /*
	* function for apply on an event
	*/
    public function Apply(Request $request)
    {
    	$event = Event::find($request->eventId);
    	return $event->AddApplicant($request) ; // function decleared inside [[ Event ]] model
    }

     /*
	* function for apply on an event
	*/
    public function AcceptApplicant(Request $request)
    {
    	$event = Event::find($request->eventId);
    	return $event->AcceptApplicant($request) ; // function decleared inside [[ Event ]] model
    }

    // function to handle suggest A Playground !!!
	public function SuggestPlayground(Request $request)
	{
		$request = request() ;

		$event = Event::find($request->eventId);
		//return $request ;

		return $event->SuggestPlayground($request) ;

		//return back() ;
	}

	// function to accept or refuse suggested playground !!!
	public function AcceptRejectPlayground(Request $request)
	{
		$request = request() ;
		$Event = Event::find($request->eventId) ;
		if ($request->status == 1) {
			$Event->AcceptSuggestedPlayground($request) ;
		}elseif ($request->status == 2) {
			$Event->refuseSuggestedPlayground($request) ;
		}

		return 'true' ;
	}

// *********************** start of ajax load page parts ********************** //

    // to update event page [[ applicants ]] part
    public function getApplicants($id)
    {
    	//$id = sm_crypt($id, 'd') ;
		$event = Event::with('Applicants')
							->with('creator.playerProfile')
							->with('eventSport')->find($id) ;
		//return $event ;
		return view('player.event.pageParts.event.applicants', compact('event','E_result')) ;
    }

    // to update event page [[ candidate ]] part
    public function getCandidate($id)
    {
    	//$id = sm_crypt($id, 'd') ;
		$event = Event::with('Applicants')
							->with('creator.playerProfile')
							->with('eventSport')->find($id) ;
		//return $event ;
		return view('player.event.pageParts.event.candidate', compact('event','E_result')) ;
    }

    
    // to update event page [[ event-sport-playgrounds ]] part
    public function getEventSportPlaygrounds($id)
    {
    	//$id = sm_crypt($id, 'd') ;
		$event = Event::with('Applicants')
							->with('creator.playerProfile')
							->with('eventSport')->find($id) ;
		//return $event ;
		return view('player.event.pageParts.event.event-sport-playgrounds', compact('event','E_result')) ;
    }

     // to update event page [[ expected-playgrounds ]] part
    public function getSuggestedPlaygrounds($id)
    {
    	//$id = sm_crypt($id, 'd') ;
		$event = Event::with('Applicants')
							->with('creator.playerProfile')
							->with('eventSport')->find($id) ;
		//return $event ;
		return view('player.event.pageParts.event.expected-playgrounds', compact('event','E_result')) ;
    }
// *********************** end of ajax load page parts ********************** //

//%%%%%%%%%%%%%%%%%%% End of Event final functions %%%%%%%%%%%%%%%%%%//

}
