<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Helpers\General\CollectionHelper;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $currentBrand = $request['brand'];
        $brands = Brand::isActive()->brandByOrder()->with('mainImage', 'products')->get();
        //товары для рекомендаций
        $products = $brands->pluck('products')->flatten()->where('is_active', true)->where('quantity','!=', 0)->shuffle()->take(8);

        if($currentBrand) {
            return view('frontend.product-brands', compact('brands', 'currentBrand', 'products'));
        } else {
            $currentBrand = $brands->first()->slug;
            return view('frontend.product-brands', compact('brands', 'currentBrand', 'products'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Brand $brand)
    {
        $products = $brand->products->where('is_active', true)->load('mainImage');
        //Фильтрация
        $products = $this->filterResult($products, $request);
        //Сортировка
        $products = $this->sortResult($products, $request);
        //Пагинация
        $products = $this->paginateResult($products, $request);

        return view('frontend.brand', compact('brand', 'products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function showApi(Request $request)
    {
        $slug = $request->slug;
        if (!$slug) {
            $brand_order = Brand::isActive()->minOrderBrand();
            $slug = Brand::where('brand_order', $brand_order)->first()->slug;
        }
        $curentBrand = Brand::where('slug', $slug)->with('addedImages', 'videos', 'products')->first();
        if ($curentBrand) {
            return $curentBrand;
        } else {
            return response()->json([
                'status' => 'Fail',
            ], 404);
        }

    }

    public function sortResult($products, $request)
    {
        //Сортировка
        if ($request->has('sort')) {
            switch ($request['sort']) {
                case 'pop':
                    return $products->sortByDesc('views');
                    break;
                case 'up':
                    return $products->sortBy('price');
                    break;
                case 'dwn':
                    return $products->sortByDesc('price');
                    break;
                case 'promo':
                    return $products->sortBy('on_sale');
                    break;
                default:
                    return $products->sortByDesc('created_at');
                    break;
            }
        } else {
            return $products->sortByDesc('created_at');
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
        // //Фильтрация - Бренд
        // $products = $products->when($request['brand'], function ($products) use ($request) {
        //     return $products->whereIn('brand_id', $request['brand']);
        // });
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
}
