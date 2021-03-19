<?php

namespace Database\Seeders;

use App\Models\SousCategorie;
use Illuminate\Database\Seeder;

class SousCategorieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SousCategorie::create([
            "id_category" => 1,

            'libelle'=> "test"
           
        ]);

        
        SousCategorie::create([
            "id_category" => 1,

            'libelle'=> "test 2"
           
        ]);

        SousCategorie::create([
            "id_category" => 2,

            'libelle'=> "test 3"
           
        ]);
    }
}
