<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_items', function (Blueprint $table) {
            $table->timestamps();
            $table->increments('id');
            $table->integer('asset_number')->nullable(false); //TODO add the path of the asset pic
            //Foreign key.
            $table->integer('item_product_id')->unsigned()->nullable(false);

            $table->foreign('item_product_id')->references('id')->on('item_products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_items');
    }
}
