<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Site extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "nom_site", "nature",
        "localisation_geographique",
        "adresse_postale",
        "contact", "code_postal",
        "fax", "commentaire", "entite_id", "code_automatique"
    ];


    public function etages(){
        return $this->hasMany(Etage::class);
    }
    public function appartements()
    {
        return $this->hasManyThrough(Etage::class,Appartement::class);
    }

    public function pieces(){
        return $this->hasMany(Piece::class);
    }
}
