<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_products', function (Blueprint $table) {
            $table->timestamps();
            $table->increments('id');
            $table->integer('no_of_contents')->default(1);
            //Foreign key.
            $table->integer('item_id')->unsigned()->nullable(false);
            $table->integer('product_id')->unsigned()->nullable(false);
            $table->unique(['item_id', 'product_id']);

            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_products');
    }
}
