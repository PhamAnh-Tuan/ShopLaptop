<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('ord_id');
            $table->string('user_name');
            $table->string('user_address');
            $table->string('user_phone','10');
            $table->string('ord_note');
            $table->string('ord_status');//trạng thái đơn hàng
            $table->string('ord_shipping_status');//trạng thái vận chuyển
            $table->string('ord_payment_status');//trạng thái thanh toán
            $table->integer('ord_total');
            $table->date('ord_date_created');
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
        Schema::dropIfExists('order');
    }
}
