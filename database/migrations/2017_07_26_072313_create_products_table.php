<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('products', function (Blueprint $table) {
            $table->timestamps();
            $table->increments('id');
            $table->string('name')->nullable(false);
            $table->text('description')->nullable();
            $table->string('SKU')->nullable(false); //TODO add the path of the SKU pic
            //foreign key
            $table->integer('account_id')->unsigned();
            //to confirm must scan the item to compare if it is the right item
            // or not and repeat the same process for all items on the order list
            $table->boolean('must_scan')->default(false);

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
        Schema::dropIfExists('products');
    }
}
