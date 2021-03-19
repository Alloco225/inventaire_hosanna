<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Seeder;

class CategorieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categorie::create([
            "Libelle" => "Appareil Electrique",
           
        ]);

        Categorie::create([
            "Libelle" => "Outils Informatique",
           
        ]);

        Categorie::create([
            "Libelle" => "Meuble",
           
        ]);
    }
}
