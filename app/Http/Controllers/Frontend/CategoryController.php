<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\General\CollectionHelper;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show(Request $request, Category $category)
    {
        //Все продукты в категории и подкатегориях
        $products = $category->all_products;
        //Фильтрация - Бренд
        $products = $products->when($request['brand'], function ($products) use ($request) {
            return $products->whereIn('brand_id', $request['brand']);
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

        //Фильтрация
        $options = ['color', 'size', 'material', 'direction', 'sex', 'season'];
        foreach ($options as $key => $option) {
            $products = $products->when($request[$option], function ($products) use ($request, $option) {
                return $products->filter(function ($item) use ($request, $option) {
                    return count(array_intersect($item[$option], $request[$option]));
                });
            });
        }
        //Сортировка
        $products = $products->when($request['sort'], function ($products) use ($request) {
            //разделяем товары на те что есть в наличии и тех что нет в наличии
            $productsInStock = $products->filter(fn($product) => $product->quantity > 0);
            $productsNotInStock = $products->filter(fn($product) => $product->quantity == 0);
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
        });
        $products = $products->unless($request['sort'], function ($products) {
            //разделяем товары на те что есть в наличии и тех что нет в наличии
            $productsInStock = $products->filter(fn($product) => $product->quantity > 0);
            $productsNotInStock = $products->filter(fn($product) => $product->quantity == 0);
            $productsInStock = $productsInStock->sortByDesc('created_at');
            $productsNotInStock = $productsNotInStock->sortByDesc('created_at');
            $merged = $productsInStock->merge($productsNotInStock);
            return $merged;
        });
        //Пагинация
        if ($request->has('count') && filter_var($request['count'], FILTER_VALIDATE_INT) == true) {
            $products = CollectionHelper::paginate($products, $request['count'])->withQueryString();
        } else {
            $products =  CollectionHelper::paginate($products, 8)->withQueryString();
        };
        return view('frontend.category', compact('category', 'products'));
    }
}
