<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directions', function (Blueprint $table) {
            $table->id();
            $table->string('nom_direction')->nullable();
            $table->string('code_direction')->nullable();
            $table->integer('contact')->nullable();
            $table->string('nom_directeur')->nullable();
            $table->string('description_activite')->nullable();
            $table->longText('commentaire')->nullable();
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
        Schema::dropIfExists('directions');
    }
}
