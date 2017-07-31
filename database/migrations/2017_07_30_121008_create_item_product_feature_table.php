<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemProductFeatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_product_feature', function (Blueprint $table) {
            $table->string('value')->nullable(false);
            //Foreign key.
            $table->integer('product_feature_id')->unsigned()->nullable(false);
            $table->integer('item_id')->unsigned()->nullable(false);

            $table->primary(['item_id','product_feature_id']);

            $table->foreign('product_feature_id')->references('id')->on('product_features')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_product_feature');
    }
}
