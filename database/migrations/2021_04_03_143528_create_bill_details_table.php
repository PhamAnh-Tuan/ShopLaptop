<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_details', function (Blueprint $table) {
            $table->increments('billdetails_id');
            $table->integer('bill_id')->unsigned();
            $table->foreign('bill_id')->references('bill_id')->on('bill')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('prd_id')->unsigned();
            $table->foreign('prd_id')->references('prd_id')->on('product')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('billdetails_quantily');
            $table->integer('billdetails_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_details');
    }
}
