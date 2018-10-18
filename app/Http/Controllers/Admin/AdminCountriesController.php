<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller ;
use Illuminate\Http\Request;

use Storage ;

use App\Model\Area\Country ;
use App\Model\User ;
use App\Model\clubBranche ;
use App\Model\Playground ;
use App\Model\Event ;
use App\Model\Challenge ;
use App\Model\Reservation ;
use App\Model\Sport ;

use App\DataTables\CountriesDatatable;

class AdminCountriesController extends Controller
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
    public function index(CountriesDatatable $country)
    {
        //return 1 ;
        return $country->render('admin.Countries.index', ['title' => 'Country Control']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Countries.Pages.create', ['title' => trans('admin.AddNewCountry')]) ;
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
                    'c_ar_name'         => 'required',
                    'c_en_name'         => 'required',
                    'c_code'            => 'required',
                    'c_mob'             => 'required',
                    'c_logo'              => 'required|' . validateImage() ,
                ],
                [],
                [
                    'c_ar_name'          => 'English Name',
                    'c_en_name'          => 'Arab Name',
                    'c_code'             => 'Key',
                    'c_mob'              => 'Code',
                    'c_logo'             => 'Flag',
                ]);
        
        if (request()->hasFile('c_logo')) {
            $data['c_logo'] =up()->upload([
                'file'          => 'c_logo',
                'path'          => 'countries',
                'upload_type'   => 'single',
                'delete_file'   => '',
                
            ]);
            
        }
        //return $data ;
        Country::create($data) ;
        session()->flash('Success', 'Country Added Successfully');
        return redirect(aurl('countries')) ;
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
        $country = Country::find($id);
        //return $admin ;
        //return view('admin.Countries.edit', ['title' => 'Admin Control'], ['admin' => 'admin']) ;
        $title = 'Edit Country';
        return view('admin.Countries.Pages.edit', compact('country', 'title')) ;
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
        $country = Country::find($id) ;
         $data = $this->validate(request(),
                [
                    'c_ar_name'         => 'required',
                    'c_en_name'         => 'required',
                    'c_code'            => 'required',
                    'c_mob'             => 'required',
                    'c_logo'            => 'sometimes|nullable|' . validateImage() ,
                ],
                [],
                [
                    'c_ar_name'          => 'English Name',
                    'c_en_name'          => 'Arab Name',
                    'c_code'             => 'Key',
                    'c_mob'              => 'Code',
                    'c_logo'             => 'Flag',
                ]);
        
        if (request()->hasFile('c_logo')) {
            $data['c_logo'] =up()->upload([
                'file'          => 'c_logo',
                'path'          => 'countries',
                'upload_type'   => 'single',
                'delete_file'   => $country->c_logo,
            ]);
            
        }
        //return $data ;
       
        Country::where('id', $id)->update($data) ;
        session()->flash('Success', 'Country Edited Successfully');
        return redirect(aurl('countries')) ;
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
        $country = Country::find($id) ;

        Storage::delete($country->logo) ;

        $country->delete() ;
        
        session()->flash('Success', 'Country Deleted Successfully');
        return redirect(aurl('countries')) ;
    }

    public function multiDelete()
    {
        if ( is_array( request('item') ) ) {
            foreach ( request('item') as $id) {

                $country = Country::find($id) ;
                Storage::delete($country->logo) ;
                $country->delete() ;

            }
            
        }else{
                $country = Country::find( request('item') ) ;
                Storage::delete($country->logo) ;
                $country->delete() ;
            
        }
        session()->flash('Success', 'Country or Countries Deleted Successfully');
        return redirect(aurl('countries')) ;
        //return back();
        //return request();
    }
}
