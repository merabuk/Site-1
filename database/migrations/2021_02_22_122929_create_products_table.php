<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('article', 50)->unique(); //код
            $table->string('name'); // название
            $table->text('details')->nullable(); // описание
            $table->string('keywords', 150)->nullable(); // ключевые слова СЕО
            $table->text('description', 250)->nullable(); // дескрипшен СЕО
            $table->float('price'); // цена
            $table->float('dealer_price'); // цена для диллеров
            $table->integer('discount')->nullable(); // скидка
            $table->timestamp('discount_from')->nullable(); // дата начала скидки
            $table->timestamp('discount_until')->nullable(); // дата окончания скидки
            $table->float('promotion_price')->nullable(); // акционная цена
            $table->timestamp('promotion_from')->nullable(); // дата начала акции
            $table->timestamp('promotion_until')->nullable(); // дата окончания акции
            $table->boolean('is_new')->nullable(); // новинка
            $table->boolean('on_sale')->nullable(); // на распродаже
            $table->unsignedInteger('quantity')->default(0); // количество на складе
            $table->json('color')->nullable(); // цвет
            $table->json('size')->nullable(); // размер
            $table->json('material')->nullable(); // материал
            $table->json('direction')->nullable(); // направление
            $table->json('sex')->nullable(); // пол
            $table->json('season')->nullable(); // сезонность
            $table->integer('length')->nullable(); // длина
            $table->integer('width')->nullable(); // ширина
            $table->integer('height')->nullable(); // высота
            $table->smallInteger('dim_unit')->nullable(); //единица измерения габаритов
            $table->integer('weight')->nullable(); // масса
            $table->smallInteger('weight_unit')->nullable(); //единица измерения массы
            $table->boolean('is_active')->default(false); // активность
            $table->unsignedBigInteger('views')->default(0); //количество просмотров
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null'); //бренд
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
        Schema::dropIfExists('products');
    }
}
