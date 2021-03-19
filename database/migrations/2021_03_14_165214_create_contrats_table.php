<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrats', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->integer("duree");
            $table->integer("duree_site");
            $table->boolean("periode_duree_site")->default(0); // 0 -> mois, 1 -> ans
            $table->boolean("periode_duree")->default(0); // 0 -> mois, 1 -> ans
            $table->date("date_effet");
            $table->integer("preavis");
            $table->date("echeance");
            $table->date("echeance_site");
            $table->unsignedBigInteger("article_id");
            $table->text("observation");
            $table->timestamps();

            $table->foreign("article_id")->references("id")->on("articles")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrats');
    }
}
