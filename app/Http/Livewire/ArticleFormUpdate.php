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

class ArticleFormUpdate extends Component
{
    use ModalHandler;
    use WithFileUploads;

    public $title = "Modifier un article";
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
    public $numero_inventaire = "";
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
    public $articleId ;

    protected $listeners = [
        "articleUpdating"
    ];

    public function updatedSelectedSite($site_id)
    {
        $this->etages = Etage::where('site_id', $site_id)->get();
    }
    public function updatedSelectedEtage($etage_id)
    {
        $this->pieces = Piece::where('etage_id', $etage_id)->get();
    }
    public function updatedSelectedCategorie($categorie_id)
    {
        $this->sous_categories = SousCategorie::where('id_category', $categorie_id)->get();
    }

    public function articleUpdating($id)
    {
        $article = Article::where('id', $id)->get()->first();

        $this->nom = $article->nom;
        $this->code_barre = $article->code_barre;
        $this->quantite = $article->quantite;
        $this->observation= $article->observation;
        $this->numero_inventaire = $article->numero_inventaire;
        $this->prix_achat = $article->prix_achat;
        $this->lieu = $article->lieu;
        $this->modele = $article->modele;
        $this->articleId = $article->id;
        $this->buy_at = $article->buy_at;
        $this->numero_serie = $article->numero_serie;
        $this->numero_lot = $article->numero_lot;
        $this->taux_amortissement= $article->taux_amortissement;
        $this->nombre_annee_amortie = $article->nombre_annee_amortie;
        $this->valeur_residuelle = $article->valeur_residuelle;
        $this->nombre_annee_garantie = $article->nombre_annee_garantie;
        $this->sortie_inventaire = $article->sortie_inventaire;
        $this->etiquette = $article->etiquette;
        $this->composant = $article->composant;
        $this->sous_categorie_id= $article->sous_categorie_id;
        $this->fournisseur_id=$article->fournisseur_id;
        $this->etat_id=$article->etat_id;
        $this->piece_id= $article->piece_id;
    }

    public function updateArticle($id): void
    {
        $this->validate([
            "nom" => "required",
            "quantite" => "required|integer",
            "prix_achat" => "required|integer",
            "observation"  => "max:70"
        ]);

        $article = Article::where('id', $id);

        /*$i= $article->first()->id;
        $photo_name= "$i".'.jpg';

        $this->photo->storeAs('articles', $photo_name);*/

        $article->update([
           'nom' => $this->nom,
           'code_barre' => $this->code_barre,
           'quantite' => $this->quantite,
           'observation' => $this->observation,
           'numero_inventaire' => $this->numero_inventaire,
           'prix_achat' => $this->prix_achat,
           'lieu' => $this->lieu,
           'modele' => $this->modele,
            'buy_at' => $this->buy_at,
            'numero_serie' => $this->numero_serie,
            'numero_lot' => $this->numero_lot,
            'taux_amortissement'=> $this->taux_amortissement,
            'nombre_annee_amortie' => $this->nombre_annee_amortie,
            'valeur_residuelle' => $this->valeur_residuelle,
            'nombre_annee_garantie' => $this->nombre_annee_garantie,
            'sortie_inventaire' => $this->sortie_inventaire,
            'etiquette' => $this->etiquette,
            'composant' => $this->composant,
            'sous_categorie_id'=> $this->sous_categorie_id,
            'fournisseur_id'=>$this->fournisseur_id,
            'etat_id'=>$this->etat_id,
            'piece_id'=> $this->piece_id,
          
        ]);

        $this->clearForm();
        $this->closeModal();
        $this->emit("articleUpdated", $article);

        session()->flash("success", "L'article a été modifié avec succès");
    }

    private function clearForm()
    {
        $this->nom = "";
        $this->code_barre = "";
        $this->quantite = "";
        $this->observation = "";
        $this->prix_achat = "";
        $this->lieu = "";
        $this->modele = "";
        $this->buy_at = "";
        $this->numero_serie = "";
        $this->numero_lot = "";
        $this->taux_amortissement= "";
        $this->nombre_annee_amortie = "";
        $this->valeur_residuelle = "";
        $this->nombre_annee_garantie = "";
        $this->sortie_inventaire = "";
        $this->etiquette = "";
        $this->composant = "";
        $this->sous_categories=null;
        $this->selected_categorie= null;
        $this->sous_categorie_id= null;
        $this->fournisseur_id=null;
        $this->etat_id=null;
        $this->piece_id=null;
        $this->selected_site=null;
        $this->pieces=null;
        $this->selected_etage=null;
        $this->etage=null;
    }

    public function render()
    {
        return view('livewire.article-form-update', ['categories'=> Categorie::all(),
        'fournisseurs'=>Fournisseur::all(),
        'etats'=>Etat::all(),
        'sites'=> Site::all(),
        'etages'=>Etage::all()]);
    }
}
