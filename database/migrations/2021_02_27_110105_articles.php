<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Articles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->text('code_barre')->nullable();
            $table->string('nom');
            $table->timestamp('buy_at')->nullable();
            $table->text('numero_inventaire')->nullable();
            $table->text('numero_serie')->nullable();
          
            $table->text('numero_lot')->nullable();
            $table->string('quantite')->nullable();
            $table->string('valeur_residuelle')->nullable();
            $table->text('taux_amortissement')->nullable();
            $table->text('modele')->nullable();
            $table->string('lieu')->nullable();
            $table->text('observation')->nullable();
            $table->string('nombre_annee_amortie')->nullable();
            $table->string('nombre_annee_garantie')->nullable();
            $table->string('etiquette')->nullable();
            $table->text('sortie_inventaire')->nullable();
            $table->text('composant')->nullable();
        
            $table->text('prix_achat')->nullable();
            
        
           
        
       
     
           
        
            $table->foreignId('fournisseur_id')->nullable()->constrained('fournisseurs');
            $table->foreignId('etat_id')->nullable()->constrained('etats');
            $table->foreignId('piece_id')->nullable()->constrained('pieces');
            $table->foreignId('sous_categorie_id')->nullable()->constrained('sous_categories');
            $table->foreignId('inventaire_id')->nullable()->constrained('inventaires');
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
        //
    }
}
