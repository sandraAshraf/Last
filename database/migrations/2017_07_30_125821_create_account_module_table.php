<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountModuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_module', function (Blueprint $table) {
            $table->integer('account_id')->unsigned()->nullable(false);
            $table->integer('module_id')->unsigned()->nullable(false);

            $table->unique(['account_id','module_id']);

            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_module');
    }
}
