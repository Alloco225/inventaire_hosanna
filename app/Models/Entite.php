<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entite extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'raison_sociale',
        'code_postal',
        'type_particulier',
        'nb_site',
        'nom_responsable_projet',
        'forme_de_societe',
        'objet_social',
        'rmcc',
        'ncc',
        'nom_du_groupe',
        'contact_organisation',
        'contact_responsable_projet',
        'code_automatique',
        'numero_ordre',
        'adresse_siege_social',
        'numero_identification_fiscale',
        'sigle',
    ];

}
