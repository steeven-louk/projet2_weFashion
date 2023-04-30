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
            $table->string('name', '100');
            $table->text('description');
            $table->decimal('price','8','2');
            $table->string('image');
            $table->enum('status',['publié','non publié']);
            $table->enum('state',['en solde','standard']);
            $table->string('reference', 16);
            $table-> unsignedBigInteger('category_id');
            $table-> foreign('category_id')->references('id')->on('categories');
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
