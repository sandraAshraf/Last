<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_informations', function (Blueprint $table) {
            $table->timestamps();
            $table->increments('id');
            $table->integer('content')->nullable(false);

            //Foreign key.
            $table->integer('sub_item_id')->unsigned()->nullable(false);
            $table->integer('item_product_id')->unsigned()->nullable(false);
            $table->integer('transaction_id')->unsigned()->nullable(false);

            $table->unique(['item_product_id', 'sub_item_id', 'transaction_id'], 'ist_unique');

            $table->foreign('item_product_id')->references('id')->on('item_products')->onDelete('cascade');
            $table->foreign('sub_item_id')->references('id')->on('sub_items')->onDelete('cascade');
            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_informations');
    }
}
