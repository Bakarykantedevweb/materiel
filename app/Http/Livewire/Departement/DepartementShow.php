<?php

namespace App\Http\Livewire\Departement;

use Livewire\Component;
use App\Models\Departement;

class DepartementShow extends Component
{
    public $nom, $departement_id;

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

    public function saveDepartement()
    {
        $validatedData = $this->validate();

        Departement::create($validatedData);
        session()->flash('success', 'Departement Added Successfull');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }


    public function editDepartement(int $departement_id)
    {
        $departement = Departement::find($departement_id);
        if($departement)
        {
            $this->departement_id = $departement_id;
            $this->nom = $departement->nom;
        }
        else
        {
            return redirect()->to('/departements');
        }
    }

    public function updateDepartement()
    {
        $validatedData = $this->validate();
        Departement::where('id',$this->departement_id)->update([
            'nom' => $validatedData['nom'],
        ]);
        session()->flash('success', 'Departement Updated Successfull');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteDepartement(int $departement_id)
    {
        $this->departement_id = $departement_id;
    }

    public function destroyDepartement()
    {
        Departement::find($this->departement_id)->delete();
        session()->flash('success', 'Departement Deleted Successfull');
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
        $departements = Departement::OrderBy('nom','ASC')->paginate(10);
        return view('livewire.departement.departement-show',compact('departements'));
    }
}
