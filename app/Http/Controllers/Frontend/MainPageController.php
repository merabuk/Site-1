<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Helpers\General\CollectionHelper;
use Illuminate\Support\Facades\Cache;

class MainPageController extends Controller
{
    private $liveInCache = 900;

    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->getProducts();
    }

    public function index()
    {
        $products = $this->getProducts();
        $products = $products->filter(fn($product) => $product->quantity > 0);
        // $products = Product::isActive()->inStock()->with(['categories', 'mainImage'])->get();
        //среднее значение просмотров товаров (для топа продаж)
        $avg = $products->avg('views');

        // $category1 = Category::where('slug', 'kurtki')->first();

        //для категории Куртки
        $slug1 = 'kurtki';
        $productsNewCategory1 = $this->getProductsNew($products, $slug1);
        $productsTopCategory1 = $this->getProductsTop($products, $slug1, $avg);
        $productsSaleCategory1 = $this->getProductsSale($products, $slug1);

        //для категории Обубь
        $slug2 = 'vzuttya';
        $productsNewCategory2 = $this->getProductsNew($products, $slug2);
        $productsTopCategory2 = $this->getProductsTop($products, $slug2, $avg);
        $productsSaleCategory2 = $this->getProductsSale($products, $slug2);

        //для категории Перчатки
        $slug3 = 'percatki';
        $productsNewCategory3 = $this->getProductsNew($products, $slug3);
        $productsTopCategory3 = $this->getProductsTop($products, $slug3, $avg);
        $productsSaleCategory3 = $this->getProductsSale($products, $slug3);

        //для банера скидок
        $productsMaxDiscount = $products->where('discount', true)->filter(function ($product) {
            if ($product->actual_discount){
                return true;
            } else {
                return false;
            }
        })->sortByDesc('updated_at')->take(10);

        //шлемы заказчика
        $productsSaleCategory4 = $products->whereIn('article', ['H3300EAKK', 'HE3312EAYK', 'H3314EKOS'])->sortByDesc('updated_at');

        // dd($productsSaleCategory3, $productsSaleCategory2, $productsSaleCategory1);

        return view('frontend.main', compact('productsNewCategory1', 'productsTopCategory1', 'productsSaleCategory1',
                                                'productsNewCategory2', 'productsTopCategory2', 'productsSaleCategory2',
                                                'productsNewCategory3', 'productsTopCategory3', 'productsSaleCategory3',
                                                'slug1', 'slug2', 'slug3', 'productsMaxDiscount', 'productsSaleCategory4'));
    }

    //получение коллекции топа продаж
    public function getProductsTop ($products, $slug, $avg)
    {
        return $products->where('views', '>', $avg)->filter(function ($product) use ($slug) {
            $result = $product->categories->filter(function ($category) use ($slug) {
                return $category->slug == $slug;
            });
            if (!$result->isEmpty()){
                return true;
            } else {
                return false;
            }
        })->sortByDesc('views')->take(7);
    }

    //получение коллекции новинок
    public function getProductsNew ($products, $slug)
    {
        return $products->where('is_new', true)->filter(function ($product) use ($slug) {
            $result = $product->categories->filter(function ($category) use ($slug) {
                return $category->slug == $slug;
            });
            if (!$result->isEmpty()){
                return true;
            } else {
                return false;
            }
        })->sortByDesc('updated_at')->take(3);
    }

    //получение коллекции распродаж
    public function getProductsSale ($products, $slug)
    {
        return $products->where('on_sale', true)->filter(function ($product) use ($slug) {
            $result = $product->categories->filter(function ($category) use ($slug) {
                return $category->slug == $slug;
            });
            if (!$result->isEmpty()){
                return true;
            } else {
                return false;
            }
        })->sortByDesc('updated_at')->take(6);
    }

    public function getProducts()
    {
        if(Cache::has('products')) {
            $products = cache('products');
        } else {
            $products = Product::isActive()->with(['mainImage', 'categories'])->get();
            Cache::put('products', $products, $this->liveInCache);
        }
        return $products;
    }
}
