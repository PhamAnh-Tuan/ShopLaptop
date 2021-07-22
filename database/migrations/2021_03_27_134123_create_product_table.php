<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('prd_id');
            $table->integer('cat_id')->unsigned();
            $table->foreign('cat_id')->references('cat_id')->on('category_product')->onDelete('cascade')->onUpdate('cascade');
            $table->string('prd_name');
            $table->string('prd_img', '255'); //ảnh
            $table->string('prd_cpu')->nullable();
            $table->string('prd_operating')->nullable(); //hệ điều hành
            $table->string('prd_ram');
            $table->string('prd_gpu')->nullable();
            $table->string('prd_monitor'); //màn hình
            $table->string('prd_ssd');
            $table->string('prd_hdd')->nullable();
            $table->string('prd_optical')->nullable(); //ổ đĩa quang
            $table->string('prd_lan')->nullable();
            $table->string('prd_wireless_lan');
            $table->string('prd_ports')->nullable(); //các cổng kết nối
            $table->string('prd_keyboard'); //bàn phím
            $table->string('prd_battery')->nullable(); //pin
            $table->string('prd_weight'); //trọng lượng
            $table->integer('prd_number');
            $table->integer('prd_price');
            //
            $table->string('prd_slug','255')->nullable();
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
        Schema::dropIfExists('product');
    }
}
