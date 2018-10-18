<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Playground ;
use App\Model\Sport ;
use App\Model\Governorate ;

use App\DataTables\PlaygroundsDatatable;

class AdminPlaygroundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PlaygroundsDatatable $playground)
    {
        return $playground->render('admin.Playgrounds.index', ['title' => 'Playground Control']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return $clubBranche ;
        $lang = session()->get('lang');
        //return $lang ;

        if ($lang == 'ar') {
            $sports = Sport::select(['id','ar_sport_name'])->get();
        } elseif ($lang == 'en') {
            $sports = Sport::select(['id','ar_sport_name'])->get();
        }
        
        $governorate = governorate::with('areas')->get();
        $Playground = Playground::with('city')
                    ->where('id', $id)
                    ->firstOrFail();
        //return $Playground ;
        return view('admin.Playgrounds.Pages.AdminSinglePlayground', compact('Playground', 'governorate', 'sports'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeActivationStatus(Request $request)
    {
        $Playground = Playground::find($request->target);

        Playground::where('id', request()->target)
              ->update(['our_is_active' => request()->status]);

        //$club->notify(new ClubAccountAccepted($club->name));

        

        session()->flash('Success', trans('admin.updated_record'));
        return back() ;
    }
}
