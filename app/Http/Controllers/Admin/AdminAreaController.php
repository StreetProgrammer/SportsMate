<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller ;
use Illuminate\Http\Request;

use Storage ;

use App\Model\Area ;
use App\Model\User ;
use App\Model\clubBranche ;
use App\Model\Playground ;
use App\Model\Event ;
use App\Model\Challenge ;
use App\Model\Reservation ;
use App\Model\Sport ;

use App\DataTables\AreasDatatable;

class AdminAreaController extends Controller
{
    public function main($value='')
    {   
        $playersCount            = User::where('type', 1)->count() ;
        $clubsCount              = User::where('type', 2)->count() ;
        $clubBranchesCount       = clubBranche::count() ;
        $playgroundsCount        = Playground::count() ;
        $eventsCount             = Event::count() ;
        $challengesCount         = Challenge::count() ;
        $reservationsCount       = Reservation::count() ;
        $sportsCount             = Sport::count() ;
        
        //return $playgroundsCount ;
        return view('admin.home');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AreasDatatable $Area)
    {
        //return 1 ;
        return $Area->render('admin.Areas.index', ['title' => 'Areas Control']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Areas.Pages.create', ['title' => trans('admin.AddNewArea')]) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return request() ;
        $data = $this->validate(request(),
                [
                    'a_ar_name'         => 'required',
                    'a_en_name'         => 'required',
                    'a_governorate_id'  => 'required',
                ],
                [],
                [
                    'a_ar_name'          => 'English Name',
                    'a_en_name'          => 'Arab Name',
                    'a_governorate_id'   => 'Governorate',
                ]);
        
          
        //return $data ;
        Area::create($data) ;
        session()->flash('Success', trans('admin.AreaAddedSuccessfully'));
        return redirect(aurl('areas')) ;
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
        $Area = Area::find($id);
        //return $admin ;
        //return view('admin.Countries.edit', ['title' => 'Admin Control'], ['admin' => 'admin']) ;
        $title = 'Edit Area';
        return view('admin.Areas.Pages.edit', compact('Area', 'title')) ;
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
        $Area = Area::find($id) ;
         $data = $this->validate(request(),
                [
                    'a_ar_name'         => 'required',
                    'a_en_name'         => 'required',
                    'a_governorate_id'  => 'required',
                ],
                [],
                [
                    'a_ar_name'          => 'English Name',
                    'a_en_name'          => 'Arab Name',
                    'a_governorate_id'   => 'Governorate',
                ]);
        
       
        //return $data ;
       
        Area::where('id', $id)->update($data) ;
        session()->flash('Success', trans('admin.AreaُEitedSuccessfully'));
        return redirect(aurl('areas')) ;
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
        $Governorate = Governorate::find($id) ;

        Storage::delete($Governorate->logo) ;

        $Governorate->delete() ;
        
        session()->flash('Success', 'Governorate Deleted Successfully');
        return redirect(aurl('areas')) ;
    }

    public function multiDelete()
    {
        if ( is_array( request('item') ) ) {
            foreach ( request('item') as $id) {

                $Governorate = Governorate::find($id) ;
                Storage::delete($Governorate->logo) ;
                $Governorate->delete() ;

            }
            
        }else{
                $Governorate = Governorate::find( request('item') ) ;
                Storage::delete($Governorate->logo) ;
                $Governorate->delete() ;
            
        }
        session()->flash('Success', 'Governorate or Countries Deleted Successfully');
        return redirect(aurl('areas')) ;
        //return back();
        //return request();
    }
}
