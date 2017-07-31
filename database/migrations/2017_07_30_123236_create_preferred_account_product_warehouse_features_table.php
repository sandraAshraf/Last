<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreferredAccountProductWarehouseFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preferred_account_product_warehouse_features', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->unsigned()->nullable(false);
            $table->integer('product_id')->unsigned()->nullable(false);
            $table->integer('warehouse_feature_id')->unsigned()->nullable(false);

            $table->unique(['account_id','product_id', 'warehouse_feature_id'], 'apw_unique');

            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('warehouse_feature_id', 'papwf_foreign')->references('id')->on('warehouse_features')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preferred_account_product_warehouse_features');
    }
}
