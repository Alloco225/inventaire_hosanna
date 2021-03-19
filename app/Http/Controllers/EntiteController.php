<?php

namespace App\Http\Controllers;

use App\Models\Entite;
use Illuminate\Http\Request;

class EntiteController extends Controller
{
    public function index()
    {
        return view("entite.index", [
            "entite" => Entite::first()
        ]);
    }

    public function update(Request $request)
    {
        $attributes = $request->validate([
            'raison_sociale' => [],
            'code_postal' => ["numeric"],
            'type_particulier' => [],
            'nom_responsable_projet' => [],
            'forme_de_societe' => ['required'],
            'objet_social' => [ 'required' ],
            'rmcc' => [],
            'ncc' => [],
            'nom_du_groupe' => [],
            'contact_organisation' => [ 'required' ],
            'contact_responsable_projet' => [],
            'code_automatique' => [ 'required' ],
            'numero_ordre' => ['numeric'],
            'adresse_siege_social' => [],
            'numero_identification_fiscale' => [],
            'sigle' => [],
        ]);

        $entite = Entite::first();
        $entite->update($attributes);

        return redirect()->route("entite.index")->with("success", "L'entité a été mise à jour avec succès");
    }
}
