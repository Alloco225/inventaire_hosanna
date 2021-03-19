<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePiecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pieces', function (Blueprint $table) {
            $table->id();
            $table->string('code_barre');
            $table->string('nom_piece');
            $table->string('nom_entite')->nullable();
            $table->string('nom_direction')->nullable();
            $table->string('nom_bureau')->nullable();
            $table->integer('suface');
            $table->integer('nb_fenetre');
            $table->string('observation')->nullable();
            $table->string('numero_porte')->nullable();
            $table->foreignId('bureau_id')->nullable()->constrained('bureaux')->default(null);
            $table->foreignId('etage_id')->constrained('etages')->nullable()->default(null);
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
        Schema::dropIfExists('pieces');
    }
}
