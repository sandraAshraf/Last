<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPrivilegeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //pivot table
        Schema::create('user_privilege', function (Blueprint $table) {
            //Foreign key.
            $table->integer('user_general_privilege_id')->unsigned()->nullable(false);
            $table->integer('user_id')->unsigned()->nullable(false);
            $table->unique(['user_general_privilege_id','user_id']);

            $table->foreign('user_general_privilege_id' )->references('id')->on('user_general_privileges')->onDelete('cascade');
            $table->foreign('user_id' )->references('id')->on('users')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_privilege');
    }
}
