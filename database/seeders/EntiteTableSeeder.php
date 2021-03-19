<?php

namespace Database\Seeders;

use App\Models\Entite;
use Illuminate\Database\Seeder;

class EntiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Entite::create([
            "forme_de_societe" => "",
            "objet_social" => "",
            "code_automatique" => "000",
            "contact_organisation" => ""
        ]);
    }
}
