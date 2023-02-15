<?php

namespace App\Http\Livewire\MaterielSorti;

use App\Models\Agence;
use Livewire\Component;
use App\Models\Materiel;
use App\Models\Departement;
use App\Models\MaterielSorti;

class MaterielSortiShow extends Component
{
    public $departement, $agence, $nom, $prenom, $date_sortie,
    $materielSorti_id;

    public $materiel = [];

    public $date = '';

       protected function rules()
    {
        return [
            'departement' => 'required',
            'agence' => 'required',
            'nom' => 'required|string|',
            'prenom' => 'required|string|',
            'date_sortie' => 'required|string|min:6',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }


    public  function saveMaterielSorti()
    {
        $validatedData = $this->validate();
        $materielSorti = new MaterielSorti;
        $materielSorti->departement_id = $validatedData['departement'];
        $materielSorti->agence_id = $validatedData['agence'];
        $materielSorti->nom = $validatedData['nom'];
        $materielSorti->prenom = $validatedData['prenom'];
        $materielSorti->departement_id = $validatedData['departement'];
        $materielSorti->date_sortie = $validatedData['date_sortie'];
        $materielSorti->materiel = json_encode($validatedData['materiel']);
        $materielSorti->save();
        session()->flash('success', 'Materiel Sortie Added Successfull');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function editMaterielSorti(int $materielSorti_id)
    {
        $materielSorti = MaterielSorti::find($materielSorti_id);
        if($materielSorti)
        {
            $this->materielSorti_id = $materielSorti_id;
            $this->materiel = $materielSorti->materiel;
            $this->departement = $materielSorti->departement_id;
            $this->agence = $materielSorti->agence_id;
            $this->nom = $materielSorti->nom;
            $this->prenom = $materielSorti->prenom;
            $this->date_sortie = $materielSorti->date_sorti;
        }
        else
        {
            return redirect()->to('/materiels-sortis');
        }
    }

    public function updateMaterielSorti()
    {
        $validatedData = $this->validate();
        $materielSorti = MaterielSorti::find($this->materielSorti_id);
        $materielSorti->departement_id = $validatedData['departement'];
        $materielSorti->agence_id = $validatedData['agence'];
        $materielSorti->nom = $validatedData['nom'];
        $materielSorti->prenom = $validatedData['prenom'];
        $materielSorti->departement_id = $validatedData['departement'];
        $materielSorti->date_sorti = $validatedData['date_sortie'];
        $materielSorti->materiel = $validatedData['materiel'];
        $materielSorti->save();
        session()->flash('success', 'Materiel Sortie Updated Successfull');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }
    public function deleteMaterielSorti(int $materielSorti_id)
    {
        $this->materielSorti_id = $materielSorti_id;
    }

    public function destroyMaterielSorti()
    {
        MaterielSorti::find($this->materielSorti_id)->delete();
        session()->flash('success', 'Materiel Sortie Deleted Successfull');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->departement = '';
        $this->agence = '';
        $this->nom = '';
        $this->prenom = '';
        $this->date_sortie = '';
        $this->materiel = '';
    }
    public function render()
    {
        $materielSorti = MaterielSorti::whereDate('date_sorti', 'like', '%'.$this->date.'%')->OrderBy('id','DESC')->paginate(10);
        $departements = Departement::OrderBy('nom','ASC')->get();
        $agences = Agence::OrderBy('nom','ASC')->get();
        $materiels = Materiel::all();
          return view('livewire.materiel-sorti.materiel-sorti-show',compact('materielSorti','departements','agences','materiels'));
    }
}
