<?php

namespace Database\Seeders;

use App\Models\Direction;
use Illuminate\Database\Seeder;

class DirectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Direction::create([
            'nom_direction'=> 'Direction 1',
           'code_direction'=> 'code 1',
            'contact' => 79062843,
            'nom_directeur'=>'Bamba',
            'description_activite'=>'descript 1',
            'commentaire' => 'commentaire',
            'code_automatique'=>'code auto'
        ]);
    }
}