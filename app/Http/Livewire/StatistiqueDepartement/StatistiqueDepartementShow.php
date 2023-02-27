<?php

namespace App\Http\Livewire\StatistiqueDepartement;

use App\Models\Type;
use Livewire\Component;
use App\Models\BonSorti;
use App\Models\Departement;

class StatistiqueDepartementShow extends Component
{
    public $detailBons, $detailBonMateriels;

    public function detailSatistiqueDepartement($departement_id)
    {
        $this->detailBons = BonSorti::where('departement_id', $departement_id)->get();
        if($this->detailBons != "")
        {
            foreach($this->detailBons as $bonDepartement)
            {
                $this->detailBonMateriels = $bonDepartement->materiels;
            }
        }
    }
    public function render()
    {
        $departements = Departement::where('statut','1')->orderBy('nom', 'ASC')->get();
        return view('livewire.statistique-departement.statistique-departement-show',compact('departements'));
    }
}
