<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Category;
use Faker\Generator as Faker;

class MainPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $date1 = Carbon::today()->subDay();
        $date2 = Carbon::today()->addDays(20);
        $categoriesSlugs = ['kurtki', 'vzuttya', 'percatki'];
        $products = Category::with('products')->whereIn('slug', $categoriesSlugs)->get()->pluck('products')->flatten();
        foreach ($products as $product) {
            if (($product->id % 2) == 0 || $product->id == 33 || $product->id == 111) {
                $product->discount = $faker->numberBetween(1, 99);
                $product->discount_from = $date1;
                $product->discount_until = $date2;
                $product->on_sale = 1;
            };
            if (($product->id % 2) != 0 || $product->id == 22) {
                $product->promotion_price = round(($product->price * $faker->randomFloat(NULL, 0.5, 0.9)), 2);
                $product->promotion_from = $date1;
                $product->promotion_until = $date2;
                $product->is_new = 1;
            };
            $product->save();
        }
    }
}
