<?php

namespace App\Http\Livewire\StatistiqueDepartement;

use App\Models\Type;
use Livewire\Component;
use App\Models\Departement;

class StatistiqueDepartementShow extends Component
{
    public function render()
    {
        $departements = Departement::orderBy('nom', 'ASC')->get();
        $types = Type::all();
        return view('livewire.statistique-departement.statistique-departement-show',compact('departements', 'types'));
    }
}
