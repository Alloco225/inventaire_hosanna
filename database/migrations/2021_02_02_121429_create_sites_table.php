<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('nom_site');
            $table->string('nature')->nullable();
            $table->string('localisation_geographique')->nullable();
            $table->string('adresse_postale')->nullable();
            $table->string('contact')->nullable();
            $table->string('code_postal')->nullable();
            $table->string('fax')->nullable();
            $table->longText('commentaire')->nullable();
            $table->foreignId('entite_id')->constrained('entites');
            $table->string('code_automatique');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sites');
    }
}
