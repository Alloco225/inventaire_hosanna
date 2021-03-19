<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
        $this->call(EntiteTableSeeder::class);

        $this->call(CategorieTableSeeder::class);
        $this->call(SousCategorieTableSeeder::class);
        $this->call(EtatTableSeeder::class);
        //$this->call(ArticleTableSeeder::class);
        $this->call(FournisseurTableSeeder::class);
    }
}
