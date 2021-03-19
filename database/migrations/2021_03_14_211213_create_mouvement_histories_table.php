<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMouvementHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mouvement_histories', function (Blueprint $table) {
            $table->id();
            $table->string('old_quantity')->nullable();
            $table->string('diff_quantity')->nullable();
            $table->foreignId('article_id')->nullable()->constrained('articles');
            $table->string('libelle')->nullable();
            $table->text('observation')->nullable();
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
        Schema::dropIfExists('mouvement_histories');
    }
}
