<?php

namespace App\Http\Livewire\Agence;

use App\Models\Agence;
use Livewire\Component;
use Livewire\WithPagination;

class AgenceShow extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $nom, $agence_id;

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

    public function saveAgence()
    {
        $validatedData = $this->validate();

        Agence::create($validatedData);
        session()->flash('success', 'Agence Added Successfull');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }


    public function editAgence(int $agence_id)
    {
        $agence = Agence::find($agence_id);
        if($agence)
        {
            $this->agence_id = $agence_id;
            $this->nom = $agence->nom;
        }
        else
        {
            return redirect()->to('/agences');
        }
    }

    public function updateAgence()
    {
        $validatedData = $this->validate();
        Agence::where('id',$this->agence_id)->update([
            'nom' => $validatedData['nom'],
        ]);
        session()->flash('success', 'Agence Updated Successfull');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteAgence(int $agence_id)
    {
        $this->agence_id = $agence_id;
    }

    public function destroyAgence()
    {
        Agence::find($this->agence_id)->delete();
        session()->flash('success', 'Agence Deleted Successfull');
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
        $agences = Agence::OrderBy('nom','ASC')->paginate(10);
        return view('livewire.agence.agence-show',compact('agences'));
    }
}
