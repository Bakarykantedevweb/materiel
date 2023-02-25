<?php

namespace App\Http\Livewire\StatistiqueAgence;

use App\Models\Type;
use App\Models\Agence;
use Livewire\Component;
use App\Models\BonSorti;

class StatistiqueAgenceShow extends Component
{

   public $detailBons, $detailBonMateriels;

    public function detailSatistiqueAgence($agence_id)
    {
        $this->detailBons = BonSorti::where('agence_id', $agence_id)->get();
        if($this->detailBons != "")
        {
            foreach($this->detailBons as $bonAgence)
            {
                $this->detailBonMateriels = $bonAgence->materiels;
            }
        }
    }
    public function render()
    {
        $agences = Agence::where('statut','1')->orderBy('nom', 'ASC')->get();
        $types = Type::all();
        return view('livewire.statistique-agence.statistique-agence-show',compact('agences', 'types'));
    }
}
