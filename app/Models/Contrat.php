<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;

    protected $fillable = [
        "nom", "cout", "duree", "duree_site", "periode_duree_site", "periode_duree",
        "date_effet", "preavis", "echeance", "echeance_site", "observation"
    ];

    public function article()
    {
        return $this->belongsTo(Article::class, "article_id");
    }
}
