<?php

namespace App\Imports;

use App\Model\Article;
use App\Models\Inventaire;
use App\Models\Etage;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class InventaireImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $id = "INV_0".rand(10000,90000)."_00".rand(1000,9000);

        return new Inventaire([
            "article_code_barre" => $row['code_barre'],
            "quantite" =>  $row['quantite_inventoriee'],
            "numero_inventaire" =>  $id,
            "observation"  =>  $row['observation_a_inventaire'],
            "date"=>  $row['date']
        ]);

        /*$etage = new Etage([
            'nom_etage' => $row['nom'],
            'site_id' => 1,
        ]);*/

         ;
    }
}
