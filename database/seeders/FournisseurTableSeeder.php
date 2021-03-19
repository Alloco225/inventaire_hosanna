<?php

namespace Database\Seeders;

use App\Models\Fournisseur;
use Illuminate\Database\Seeder;

class FournisseurTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fournisseur::create([
            "nom" => "Kone Moussa",
            'adresse' => 'test',
            'numero_telephone' => 0544650223,
            'email' => 'fournisseur@inventorys.com',
            'localite' => 'Abidjan'
           
        ]);

        Fournisseur::create([
            "nom" => "KouaKan Blinde",
            'adresse' => 'test',
            'numero_telephone' => 0544650223,
            'email' => 'fournisseur@inventorys.com',
            'localite' => 'Bouake'
           
        ]);


        Fournisseur::create([
            "nom" => "Ouattara Siddik",
            'adresse' => 'test',
            'numero_telephone' => 0544650223,
            'email' => 'fournisseur@inventorys.com',
            'localite' => 'San pedro'
           
        ]);
    }
}
