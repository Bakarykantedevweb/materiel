<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agence;
use App\Models\Materiel;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Models\MaterielSorti;
use App\Http\Controllers\Controller;

class MaterielSortiController extends Controller
{
    public function index()
    {
        return view('admin.materiel-sorti.index');
    }

    public function create()
    {
        $materielSorti = MaterielSorti::OrderBy('id','DESC')->paginate(10);
        $departements = Departement::OrderBy('nom','ASC')->get();
        $agences = Agence::OrderBy('nom','ASC')->get();
        $materiels = Materiel::all();
        return view('admin.materiel-sorti.create',compact('materielSorti','departements','agences','materiels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'agence' => 'required',
            'departement' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'materiel' => 'required',
            'date_sortie' => 'required',
        ]);

        $materielsorti = new MaterielSorti;
        $materielsorti->agence_id = $request->agence;
        $materielsorti->departement_id = $request->departement;
        $materielsorti->materiel_id = json_encode($request->materiel);
        $materielsorti->nom = $request->nom;
        $materielsorti->prenom = $request->prenom;
        $materielsorti->date_sorti = $request->date_sortie;
        $materielsorti->save();

        return redirect('/materiels-sortis')->with('success', 'Sorti effectué avec Success');
    }

    public function edit($materiel_id)
    {
        $departements = Departement::OrderBy('nom','ASC')->get();
        $agences = Agence::OrderBy('nom','ASC')->get();
        $materiels = Materiel::all();
        $materielSorti = MaterielSorti::find($materiel_id);
        $materielTrouve = [];
        $materielTrouve = $materielSorti->materiel;
        return view('admin.materiel-sorti.edit',compact('materielSorti','departements','agences','materiels','materielTrouve'));

    }

    public function update(Request $request, $materiel_id)
    {
        $materielsorti = MaterielSorti::find($materiel_id);
        $materielsorti->agence_id = $request->agence;
        $materielsorti->departement_id = $request->departement;
        $materielsorti->materiel = json_encode($request->materiel);
        $materielsorti->nom = $request->nom;
        $materielsorti->prenom = $request->prenom;
        $materielsorti->date_sorti = $request->date_sortie;
        $materielsorti->update();

        return redirect('/materiels-sortis')->with('success', 'Sorti effectué avec Success');
    }
}
