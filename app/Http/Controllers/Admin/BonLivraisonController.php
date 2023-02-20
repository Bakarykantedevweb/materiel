<?php

namespace App\Http\Controllers\Admin;

use App\Models\BonSorti;
use App\Models\BonLivraison;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BonLivraisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.bon-livraison.index');
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
     * @param  \App\Models\BonLivraison  $bonLivraison
     * @return \Illuminate\Http\Response
     */
    public function show(BonSorti $bonLivraison)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BonLivraison  $bonLivraison
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {
        $materielsorti = BonSorti::find($id);
        if($materielsorti != "")
        {
            $detailBonMateriels = $materielsorti->materiels;
        }
        return view('admin.bon-livraison.print',compact('materielsorti','detailBonMateriels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BonLivraison  $bonLivraison
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BonSorti $bonLivraison)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BonLivraison  $bonLivraison
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
