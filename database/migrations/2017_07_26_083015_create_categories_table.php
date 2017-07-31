<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->timestamps();
            $table->increments('id');
            $table->string('name')->nullabe(false);
            //Foreign key.
            $table->integer('industry_id')->unsigned()->nullabe(false);
            $table->unique(['name', 'industry_id']);

            $table->foreign('industry_id')->references('id')->on('industries')->onDelete('cascade');

        });

    }
}
