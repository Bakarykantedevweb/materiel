<?php

namespace App\Http\Livewire\BonLivraison;

use App\Models\Agence;
use Livewire\Component;
use App\Models\BonSorti;
use App\Models\Materiel;
use App\Models\Fournisseur;
use Illuminate\Support\Facades\DB;

class BonLivraisonShow extends Component
{
    public $agences, $champs, $key, $materiel_id, $quantite, $departements, $nom, $prenom, $agence, $departement, $date_sorti, $materiels,
            $bonsorti_id;

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
        $encrypt = uniqid('bonSorti');
        $bonLivraison = new BonSorti;
        $bonLivraison->agence_id = $validatedData['agence'];
        $bonLivraison->departement_id = $validatedData['departement'];
        $bonLivraison->nom = $validatedData['nom'];
        $bonLivraison->prenom = $validatedData['prenom'];
        $bonLivraison->date_sorti = $validatedData['date_sorti'];
        $bonLivraison->encrypt = $encrypt;
        $bonLivraison->save();

        if($bonLivraison)
        {
            for($i = 0; $i < count($this->materiel_id); $i++)
            {
                DB::table('bon_sorti_materiel')->insert([
                    'materiel_id' => $this->materiel_id[$i],
                    'bon_sorti_id' => $bonLivraison->id,
                    'quantite' => $this->quantite[$i]
                ]);
            }
        }

        session()->flash('success', 'Bon de Livraison Added Successfull');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function detailBonSorti($bonsorti_id)
    {

    }

     public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->agence = '';
        $this->departement = '';
        $this->date_sorti = '';
        $this->nom = '';
        $this->prenom = '';
        $this->materiel_id = '';
        $this->quantite = '';
    }

    public function render()
    {
        $this->agences = Agence::all();
        $this->departements = Fournisseur::all();
        $this->materiels = Materiel::all();
        $bonSortis = BonSorti::all();
        return view('livewire.bon-livraison.bon-livraison-show',compact('bonSortis'));
    }
}
