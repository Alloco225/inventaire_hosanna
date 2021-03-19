<?php

namespace App\Http\Livewire;

use App\Models\Entite;
use App\Models\Site;
use Illuminate\Support\Str;
use Livewire\Component;


class SiteForm extends Component
{
    use ModalHandler;

    public $title = "Ajouter un site";
    public $nom_site = "";
    public $nature = "";
    public $localisation_geographique = "";
    public $adresse_postale = "";
    public $contact = "";
    public $code_postal = "";
    public $fax = "";
    public $commentaire = "";


    public function createSite(): void
    {
        $this->validate([
            "nom_site" => "required",
            "code_postal" => "nullable|numeric",
            "fax"   => "nullable|numeric"
        ]);

        $site = Site::create($this->getFormAttributes());

        $this->clearForm();
        $this->closeModal();
        $this->emit("siteCreated", $site);

        session()->flash("success", "L'etage a été créé avec succès");
    }


    public function render()
    {
        return view('livewire.site-form');
    }


    protected function getFormAttributes(): array
    {
        $attributes = request()["serverMemo"]["data"];
        $attributes["entite_id"] = Entite::first()->id ?? 1;
        $attributes["code_automatique"] = Str::random(10);

        return $attributes;
    }


    private function clearForm()
    {
        $this->nom_site = "";
        $this->nature = "";
        $this->localisation_geographique = "";
        $this->adresse_postale = "";
        $this->contact = "";
        $this->code_postal = "";
        $this->fax = "";
        $this->commentaire = "";
    }
}
