<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExitStrategiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exit_strategies', function (Blueprint $table) {
            $table->timestamps();
            $table->increments('id');
            $table->boolean('is_descending')->default(true);

            //Foreign key.
            $table->integer('warehouse_id')->unsigned()->nullable(false);
            $table->integer('product_id')->unsigned()->nullable(false);
            $table->integer('product_feature_id')->unsigned()->nullable(false);

            $table->unique(['warehouse_id', 'product_id', 'product_feature_id'], 'wpp_unique');

            $table->foreign('product_feature_id')->references('id')->on('product_features')->onDelete('cascade');
            $table->foreign('warehouse_id')->references('id')->on('warehouses')->onDelete('cascade');
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
        Schema::dropIfExists('exit_strategies');
    }
}
