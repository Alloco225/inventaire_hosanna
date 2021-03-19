<?php

namespace App\Http\Livewire;

use App\Models\Direction;
use Livewire\Component;
use Illuminate\Support\Str;

class DirectionForm extends Component
{
    public $title = "Ajouter une direction";
    public $appartements, $nomDirection, $nomDirecteur, $codeAutomatique, $contact, $descriptionActive,
    $commentaire, $codeDirection;


    use ModalHandler;

    public function createDirection(): void
    {
        $this->validate([
            "nomDirection" => "required",
            'codeDirection' => 'required',
            "contact" => 'required',
            "nomDirecteur" => 'required',
            "descriptionActive" => 'required',
            "commentaire" => 'required'
        ]);

        $direction = Direction::create([

            "nom_direction" => $this->nomDirection,
            'code_direction' => $this->codeDirection,
            "contact" => $this->contact,
            "nom_directeur" => $this->nomDirecteur,
            "description_activite" => $this->descriptionActive,
            "commentaire" => $this->commentaire,
            "code_automatique" => Str::random(10)
            
            ]);

        $this->clearForm();
        $this->closeModal();
        $this->emit("directionCreated", $direction);

        session()->flash("success", "La direction a été créée avec succès");
    }

    private function clearForm()
    {
        $this->nomDirecteur = "";
        $this->nomDirection = "";
        $this->contact = "";
        $this->descriptionActive = "";
        $this->commentaire = "";
        $this->codeDirection = "";
     
       
    }
    public function render()
    {
        return view('livewire.direction-form');
    }
}
