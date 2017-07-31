<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->timestamps();
            $table->increments('id');
            $table->string('location_label')->nullable(false);
            $table->float('location_x')->unsigned()->nullable();
            $table->float('location_y')->unsigned()->nullable();
            $table->float('location_z')->unsigned()->nullable();
            $table->float('width')->unsigned()->nullable(false);
            $table->float('height')->unsigned()->nullable(false);
            $table->float('length')->unsigned()->nullable(false);
            //Foreign key
            $table->integer('warehouse_id')->unsigned()->nullable(false);
            $table->integer('warehouse_section_id')->unsigned()->nullable(false);
            $table->integer('storing_type_id')->unsigned()->nullable(false);

            $table->unique('warehouse_id', 'location_label');
            $table->foreign('warehouse_id')->references('id')->on('warehouses')->onDelete('cascade');
            $table->foreign('warehouse_section_id')->references('id')->on('warehouse_sections')->onDelete('cascade');
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
        Schema::dropIfExists('locations');
    }
}
