<?php

namespace App\Http\Controllers\Frontend\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Helpers\General\CollectionHelper;

class SearchController extends Controller
{
    //Поиск товаров по сайту
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $searched = Product::search($request['question'])->with('mainImage')->take(5)->get();
            if ($searched->isNotEmpty()) {
                return response()->json($searched);
            } else {
                return response('Нічого не знайдено...');
            }
        } else {
            $searched = Product::search($request['question'])->with('mainImage')->get();
            //Сортировка
            $searched = $searched->when($request['sort'], function ($searched) use ($request) {
                switch ($request['sort']) {
                    case 'pop':
                        return $searched->sortByDesc('views');
                        break;
                    case 'up':
                        return $searched->sortBy('price');
                        break;
                    case 'dwn':
                        return $searched->sortByDesc('price');
                        break;
                    case 'promo':
                        return $searched->sortBy('on_sale');
                        break;
                    default:
                        return $searched->sortByDesc('created_at');
                        break;
                }
            });
            $searched = $searched->unless($request['sort'], function ($searched) {
                return $searched->sortBy('created_at');
            });

            //Пагинация
            if ($request->has('count') && filter_var($request['count'], FILTER_VALIDATE_INT) == true) {
                $searched = CollectionHelper::paginate($searched, $request['count'])->withQueryString();
            } else {
                $searched = CollectionHelper::paginate($searched, 8)->withQueryString();
            };
            return view('frontend.search.results', compact('searched'));
        }
    }
}
