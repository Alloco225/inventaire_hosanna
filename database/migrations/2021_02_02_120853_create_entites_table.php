<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entites', function (Blueprint $table) {
            $table->id();

            $table->string('raison_sociale')->nullable();
            $table->integer('code_postal')->nullable();
            $table->string('type_particulier')->nullable();
            $table->integer('nb_site')->nullable();
            $table->string('nom_responsable_projet')->nullable();
            $table->string('forme_de_societe');
            $table->string('objet_social');
            $table->string('rmcc')->nullable();
            $table->string('ncc')->nullable();
            $table->string('nom_du_groupe')->nullable();
            $table->string('contact_organisation');
            $table->string('contact_responsable_projet')->nullable();
            $table->string('code_automatique');
            $table->integer('numero_ordre')->nullable();
            $table->string('adresse_siege_social')->nullable();
            $table->string('numero_identification_fiscale')->nullable();
            $table->string('sigle')->nullable();
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
        Schema::dropIfExists('entites');
    }
}
