<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousCategorie extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table  = "sous_categories";

    public function categorie(){
        $this->belongsTo(Categorie::class);
    }
    public function articles(){
        $this->hasMany(Article::class);
    }
}
