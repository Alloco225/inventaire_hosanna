<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function piece()
    {
        return $this->belongsTo(Piece::class);
    }

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
    public function sousCategorie(){
        return $this->belongsTo(SousCategorie::class, 'sous_categorie_id');
    }
    public function etat(){
      return  $this->belongsTo(Etat::class);
    }
    public function inventaire(){
     return   $this->belongsTo(Inventaire::class);
    }
    public function fournisseur(){
       return $this->belongsTo(Fournisseur::class);
    }

    public function images()
    {
        return $this->hasMany(ArticleImage::class, "article_id");
    }

    public function etage()
    {
        return $this->belongsTo(Etage::class);
    }

    public function contrats()
    {
        return $this->hasMany(Contrat::class, "article_id");
    }

    public function historiques()
    {
        return $this->hasMany(MouvementHistory::class, "article_id");
    }

    public function etatHistoriques()
    {
        return $this->hasMany(StateHistory::class, "article_id");
    }



    public function inventaires(){
      return  $this->hasMany(Inventaire::class);
    }

    public function site(){
        return  $this->belongsTo(Site::class);
      }
}
