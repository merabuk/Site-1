<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderOneclickProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_oneclick_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_oneclick_id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('count');
            $table->string('color')->nullable(); // цвет
            $table->string('size')->nullable(); // размер
            $table->string('material')->nullable(); // материал
            $table->string('direction')->nullable(); // направление
            $table->string('sex')->nullable(); // пол
            $table->string('season')->nullable(); // сезонность
            $table->timestamps();

            $table->foreign('order_oneclick_id')->references('id')->on('order_oneclicks')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_oneclick_products');
    }
}
