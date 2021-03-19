<?php

namespace App\Http\Livewire;

use App\Models\Site;
use Livewire\Component;

class SiteFormUpdate extends Component
{
    use ModalHandler;

    public $title = "Modifier un site";
    public $nom_site = "";
    public $nature = "";
    public $localisation_geographique = "";
    public $adresse_postale = "";
    public $contact = "";
    public $code_postal = "";
    public $fax = "";
    public $commentaire = "";
    public $siteId ;
    protected $listeners = [
        "siteUpdating"
    ];

    public function siteUpdating($id)
    {

        $this->site = Site::where('id', $id)->get()->first();

        $this->nom_site = $this->site->nom_site;
        $this->nature = $this->site->nature;
        $this->contact = $this->site->contact;
        $this->fax= $this->site->fax;
        $this->commentaire = $this->site->commentaire;
        $this->adresse_postale = $this->site->adresse_postale;
        $this->code_postal = $this->site->code_postal;
        $this->localisation_geographique = $this->site->localisation_geographique;
        // $this->etageId=$this->appartement->etage->id;

        $this->siteId = $this->site->id;
    }

    public function updateSite($id): void
    {
        $this->validate([
            "nom_site" => "required",
            'nature' => 'required',
            'contact' => 'required',
            'fax' => 'required',
        ]);

        $site = Site::where('id', $id);

        $site->update([
           'nom_site' => $this->nom_site,
           'nature' => $this->nature,
           'contact' => $this->contact,
           'commentaire' => $this->commentaire,
           'code_postal' => $this->code_postal,
           'fax' => $this->fax,
           'localisation_geographique' => $this->localisation_geographique,
           'adresse_postale' => $this->adresse_postale,
        ]);

        $this->clearForm();
        $this->closeModal();
        $this->emit("siteUpdated", $site);

        session()->flash("success", "Le site a été modifié avec succès");
    }

    private function clearForm()
    {
        $this->nom_site = "";
        $this->nature ="";
        $this->contact="";
        $this->commentaire="";
        $this->code_postal="";
        $this->fax="";
        $this->localisation_geographique="";
        $this->adresse_postale="";
    }

    public function render()
    {
        return view('livewire.site-form-update');
    }
}
