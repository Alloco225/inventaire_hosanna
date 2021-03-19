<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Site;
use App\Models\Etage;

class EtageForm extends Component
{

    use ModalHandler;
    public $title = "Ajouter un etage";

    public $sites;
    public $nom_etage = "";
    public $siteId;
    public $site = null;

    public function createEtage(): void
    {

        $validationRules = [ "nom_etage" => "required" ];
        if($this->site === null) {
            $validationRules["siteId"] = "required";
        }

        $this->validate($validationRules);

        $etage = Etage::create([
           'nom_etage' => $this->nom_etage,
           'site_id' => $this->site ? $this->site->id : $this->siteId
        ]);

        $this->clearForm();
        $this->closeModal();
        $this->emit("etageCreated", $etage);

        session()->flash("success", "L'etage a été créé avec succès");
    }

    private function clearForm()
    {
        $this->nom_etage = "";
        $this->siteId = "";

    }
    public function render()
    {
        $this->sites = Site::latest()->get();
        return view('livewire.etage-form', ['sites'=>$this->sites]);
    }
}
