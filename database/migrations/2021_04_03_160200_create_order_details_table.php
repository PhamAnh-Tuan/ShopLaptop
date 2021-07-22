<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            //$table->increments('order_details_id');
            // $table->string('ord_id', 32)->references('ord_id')->on('order')->onDelete('cascade')->onUpdate('cascade');
            // $table->string('ord_id')->unsigned();
            // $table->foreign('ord_id')->references('ord_id')->on('order')->onDelete('cascade')->onUpdate('cascade');
            // $table->engine = 'InnoDB';
            $table->increments('order_details_id');
            $table->unsignedInteger('ord_id');
            $table->foreign('ord_id')->references('ord_id')->on('order')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('prd_id')->unsigned();
            $table->foreign('prd_id')->references('prd_id')->on('product')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('quantily');
            $table->timestamps();
        });
        // Schema::table('order_details', function (Blueprint $table) {
        //     // $table->foreign('order_details_id')->references('order_details')->on('order_details')->onDelete('cascade');
        //     $table->foreign('ord_id')->references('ord_id')->on('order')->onDelete('cascade');
        //   });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
