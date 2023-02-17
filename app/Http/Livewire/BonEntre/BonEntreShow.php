<?php

namespace App\Http\Livewire\BonEntre;

use Livewire\Component;
use App\Models\BonEntre;
use App\Models\Materiel;
use App\Models\Fournisseur;
use Illuminate\Support\Facades\DB;

class BonEntreShow extends Component
{
    public $champs;
    public $key;
    public $materiels;
    public $fournisseurs;
    public $description;
    public $date;
    public $fournisseur;
    public $detailBonMateriels;
    public $bonDetail;

    public $materiel_id =  [];
    public $quantite =  [];
    public $bon_id;

    public function addInput()
    {
        $this->key++;
        $this->champs[] = $this->key;
    }

    public function deleteInput($champ)
    {
        unset($this->materiels[$champ]);
    }

     protected function rules()
    {
        return [
            'description' => 'required|string|',
            'date' => 'required',
            'fournisseur' => 'required',
            'materiel_id' => 'required',
            'quantite' => 'required',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveBon()
    {
       
        $validatedData = $this->validate();
        $bon = new BonEntre;
        $bon->description = $validatedData['description'];
        $bon->date_entre = $validatedData['date'];
        $bon->fournisseur_id = $validatedData['fournisseur'];
        $bon->save();

        $numero = 'BR'.str_pad($bon->id,3 ,'0',STR_PAD_LEFT);
        $bon->numero = $numero;
        $bon->save();

        if($bon)
        {
            for($i = 0; $i < count($this->materiel_id); $i++)
            {
                DB::table('materiels_bon_entres')->insert([
                    'materiel_id' => $this->materiel_id[$i],
                    'bon_entre_id' => $bon->id,
                    'quantite' => $this->quantite[$i]
                ]);
            }
        }
        session()->flash('success', 'Agence Added Successfull');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function detailBon($bon_id)
    {
        $this->bonDetail=BonEntre::find($bon_id);
        if($this->bonDetail != "")
        {
            $this->detailBonMateriels = $this->bonDetail->materiels;
        }
    }

     public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->description = '';
        $this->date = '';
        $this->fournisseur = '';
    }

    public function render()
    {
        $this->materiels = Materiel::all();
        $this->fournisseurs = Fournisseur::where('status','1')->get();
        $bonentres = BonEntre::all();
        return view('livewire.bon-entre.bon-entre-show',compact('bonentres'));
    }
}
