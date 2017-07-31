<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarehouseUserPrivilegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouse_user_privileges', function (Blueprint $table) {
            $table->timestamps();
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable(false);
            $table->integer('warehouse_id')->unsigned()->nullable(false);
            $table->integer('warehouse_general_privilege_id')->unsigned()->nullable(false);
            $table->unique(['warehouse_general_privilege_id','user_id', 'warehouse_id'], 'uwp_unique');
            $table->foreign('warehouse_general_privilege_id' )->references('id')->on('warehouse_general_privileges')->onDelete('cascade');
            $table->foreign('user_id' )->references('id')->on('users')->onDelete('cascade');
            $table->foreign('warehouse_id' )->references('id')->on('warehouses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warehouse_user_privileges');
    }
}
