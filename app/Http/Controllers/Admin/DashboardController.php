<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agence;
use App\Models\Materiel;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use App\Models\MaterielRecupere;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $materiels = Materiel::count();
        $agences = Agence::count();
        $fournisseurs = Fournisseur::count();
        return view('admin.dashboard',compact('materiels','agences','fournisseurs'));
    }
}
