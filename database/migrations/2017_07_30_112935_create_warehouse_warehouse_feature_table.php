<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarehouseWarehouseFeatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouse_warehouse_feature', function (Blueprint $table) {
            $table->string('value')->nullable(false);
            //Foreign key.
            $table->integer('warehouse_id')->unsigned()->nullable(false);
            $table->integer('warehouse_feature_id')->unsigned()->nullable(false);

            $table->primary(['warehouse_id','warehouse_feature_id'], 'wwf_primary');

            $table->foreign('warehouse_id')->references('id')->on('warehouses')->onDelete('cascade');
            $table->foreign('warehouse_feature_id')->references('id')->on('warehouse_features')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warehouse_warehouse_feature');
    }
}
