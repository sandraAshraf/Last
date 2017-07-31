<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountIndustryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_industry', function (Blueprint $table) {
            $table->integer('industry_id')->unsigned()->index()->nullable(false);
            $table->integer('account_id')->unsigned()->index()->nullable(false);
            $table->primary(['industry_id', 'account_id']);
            $table->foreign('industry_id')->references('id')->on('industries')->onDelete('cascade');
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
        Schema::dropIfExists('account_industry');
    }
}
