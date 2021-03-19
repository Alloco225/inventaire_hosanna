<?php

namespace Database\Seeders;

use App\Models\Etat;
use Illuminate\Database\Seeder;

class EtatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Etat::create([
            'libelle'=> "Nouveau"
        ]);

        Etat::create([
            'libelle'=> "Degradé"
        ]);

        Etat::create([
            'libelle'=> "Deuxième main"
        ]);

        Etat::create([
            'libelle'=> "HS"
        ]);
    }
}
