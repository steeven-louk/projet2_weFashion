<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom','5', '100');
            $table->text('description');
            $table->decimal('prix','8','2');
            $table->enum('tailles',['XS', 'S', 'M', 'L', 'XL']);
            $table->string('image');
            $table->enum('statut',['publié','non publié']);
            $table->enum('etat',['en solde','standard']);
            $table->string('reference', 16);
            $table->enum('categorie',['homme','femme']);
            $table->boolean('isAdmin')->default(false);
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
        Schema::dropIfExists('produits');
    }
}
