<?php

namespace App\Http\Livewire;

use App\Models\Etat;
use App\Models\Site;
use App\Models\Etage;
use App\Models\Piece;
use App\Models\Article;
use Livewire\Component;
use App\Models\Categorie;
use App\Models\Fournisseur;
use App\Models\SousCategorie;
use Livewire\WithFileUploads;

class ArticleForm extends Component
{
    use ModalHandler;
    use WithFileUploads;

    public $title = "Ajouter un article";
    public $nom = "";
    public $code_barre = "";
    public $quantite = "";
    public $observation = "";
    public $prix_achat = "";
    public $lieu = "";
    public $modele = "";
    public $buy_at = "";
    public $numero_serie = "";
    public $numero_lot = "";
    public $taux_amortissement= "";
    public $nombre_annee_amortie = "";
    public $valeur_residuelle = "";
    public $nombre_annee_garantie = "";
    public $sortie_inventaire = "";
    public $etiquette = "";
    public $composant = "";
    public $photo;
    public $sous_categories;
    public $selected_categorie= null;
    public $sous_categorie_id= null;
    public $fournisseur_id=null;
    public $etat_id=null;
    public $piece_id;
    public $selected_site=null;
    public $pieces=null;
    public $selected_etage=null;
    public $etage=null;
    public $site_id;
    public $etage_id, $etages;


    protected $listeners = [
        "articleCreated" => '$refresh',
        "articleUpdated" => '$refresh'
    ];

    public function updatedSelectedSite($site_id)
    {
        $this->etages = Etage::where('site_id', $site_id)->get();
        $this->site_id = $site_id;
    }
    public function updatedSelectedEtage($etage_id)
    {
        $this->pieces = Piece::where('etage_id', $etage_id)->get();
        $this->etage_id = $etage_id;
    }
    public function updatedSelectedCategorie($categorie_id)
    {
        $this->sous_categories = SousCategorie::where('id_category', $categorie_id)->get();
    }

    public function createArticle()
    {

        $this->validate([
            "nom" => "required",
            "quantite" => "required|integer",
            "prix_achat" => "required|integer",
            "observation"  => "required",
            "selected_site" => 'required',
            'selected_etage' => 'required',
            "buy_at"=> 'required'
        ]);
        /*$i= Article::latest()->first()->id;
        $photo_name= "$i".'.jpg';

        $this->photo->storeAs('articles', $photo_name);*/

        $attributes = request()["serverMemo"]["data"];
        $attributes["site_id"] = $this->site_id;
        $attributes["etage_id"] = $this->etage_id;
      //  $attributes["photo"] = 'articles/'.$photo_name;
        unset($attributes["title"]);
        unset($attributes["etage"]);
        unset($attributes["etages"]);
        unset($attributes["pieces"]);
        unset($attributes["sous_categories"]);
        unset($attributes["selected_categorie"]);
        unset($attributes["selected_etage"]);
        unset($attributes["selected_site"]);

      

        $article = Article::create($attributes);

        $this->clearForm();
        $this->closeModal();
        $this->emit("ArticleCreated", $article);

        session()->flash("success", "L'article a été créé avec succès");
    }

    public function render()
    {
        return view('livewire.article-form', ['categories'=> Categorie::all(),
        'fournisseurs'=>Fournisseur::all(),
        'etats'=>Etat::all(),
        'sites'=> Site::all()]);
    }
    public function clearForm(){
        $this->nom = "";
        $this->code_barre = "";
        $this->quantite = "";
        $this->observation = "";
        $this->numero_inventaire = "";
        $this->prix_achat = "";
        $this->lieu = "";
        $this->modele = "";
    }

}
