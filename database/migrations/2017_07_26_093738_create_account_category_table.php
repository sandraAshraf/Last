<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_category', function (Blueprint $table) {
            $table->integer('category_id')->unsigned()->index()->nullable(false);
            $table->integer('account_id')->unsigned()->index()->nullable(false);
            $table->primary(['category_id', 'account_id']);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('account_category');
    }
}
