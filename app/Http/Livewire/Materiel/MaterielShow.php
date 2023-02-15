<?php
namespace App\Http\Livewire\Materiel;

use App\Models\Type;
use Livewire\Component;
use App\Models\Materiel;
use Livewire\WithPagination;

class MaterielShow extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';


    public  $marque, $model, $etat, $serie, $date_entre, $description, $type, $materiel_id;

    public $datemois = '';
    public $dateannee = '';

    protected function rules()
    {
        return [
            'marque' => 'required|string|',
            'model' => 'required|string|',
            'serie' => 'required|string|min:6',
            'date_entre' => 'required|string|',
            'type' => 'required|string|',
            'etat' => 'required|string|',
            'description' => 'required|string|',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveMateriel()
    {
        $validatedData = $this->validate();
        $materiel = new Materiel;
        $materiel->marque = $validatedData['marque'];
        $materiel->model = $validatedData['model'];
        $materiel->serie = $validatedData['serie'];
        $materiel->type_id = $validatedData['type'];
        $materiel->etat = $validatedData['etat'];
        $materiel->date_entre = $validatedData['date_entre'];
        $materiel->description = $validatedData['description'];
        $materiel->save();
        session()->flash('success', 'Materiel Added Successfull');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function editMateriel(int $materiel_id)
    {
        $materiel = Materiel::find($materiel_id);
        if($materiel)
        {
            $this->materiel_id = $materiel_id;
            $this->marque = $materiel->marque;
            $this->model = $materiel->model;
            $this->serie = $materiel->serie;
            $this->type = $materiel->type;
            $this->date_entre = $materiel->date_entre;
        }
        else
        {
            return redirect()->to('/materiels');
        }
    }

    public function updateMateriel()
    {
        $validatedData = $this->validate();
        Materiel::where('id',$this->materiel_id)->update([
            'marque' => $validatedData['marque'],
            'model' => $validatedData['model'],
            'serie' => $validatedData['serie'],
            'type' => $validatedData['type'],
            'quantite' => $validatedData['quantite'],
            'date_entre' => $validatedData['date_entre'],
        ]);
        session()->flash('success', 'Materiel Updated Successfull');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteMateriel(int $materiel_id)
    {
        $this->materiel_id = $materiel_id;
    }

    public function destroyMateriel()
    {
        Materiel::find($this->materiel_id)->delete();
        session()->flash('success', 'Materiel Deleted Successfull');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->marque = '';
        $this->model = '';
        $this->serie = '';
        $this->date_entre = '';
        $this->type = '';
        $this->etat = '';
        $this->description = '';
    }

    public function render()
    {
        $types = Type::all();
        $materiels = Materiel::whereDate('date_entre','like','%'.$this->datemois.'%')->where('date_entre','like','%'.$this->dateannee.'%')->paginate(10);
        return view('livewire.materiel.materiel-show',compact('materiels','types'));
    }
}
