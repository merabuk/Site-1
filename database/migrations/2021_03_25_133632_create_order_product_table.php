<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('article'); //код
            $table->string('name'); // название
            $table->float('price'); // цена
            $table->unsignedBigInteger('count');
            //$table->json('attributes')->nullable();
            $table->string('color')->nullable(); // цвет
            $table->string('size')->nullable(); // размер
            $table->string('material')->nullable(); // материал
            $table->string('direction')->nullable(); // направление
            $table->string('sex')->nullable(); // пол
            $table->string('season')->nullable(); // сезонность
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
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
        Schema::dropIfExists('order_product');
    }
}
