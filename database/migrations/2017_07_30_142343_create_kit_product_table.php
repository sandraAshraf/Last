<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKitProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kit_product', function (Blueprint $table) {
            $table->integer('kit_id')->unsigned()->nullable(false);
            $table->integer('product_id')->unsigned()->nullable(false);
            $table->integer('no_of_content')->default(1);
            $table->primary(['kit_id', 'product_id']);

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('kit_id')->references('id')->on('kits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kit_product');
    }
}
