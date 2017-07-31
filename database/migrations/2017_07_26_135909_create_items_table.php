<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->timestamps();
            $table->increments('id');
            $table->integer('serial_number')->nullable(false); //TODO add the path of the seial pic
            $table->text('description')->nullable();

            $table->float('location_x')->unsigned()->nullable(false);//set by system
            $table->float('location_y')->unsigned()->nullable(false);//set by system
            $table->float('location_z')->unsigned()->nullable(false);//set by system

            $table->float('width')->unsigned()->nullable(false);//set by user
            $table->float('height')->unsigned()->nullable(false);//set by user
            $table->float('length')->unsigned()->nullable(false);//set by user

            $table->dateTime('arrival_date');
            //Foreign key
            $table->integer('account_id')->unsigned()->nullable(false);
            $table->integer('location_id')->unsigned()->nullable(false);//set by system

            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
