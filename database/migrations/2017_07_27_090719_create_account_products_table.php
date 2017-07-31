<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_products', function (Blueprint $table) {
            $table->timestamps();
            $table->increments('id');
            //Foreign key.
            $table->integer('product_id')->unsigned()->nullable(false);
            $table->integer('account_id')->unsigned()->nullable(false);

            $table->unique(['product_id','account_id']);
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('account_products');
    }
}
