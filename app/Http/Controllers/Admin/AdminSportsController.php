<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller ;
use Illuminate\Http\Request;

use Storage ;

use App\Model\Sport;

use App\DataTables\SportsDatatable;

class AdminSportsController extends Controller
{
    public function main($value='')
    {   
        $playersCount            = App\User::where('type', 1)->count() ;
        $clubsCount              = App\User::where('type', 2)->count() ;
        $clubBranchesCount       = App\clubBranche::count() ;
        $playgroundsCount        = App\Playground::count() ;
        $eventsCount             = App\Event::count() ;
        $challengesCount         = App\Challenge::count() ;
        $reservationsCount       = App\Reservation::count() ;
        //$sportsCount             = App\Sport::count() ;
        
        //return $playgroundsCount ;
        return view('admin.home');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SportsDatatable $sport)
    {
        //return 1 ;
        return $sport->render('admin.Sports.index', ['title' => trans( 'admin.sports' )]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Sports.Pages.create', ['title' => trans('admin.AddNewSport')]) ;
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
                    'ar_sport_name'         => 'required',
                    'en_sport_name'         => 'required',
                    'sport_desc'            => 'required',
                    'sport_player_num'      => 'required',
                    'sport_img'             => 'required|' . validateImage() ,
                ],
                [],
                [
                    'ar_sport_name'          => 'Arab Name',
                    'en_sport_name'          => 'English Name',
                    'sport_desc'             => 'Description',
                    'sport_player_num'       => 'Number of Players',
                    'sport_img'              => 'Sport Image',
                ]);
        
        if (request()->hasFile('sport_img')) {
            $data['sport_img'] =up()->upload([
                'file'          => 'sport_img',
                'path'          => 'sports',
                'upload_type'   => 'single',
                'delete_file'   => '',
                
            ]);
            
        }
        //return $data ;
        Sport::create($data) ;
        session()->flash('Success', trans('admin.SportAddedSuccessfully'));
        return redirect(aurl('sports')) ;
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
        $sport = Sport::find($id);

        $title = trans('admin.EditSport');
        return view('admin.Sports.Pages.AdminSport', compact('sport', 'title')) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sport = Sport::find($id);
        //return $admin ;
        //return view('admin.Countries.edit', ['title' => 'Admin Control'], ['admin' => 'admin']) ;
        $title = trans('admin.EditSport');
        return view('admin.Sports.Pages.edit', compact('sport', 'title')) ;
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
        $sport = Sport::find($id) ;
        $data = $this->validate(request(),
                [
                    'ar_sport_name'         => 'required',
                    'en_sport_name'         => 'required',
                    'sport_desc'            => 'required',
                    'sport_player_num'      => 'required',
                    'sport_img'             => 'sometimes|nullable|' . validateImage() ,
                ],
                [],
                [
                    'ar_sport_name'          => 'Arab Name',
                    'en_sport_name'          => 'English Name',
                    'sport_desc'             => 'Description',
                    'sport_player_num'       => 'Number of Players',
                    'sport_img'              => 'Sport Image',
                ]);
        
        if (request()->hasFile('sport_img')) {
            $data['sport_img'] =up()->upload([
                'file'          => 'sport_img',
                'path'          => 'sports',
                'upload_type'   => 'single',
                'delete_file'   => $sport->sport_img,
            ]);
            
        }
        //return $data ;
       
        Sport::where('id', $id)->update($data) ;
        session()->flash('Success', trans('admin.SportEditedSuccessfully'));
        return redirect(aurl('sports')) ;
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
        $sport = Sport::find($id) ;

        Storage::delete($sport->sport_img) ;

        $sport->delete() ;
        
        session()->flash('Success', 'Sport Deleted Successfully');
        return redirect(aurl('sports')) ;
    }

    public function multiDelete()
    {
        if ( is_array( request('item') ) ) {
            foreach ( request('item') as $id) {

                $sport = Sport::find($id) ;
                Storage::delete($sport->sport_img) ;
                $sport->delete() ;

            }
            
        }else{
                $sport = Sport::find( request('item') ) ;
                Storage::delete($sport->sport_img) ;
                $sport->delete() ;
            
        }
        session()->flash('Success', 'Sport(s) Deleted Successfully');
        return redirect(aurl('sports')) ;
        //return back();
        //return request();
    }
}
