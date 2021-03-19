<?php

namespace App\Http\Livewire;

use App\Models\Appartement;
use App\Models\Etage;
use Livewire\Component;

class AppartementForm extends Component
{

    public $etages, $nom_appartement, $etageId;
    public $title = "Ajouter un appartement";

    use ModalHandler;

    public function createAppartement(): void
    {
        $this->validate([
            "nom_appartement" => "required",
          'etageId' => 'required'
        ]);

        $appartement = Appartement::create([

           'nom_appartement' => $this->nom_appartement,
           'etage_id' => $this->etageId
            
            ]);

        $this->clearForm();
        $this->closeModal();
        $this->emit("appartementCreated", $appartement);

        session()->flash("success", "L'appartement a été créé avec succès");
    }

    private function clearForm()
    {
        $this->nom_appartement = "";
        $this->etageId = "";
       
    }

    public function render()
    {
        $this->etages = Etage::latest()->get();
        return view('livewire.appartement-form', ['etages', $this->etages]);
    }
}
