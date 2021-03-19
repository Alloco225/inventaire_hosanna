<?php

namespace App\Http\Livewire;

use App\Models\Direction;
use Livewire\Component;
use Illuminate\Support\Str;
class DirectionFormUpdate extends Component
{

    use ModalHandler;
    public $appartements;
    public $direction;
    public $nom_direction;
    public $nom_directeur;
    public $contact;
    public $description_activite;
    public $commentaire;
    public $code_direction;

    public $directionId;
    public $appartementId=[];
    protected $listeners = [
        "directionUpdating"
    ];

    

    public $title = 'Modifier une direction';


    public function directionUpdating($id){

     
     
        $this->direction = Direction::where('id', $id)->get()->first();
         $this->nom_direction = $this->direction->nom_direction;
        $this->nom_directeur = $this->direction->nom_directeur;
        $this->contact = $this->direction->contact;
        $this->commentaire = $this->direction->commentaire;
        $this->description_activite = $this->direction->description_activite;
        $this->code_direction = $this->direction->code_direction; 
        //$this->appartementId=; recuperation du tableau des id d'appartements
        $this->directionId = $this->direction->id;
      
    }

    public function updateDirection($id): void
    {
        $this->validate([
            "nom_direction" => "required",
            'nom_directeur' => 'required',
            'contact' => 'required',
            'commentaire' => 'required',
            'description_activite' => 'required',
            'code_direction' => 'required',
        ]);

        $direction = Direction::where('id', $id);

        $direction->update(
        [
            
            "nom_direction" => $this->nom_direction,
            'nom_directeur' => $this->nom_directeur,
            'contact' => $this->contact,
            'commentaire' => $this->commentaire,
            'description_activite' => $this->description_activite,
            'code_direction' => $this->code_direction,
            "code_automatique" => Str::random(10)
        
        ]);

        $this->clearForm();
        $this->closeModal();
        $this->emit("directionUpdated", $direction);

        session()->flash("success", "La direction a été modifié eavec succès");
    }

    protected function getFormAttributes(): array
    {
        $attributes = request()["serverMemo"]["data"];
      
        $attributes["code_automatique"] = Str::random(10);

        return $attributes;
    }

    private function clearForm()
    {
        $this->nom_direction = "";
        $this->nom_directeur = "";
        $this->contact = "";
        $this->description_activite = "";
        $this->commentaire = "";
        $this->code_direction = "";
       
    }
    public function render()
    {
        return view('livewire.direction-form-update');
    }
}
