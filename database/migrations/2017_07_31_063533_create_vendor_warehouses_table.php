<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_warehouses', function (Blueprint $table) {
            //Foreign ksy.
            $table->integer('vendor_account_id')->unsigned()->nullable(false); //vendor
            $table->integer('warehouse_id')->unsigned()->nullable(false);

            $table->primary(['vendor_account_id','warehouse_id']);
            $table->foreign('warehouse_id')->references('id')->on('warehouses')->onDelete('cascade');
            $table->foreign('vendor_account_id')->references('id')->on('accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor_warehouses');
    }
}
