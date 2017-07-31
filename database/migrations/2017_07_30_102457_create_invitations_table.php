<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitations', function (Blueprint $table) {
            $table->timestamps();
            $table->increments('id');
            //Foreign key.
            $table->integer('account_id')->unsigned()->nullable(false);
            $table->integer('invited_account_id')->unsigned()->nullable(false);
            $table->integer('reward_id')->unsigned()->nullable(false);

            $table->unique(['account_id','invited_account_id']);

            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->foreign('invited_account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->foreign('reward_id')->references('id')->on('rewards')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invitations');
    }
}
