<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kits', function (Blueprint $table) {
            $table->timestamps();
            $table->increments('id');
            $table->string('name')->nullable(false);

            //Foreign key.
            $table->integer('warehouse_id')->unsigned()->nullable(false);

            $table->unique(['name','warehouse_id']);

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
        Schema::dropIfExists('kits');
    }
}
