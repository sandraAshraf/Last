<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->timestamps();
            $table->increments('id');
            $table->integer('package_period')->unsigned()->nullabe(false); //per day
            $table->integer('available_accounts')->unsigned()->default(1);
            $table->integer('available_transactions')->unsigned();
            $table->integer('available_warehouses')->unsigned()->default(0);
            $table->unique(['package_period', 'available_accounts', 'available_transactions', 'available_warehouses'], 'p_unique');
            $table->float('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
