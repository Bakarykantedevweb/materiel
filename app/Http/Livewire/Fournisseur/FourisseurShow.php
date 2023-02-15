<?php

namespace App\Http\Livewire\Fournisseur;

use Livewire\Component;
use App\Models\Fournisseur;

class FourisseurShow extends Component
{
    public $nom, $fournisseur_id;

    protected function rules()
    {
        return [
            'nom' => 'required|string|',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveFournisseur()
    {
        $validatedData = $this->validate();

        Fournisseur::create($validatedData);
        session()->flash('success', 'Fournisseur Added Successfull');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }


    public function editFournisseur(int $fournisseur_id)
    {
        $Fournisseur = Fournisseur::find($fournisseur_id);
        if($Fournisseur)
        {
            $this->fournisseur_id = $fournisseur_id;
            $this->nom = $Fournisseur->nom;
        }
        else
        {
            return redirect()->to('/Fournisseurs');
        }
    }

    public function updateFournisseur()
    {
        $validatedData = $this->validate();
        Fournisseur::where('id',$this->fournisseur_id)->update([
            'nom' => $validatedData['nom'],
        ]);
        session()->flash('success', 'Fournisseur Updated Successfull');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteFournisseur(int $fournisseur_id)
    {
        $this->fournisseur_id = $fournisseur_id;
    }

    public function destroyFournisseur()
    {
        Fournisseur::find($this->fournisseur_id)->delete();
        session()->flash('success', 'Fournisseur Deleted Successfull');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->nom = '';
    }
    public function render()
    {
        $fournisseurs = Fournisseur::paginate(10);
        return view('livewire.fournisseur.fourisseur-show',compact('fournisseurs'));
    }
}
