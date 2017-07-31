<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->timestamps();
            $table->rememberToken();
            $table->increments('id');
            $table->string('name')->nullabe(false);
            $table->string('email')->unique()->nullabe(false);
            $table->string('password')->nullabe(false);
            //foreign key
            $table->integer('account_id')->unsigned()->nullabe(false)->default(1); //TODO
            $table->string('personal_image_path')->default('blablabla'); //TODO the path of the default pic
            $table->boolean('enable_notification')->default(true);
            $table->boolean('enable_email')->default(true);

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
        Schema::dropIfExists('users');
    }
}
