<?php

namespace App\Http\Livewire\StatistiqueAgence;

use App\Models\Type;
use App\Models\Agence;
use Livewire\Component;

class StatistiqueAgenceShow extends Component
{
    public function render()
    {
        $agences = Agence::where('statut','1')->orderBy('nom', 'ASC')->get();
        $types = Type::all();
        return view('livewire.statistique-agence.statistique-agence-show',compact('agences', 'types'));
    }
}
