<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filters', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); //имя фильтра
            $table->boolean('is_active')->default(false); // активность
            $table->json('brand')->nullable(); // значения фильтра по брендам
            $table->float('price_from')->nullable(); // значения фильтра минимальная цена
            $table->float('price_until')->nullable(); // значения фильтра максимальная цена
            $table->json('color')->nullable(); // значения фильтра по цветам
            $table->json('size')->nullable(); // значения фильтра по размеру
            $table->json('material')->nullable(); // значения фильтра по материалу
            $table->json('direction')->nullable(); // значения фильтра по направлению
            $table->json('sex')->nullable(); // значения фильтра по полу
            $table->json('season')->nullable(); // значения фильтра по сезонности
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
        Schema::dropIfExists('filters');
    }
}
