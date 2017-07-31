<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountProductProductFeature extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //TODO....
        // to insert values in the pivot table that is how:
        // $ac->productFeature()->attach(1 , ['value' =>'varchar', 'is_in_report' => true])
        Schema::create('account_product_product_feature', function (Blueprint $table) {
            $table->string('value');
            $table->boolean('is_in_report');

            //Foreign key.
            $table->integer('account_product_id')->unsigned()->nullable(false);
            $table->integer('product_feature_id')->unsigned()->nullable(false);
            //we gave it a name because of the error (too long identifier)
            $table->unique(['account_product_id','product_feature_id'], 'ap_pf_unique');

            $table->foreign('account_product_id')->references('id')->on('account_products')->onDelete('cascade');
            $table->foreign('product_feature_id')->references('id')->on('product_features')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_product_product_feature');
    }
}
