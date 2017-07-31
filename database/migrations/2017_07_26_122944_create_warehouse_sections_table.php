<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarehouseSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouse_sections', function (Blueprint $table) {
            $table->timestamps();
            $table->increments('id');
            $table->integer('number')->nullable();
            $table->string('name')->nullable();
            //Foreign key
            $table->integer('warehouse_id')->unsigned()->nullable(false);
            $table->integer('storing_type_id')->unsigned()->nullable(false);

            $table->foreign('warehouse_id')->references('id')->on('warehouses')->onDelete('cascade');
            $table->foreign('storing_type_id')->references('id')->on('storing_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warehouse_sections');
    }
}
