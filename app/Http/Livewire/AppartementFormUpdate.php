<?php

namespace App\Http\Livewire;

use App\Models\Appartement;
use App\Models\Etage;
use Livewire\Component;

class AppartementFormUpdate extends Component
{

    use ModalHandler;
    public $etages;
    public $nom_appartement;
    public $appartement;

    public $appartementId;
    public $etageId;
    protected $listeners = [
        "appartementUpdating"
    ];

    

    public $title = 'Modifier un appartement';


    public function appartementUpdating($id){

     
     
        $this->appartement = Appartement::where('id', $id)->get()->first();
        $this->nom_appartement = $this->appartement->nom_appartement;
        $this->etageId=$this->appartement->etage->id;
        $this->appartementId = $this->appartement->id;
      
    }

    public function updateAppartement($id): void
    {
        $this->validate([
            "nom_appartement" => "required",
            'etageId' => 'required'
        ]);

        $appartement = Appartement::where('id', $id);

        $appartement->update([

           'nom_appartement' => $this->nom_appartement,
           'etage_id' => $this->etageId
            
            ]);

        $this->clearForm();
        $this->closeModal();
        $this->emit("appartementUpdated", $appartement);

        session()->flash("success", "L'appartement a été modifié avec succès");
    }

    private function clearForm()
    {
        $this->nom_appartement = "";
        $this->etageId = "";
       
    }
    public function render()
    {
        $this->etages = Etage::latest()->get();
        return view('livewire.appartement-form-update', ['etages' => $this->etages]);
    }
}
