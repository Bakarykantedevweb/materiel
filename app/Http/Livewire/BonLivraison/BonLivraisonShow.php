<?php

namespace App\Http\Livewire\BonLivraison;

use App\Models\Agence;
use Livewire\Component;
use App\Models\Materiel;
use App\Models\Fournisseur;

class BonLivraisonShow extends Component
{
    public $agences, $champs, $key, $materiel_id, $quantite, $departements, $nom, $prenom, $agence, $departement, $date_sorti, $materiels;

    public function addInput()
    {
        $this->key++;
        $this->champs[] = $this->key;
    }
    protected function rules()
    {
        return [
            'agence' => 'required|string|',
            'departement' => 'required|string|',
            'date_sorti' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'materiel_id' => 'required',
            'quantite' => 'required',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveBonLivraison()
    {
        $validatedData = $this->validate();
    }
    public function render()
    {
        $this->agences = Agence::all();
        $this->departements = Fournisseur::all();
        $this->materiels = Materiel::all();
        return view('livewire.bon-livraison.bon-livraison-show');
    }
}
