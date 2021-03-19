<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBureauxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bureaux', function (Blueprint $table) {
            $table->id();
            $table->integer('n_porte_bureau')->nullable();
            $table->string('nom_bureau')->nullable();
            $table->integer('nb_occupant')->nullable();
            $table->longText('commentaire')->nullable();
            $table->string('code_automatique');
            $table->foreignId('direction_id')->nullable()->constrained('directions');
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
        Schema::dropIfExists('bureaux');
    }
}
