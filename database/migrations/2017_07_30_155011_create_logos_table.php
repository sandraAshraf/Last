<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logos', function (Blueprint $table) {
            $table->timestamps();
            $table->increments('id');
            $table->string('logo_path')->nullable(false);
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
        Schema::dropIfExists('logos');
    }
}
