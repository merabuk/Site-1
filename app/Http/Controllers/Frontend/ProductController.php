<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\General\CollectionHelper;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
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

    public function index(Product $product, Request $request)
    {
        $products = $this->getProducts();
        // $products = Product::isActive()->with(['mainImage', 'categories'])->get();
        //Фильтрация
        $products = $this->filterResult($products, $request);
        //Сортировка
        $products = $this->sortResult($products, $request);
        //Пагинация
        $products = $this->paginateResult($products, $request);

        return view('frontend.catalog-product', compact('products'));
    }

    public function show(Product $product, Category $category)
    {
        //Подсчет просмотров товара
        $product->increment('views', 1);

        //для секции рекомендаций на странице товара
        if ($product->categories->first() !== null) {
            $products = $product->categories->first()->products->where('is_active', true)
            ->where('quantity','>', 0)->sortByDesc('created_at')->take(4);
        } else {
            $products = [];
        }

        return view('frontend.card-product', compact('product', 'products'));
    }

    public function showNewProducts(Request $request)
    {
        $products = $this->getProducts();
        $products = $products->filter(function ($product) {
            return $product->is_new == 1;
        });
        // $products = Product::isActive()->isNew()->with('mainImage')->get();
        //Фильтрация
        $products = $this->filterResult($products, $request);
        //Сортировка
        $products = $this->sortResult($products, $request);
        //Пагинация
        $products = $this->paginateResult($products, $request);
        return view('frontend.product-new', compact('products'));
    }

    public function showSaleProducts(Request $request)
    {
        $products = $this->getProducts();
        $products = $products->filter(function ($product) {
            return $product->on_sale == 1;
        });
        // $products = Product::isActive()->isSale()->with('mainImage')->get();
        //Фильтрация
        $products = $this->filterResult($products, $request);
        //Сортировка
        $products = $this->sortResult($products, $request);
        //Пагинация
        $products = $this->paginateResult($products, $request);
        return view('frontend.product-sale', compact('products'));
    }

    public function sortResult($products, $request)
    {
        //разделяем товары на те что есть в наличии и тех что нет в наличии
        $productsInStock = $products->filter(fn($product) => $product->quantity > 0);
        $productsNotInStock = $products->filter(fn($product) => $product->quantity == 0);
        //Сортировка
        if ($request->has('sort')) {
            switch ($request['sort']) {
                case 'pop':
                    $productsInStock = $productsInStock->sortByDesc('views');
                    $productsNotInStock = $productsNotInStock->sortByDesc('views');
                    $merged = $productsInStock->merge($productsNotInStock);
                    return $merged;
                    break;
                case 'up':
                    $productsInStock = $productsInStock->sortBy(fn($product) => $product->getActualPriceByRole());
                    $productsNotInStock = $productsNotInStock->sortBy(fn($product) => $product->getActualPriceByRole());
                    $merged = $productsInStock->merge($productsNotInStock);
                    return $merged;
                    break;
                case 'dwn':
                    $productsInStock = $productsInStock->sortByDesc(fn($product) => $product->getActualPriceByRole());
                    $productsNotInStock = $productsNotInStock->sortByDesc(fn($product) => $product->getActualPriceByRole());
                    $merged = $productsInStock->merge($productsNotInStock);
                    return $merged;
                    break;
                case 'promo':
                    $productsInStock = $productsInStock->sortBy(fn($product) => $product->getActualPriceByRole() == $product->price);
                    $productsNotInStock = $productsNotInStock->sortBy(fn($product) => $product->getActualPriceByRole() == $product->price);
                    $merged = $productsInStock->merge($productsNotInStock);
                    return $merged;
                    break;
                default:
                    $productsInStock = $productsInStock->sortByDesc('created_at');
                    $productsNotInStock = $productsNotInStock->sortByDesc('created_at');
                    $merged = $productsInStock->merge($productsNotInStock);
                    return $merged;
                    break;
            }
        } else {
            $productsInStock = $productsInStock->sortByDesc('created_at');
            $productsNotInStock = $productsNotInStock->sortByDesc('created_at');
            $merged = $productsInStock->merge($productsNotInStock);
            return $merged;
        }
    }

    public function paginateResult($products, $request)
    {
        //Пагинация
        if ($request->has('count') && filter_var($request['count'], FILTER_VALIDATE_INT) == true) {
            return CollectionHelper::paginate($products, $request['count'])->withQueryString();
        } else {
            return CollectionHelper::paginate($products, 8)->withQueryString();
        }
    }

    public function filterResult($products, $request)
    {
        //Фильтрация - Бренд
        $products = $products->when($request['brand'], function ($products) use ($request) {
            return $products->whereIn('brand_id', $request['brand']);
        });
        //Фильтрация - Категория
        $products = $products->when($request['category'], function ($products) use ($request) {
            return $products->filter(function ($product) use ($request) {
                $filtered_categories = $product->categories->filter(function ($category) use ($request) {
                    foreach ($request['category'] as $category_id) {
                        if ($category->id == $category_id){
                            return true;
                        }
                    }
                    return false;
                });
                if (!$filtered_categories->isEmpty()){
                    return true;
                } else {
                    return false;
                }
            });
        });
        //Фильтрация - Цена От
        $products = $products->when($request['price_from'], function ($products) use ($request) {
            return $products->filter(function ($product) use ($request) {
                return $product->getActualPriceByRole() >= $request['price_from'];
            });
        });
        //Фильтрация - Цена До
        $products = $products->when($request['price_until'], function ($products) use ($request) {
            return $products->filter(function ($product) use ($request) {
                return $product->getActualPriceByRole() <= $request['price_until'];
            });
        });

        return $products;
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
