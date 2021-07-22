<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_product', function (Blueprint $table) {
            $table->increments('cat_id');
            $table->integer('brd_id')->unsigned();
            $table->foreign('brd_id')->references('brd_id')->on('brand')->onUpdate('cascade')->onDelete('cascade');
            $table->string('cat_name')->unique();
            $table->text('cat_description');
            $table->integer('cat_parent_id');
            $table->integer('cat_status');

            $table->string('cat_slug','255')->nullable();
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
        Schema::dropIfExists('category_product');
    }
}
