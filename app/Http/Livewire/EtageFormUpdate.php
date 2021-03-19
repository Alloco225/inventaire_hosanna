<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Site;
use App\Models\Etage;
class EtageFormUpdate extends Component
{
    use ModalHandler;

    public $title = "Modifier l'etage";
    public $sites;
    public $nom_etage;
    public $etage;
    public $siteId;
    public $etageId;
    public $site = null;

    protected $listeners = [
        "etageUpdating"
    ];

    public function etageUpdating($id){

        $this->etage = Etage::where('id', $id)->get()->first();
        $this->nom_etage = $this->etage->nom_etage;
        $this->siteId = $this->etage->site->id;
        $this->etageId = $this->etage->id;
    }


    public function updateEtage($id): void
    {
        $this->validate([
            "nom_etage" => "required",
            'siteId' => 'required'
        ]);

        $etage = Etage::where('id', $id);

        $etage->update([
           'nom_etage' => $this->nom_etage,
           'site_id' => $this->site ? $this->site->id : $this->siteId
        ]);

        $this->clearForm();
        $this->closeModal();
        $this->emit("etageUpdated", $etage);

        session()->flash("success", "L'etage a été modifié avec succès");
    }

    private function clearForm()
    {
        $this->nom_etage = "";
        $this->siteId = "";
    }

    public function render()
    {
        $this->sites = Site::latest()->get();
        return view('livewire.etage-form-update',  ['sites' => $this->sites]);
    }
}
