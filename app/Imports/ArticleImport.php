<?php

namespace App\Imports;

use App\Model\Article;
use App\Models\Article as ModelsArticle;
use App\Models\Etage;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Throwable;

class ArticleImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation

{

    use SkipsErrors;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        $article = new ModelsArticle([
            "nom" => $row['nom'],
            "quantite" =>  $row['quantite'] ?? '',
            "prix_achat" =>  $row['prix_achat'] ?? '',
            "observation"  =>  $row['observation'] ?? '',
            'code_barre' =>  $row['code_barre'],
            "date_mise_en_service"=>  $row['date_mise_en_service'] ?? '',
            "taux_amortissement" => $row['taux'] ?? '',
            "numero_serie" => $row['numero_serie'] ?? '',
            

        ]);

        /*$etage = new Etage([
            'nom_etage' => $row['nom'],
            'site_id' => 1,
        ]);*/

        return $article ;
    }

    public function onError(Throwable $e)
    {
        
    }

    public function rules():array
    {

        return [
            '*.code_barre' => ['required', 'unique:articles,code_barre'],
            '*.nom'=>['required'],
        ];
    }
}
