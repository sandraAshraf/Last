<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemWarehouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_warehouse', function (Blueprint $table) {
            $table->integer('item_id')->unsigned()->nullable(false);
            $table->integer('warehouse_id')->unsigned()->nullable(false);
            //the account that own the warehouse
            $table->integer('account_id')->unsigned()->nullable(false);

            $table->unique(['item_id','warehouse_id', 'account_id']);

            $table->foreign('item_id' )->references('id')->on('items')->onDelete('cascade');
            $table->foreign('warehouse_id' )->references('id')->on('warehouses')->onDelete('cascade');
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_warehouse');
    }
}
