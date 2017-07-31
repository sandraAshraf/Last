<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouses', function (Blueprint $table) {
            $table->timestamps();
            $table->increments('id');
            $table->string('name')->nullable(false);
            $table->float('length')->unsigned();
            $table->float('width')->unsigned();
            $table->float('height')->unsigned();
            $table->float('latitude', 9, 6);
            $table->float('longitude', 9, 6);
            //Foreign key.
            $table->integer('account_id')->unsigned()->nullable(false);

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
        Schema::dropIfExists('warehouses');
    }
}
