<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThresholdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thresholds', function (Blueprint $table) {
            $table->timestamps();
            $table->increments('id');
            $table->integer('max_threshold')->nullable(false);
            $table->integer('min_threshold')->nullable(false);

            //Foreign key.
            $table->integer('account_id')->unsigned()->nullable(false);
            $table->integer('warehouse_id')->unsigned()->nullable(false);
            $table->integer('product_id')->unsigned()->nullable(false);

            $table->unique(['account_id','warehouse_id', 'product_id']);

            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
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
        Schema::dropIfExists('thresholds');
    }
}
