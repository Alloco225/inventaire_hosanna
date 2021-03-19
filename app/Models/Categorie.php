<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table  = "categories";

    public function  sousCategories(){
        return $this->hasMany(SousCategorie::class,'id_category');
    }
    public function  articles(){
        return $this->hasMany(Article::class);
    }
}
