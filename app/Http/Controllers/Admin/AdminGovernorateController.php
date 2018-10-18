<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller ;
use Illuminate\Http\Request;

use Storage ;

use App\Model\Governorate ;
use App\Model\User ;
use App\Model\clubBranche ;
use App\Model\Playground ;
use App\Model\Event ;
use App\Model\Challenge ;
use App\Model\Reservation ;
use App\Model\Sport ;

use App\DataTables\GovernoratesDatatable;

class AdminGovernorateController extends Controller
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
    public function index(GovernoratesDatatable $Governorate)
    {
        //return 1 ;
        return $Governorate->render('admin.Governorates.index', ['title' => 'Governorate Control']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Governorates.Pages.create', ['title' => trans('admin.AddNewGovernorate')]) ;
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
                    'g_ar_name'         => 'required',
                    'g_en_name'         => 'required',
                    'g_country_id'      => 'required',
                ],
                [],
                [
                    'g_ar_name'          => 'English Name',
                    'g_en_name'          => 'Arab Name',
                    'g_country_id'       => 'Country',
                ]);
        
          
        //return $data ;
        Governorate::create($data) ;
        session()->flash('Success', 'Governorate Added Successfully');
        return redirect(aurl('governorates')) ;
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
        $Governorate = Governorate::find($id);
        //return $admin ;
        //return view('admin.Countries.edit', ['title' => 'Admin Control'], ['admin' => 'admin']) ;
        $title = 'Edit Governorate';
        return view('admin.Governorates.Pages.edit', compact('Governorate', 'title')) ;
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
        $Governorate = Governorate::find($id) ;
         $data = $this->validate(request(),
                [
                    'g_ar_name'         => 'required',
                    'g_en_name'         => 'required',
                    'g_country_id'      => 'required',
                ],
                [],
                [
                    'g_ar_name'          => 'English Name',
                    'g_en_name'          => 'Arab Name',
                    'g_country_id'       => 'Country',
                ]);
        
       
        //return $data ;
       
        Governorate::where('id', $id)->update($data) ;
        session()->flash('Success', 'Governorate Edited Successfully');
        return redirect(aurl('governorates')) ;
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
        return redirect(aurl('governoratesControl')) ;
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
        return redirect(aurl('governoratesControl')) ;
        //return back();
        //return request();
    }
}
