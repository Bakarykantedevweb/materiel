<?php

namespace App\Http\Livewire\MaterielRecupere;

use App\Models\Type;
use App\Models\Agence;
use Livewire\Component;
use App\Models\Departement;
use App\Models\MaterielRecupere;

class MaterielRecupereShow extends Component
{
    public $departement, $agence, $etat, $description, $marque, $model, $date_entre, $type,
    $materielRecupere_id;

    public $mois = '';

    protected function rules()
    {
        return [
            'departement' => 'required',
            'agence' => 'required',
            'marque' => 'required|string|',
            'model' => 'required|string|',
            'etat' => 'required|string|',
            'date_entre' => 'required|string|',
            'type' => 'required',
            'description' => 'required|string|',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveMaterielRecupere()
    {
        $validatedData = $this->validate();
        $materielRecupere = new MaterielRecupere;
        $materielRecupere->departement_id = $validatedData['departement'];
        $materielRecupere->agence_id = $validatedData['agence'];
        $materielRecupere->marque = $validatedData['marque'];
        $materielRecupere->modele = $validatedData['model'];
        $materielRecupere->etat = $validatedData['etat'];
        $materielRecupere->type_id = $validatedData['type'];
        $materielRecupere->description = $validatedData['description'];
        $materielRecupere->date_entre = $validatedData['date_entre'];
        $materielRecupere->save();
        session()->flash('success', 'Materiel Recupere Added Successfull');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function editMaterielRecupere(int $materielRecupere_id)
    {
        $materielRecupere = MaterielRecupere::find($materielRecupere_id);
        if($materielRecupere)
        {
            $this->materielRecupere_id = $materielRecupere_id;
            $this->departement = $materielRecupere->departement_id;
            $this->agence = $materielRecupere->agence_id;
            $this->marque = $materielRecupere->marque;
            $this->model = $materielRecupere->modele;
            $this->type = $materielRecupere->type_id;
            $this->etat = $materielRecupere->etat;
            $this->date_entre = $materielRecupere->date_entre;
            $this->description = $materielRecupere->description;
        }
        else
        {
            return redirect()->to('/materiels-recuperes');
        }
    }

    public function updateMaterielRecupere()
    {
        $validatedData = $this->validate();
        $materielRecupere = MaterielRecupere::find($this->materielRecupere_id);
        $materielRecupere->departement_id = $validatedData['departement'];
        $materielRecupere->agence_id = $validatedData['agence'];
        $materielRecupere->marque = $validatedData['marque'];
        $materielRecupere->modele = $validatedData['model'];
        $materielRecupere->etat = $validatedData['etat'];
        $materielRecupere->type_id = $validatedData['type'];
        $materielRecupere->description = $validatedData['description'];
        $materielRecupere->date_entre = $validatedData['date_entre'];
        $materielRecupere->update();
        session()->flash('success', 'Materiel Recupere Updated Successfull');
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
        $this->marque = '';
        $this->model = '';
        $this->date_entre = '';
        $this->type = '';
        $this->description = '';
        $this->etat = '';
    }

    public function render()
    {
        $materielRecupere = MaterielRecupere::whereDate('date_entre', 'like', '%'.$this->mois.'%')->OrderBy('id','DESC')->paginate(10);
        $departements = Departement::OrderBy('nom','ASC')->get();
        $agences = Agence::OrderBy('nom','ASC')->get();
        $types = Type::all();
        return view('livewire.materiel-recupere.materiel-recupere-show',compact('departements','types', 'agences','materielRecupere'));
    }
}
