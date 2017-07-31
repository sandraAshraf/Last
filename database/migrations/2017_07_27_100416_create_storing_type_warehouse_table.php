<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoringTypeWarehouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storing_type_warehouse', function (Blueprint $table) {
            //Foreign key.
            $table->integer('storing_type_id')->unsigned()->nullable(false);
            $table->integer('warehouse_id')->unsigned()->nullable(false);
            $table->unique(['storing_type_id','warehouse_id']);

            $table->foreign('storing_type_id')->references('id')->on('storing_types')->onDelete('cascade');
            $table->foreign('warehouse_id')->references('id')->on('warehouses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('storing_type_warehouse');
    }
}
