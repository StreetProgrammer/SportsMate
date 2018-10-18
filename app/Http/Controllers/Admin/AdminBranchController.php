<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\clubBranche ;
use App\Model\Sport ;
use App\Model\Governorate ;

use App\DataTables\BranchesDatatable;

class AdminBranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BranchesDatatable $branch)
    {
        return $branch->render('admin.Branches.index', ['title' => 'Branch Control']);
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
        $Branch = clubBranche::with('user')
                    ->with('branchPlaygrounds')
                    ->where('id', $id)
                    ->firstOrFail();
        //return $Branch ;
        return view('admin.Branches.Pages.AdminSingleBranch', compact('Branch', 'governorate', 'sports'));
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
}
