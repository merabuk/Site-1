<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Image;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Product $product) {
            $imgArr = ['products/product-1.png', 'products/product-1.png', 'products/product-1.png', 'products/product-1.png'];
            foreach ($imgArr as $key => $value) {
                $image = new Image();
                $image->imageable_type = get_class($product);
                $image->imageable_id = $product->id;
                $pathToFile = Storage::disk('seeders')->path($value);
                $hashPath = Storage::disk('public')->putFile('/images/products', new File($pathToFile));
                $image->path = $hashPath;
                if ($key == 0) {
                    //Картинка товара Главная
                    $image->is_main = true;
                } else {
                    $image->is_main = false;
                    $image->order = $key;
                }
                $image->save();
            }
            $video = new Video();
            $video->videoable_type = get_class($product);
            $video->videoable_id = $product->id;
            $video->name = 'Про куртку';
            $video->src = 'https://www.youtube.com/embed/BFhY_fDj1TI';
            $video->order = 0;
            $video->save();
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $productNumber = 1;
        $productName = 'Товар '.$productNumber++;
        $price = $this->faker->numberBetween(100, 5000);
        return [
            'article' => $this->faker->unique()->randomNumber(6),
            'name' => $productName,
            'details' => $this->faker->realText(200),
            'price' => $price,
            'dealer_price' => $price*0.8,
            'quantity' => $this->faker->randomNumber(2),
            'length' => $this->faker->randomNumber(2),
            'width' => $this->faker->randomNumber(2),
            'height' => $this->faker->randomNumber(2),
            'weight' => $this->faker->randomNumber(2),
            'is_active' => true,
            'brand_id' => $this->faker->numberBetween(1,26),
            'dim_unit' => 'мм',
            'weight_unit' => 'г',
            'views' => $this->faker->numberBetween(1,1000),
            'color' => $this->faker->randomElements(['Білий', 'Чорний', 'Зелений', 'Червоний', 'Жовтий', 'Чорно-білий', 'Блакитний', 'Біло-жовтий', 'Червоно-синій'], 4),
            'size' => $this->faker->randomElements(['32', '34', '36', '38', '40', '42', '44', '46', '48', '50', '52', '54', '56', '58'], 8),
            'material' => $this->faker->randomElements(['Шкіра', 'Пластик', 'Кевлар', 'Резина', 'Алюміній', 'Сталь', 'Титан', 'Скло', 'Штучна шкіра'], 4),
            'direction' => $this->faker->randomElements(['Спорт', 'Місто', 'Хоббі', 'Розважальне', 'Каскадерське', 'Святкове'], 2),
            'sex' => ['Чоловіча', 'Жіноча', 'Унісекс'],
            'season'=> $this->faker->randomElements(['Весна', 'Літо', 'Осінь', 'Зима', 'Всесезонний'], 2),
        ];
    }
}
