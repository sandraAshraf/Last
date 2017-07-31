<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_customers', function (Blueprint $table) {
            //Foreign ksy.
            $table->integer('vendor_account_id')->unsigned()->nullable(false); //vendor
            $table->integer('customer_account_id')->unsigned()->nullable(false);

            $table->primary(['vendor_account_id','customer_account_id']);
            $table->foreign('customer_account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->foreign('vendor_account_id')->references('id')->on('accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor_customers');
    }
}
