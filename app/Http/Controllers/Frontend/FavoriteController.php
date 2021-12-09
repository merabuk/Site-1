<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\General\CollectionHelper;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function index(Request $request)
    {
    	$favorites = Auth()->user()->products()->get();

        //Сортировка
        $favorites = $favorites->when($request['sort'], function ($favorites) use ($request) {
            switch ($request['sort']) {
                case 'pop':
                    return $favorites->sortByDesc('views');
                    break;
                case 'up':
                    return $favorites->sortBy('price');
                    break;
                case 'dwn':
                    return $favorites->sortByDesc('price');
                    break;
                case 'promo':
                    return $favorites->sortBy('on_sale');
                    break;
                default:
                    return $favorites->sortByDesc('created_at');
                    break;
            }
        });
        $favorites = $favorites->unless($request['sort'], function ($favorites) {
            return $favorites->sortByDesc('created_at');
        });

        //Пагинация
        if ($request->has('count') && filter_var($request['count'], FILTER_VALIDATE_INT) == true) {
            $favorites = CollectionHelper::paginate($favorites, $request['count'])->withQueryString();
        } else {
            $favorites = CollectionHelper::paginate($favorites, 8)->withQueryString();
        }

    	return view( 'frontend.product-favorit', compact('favorites') );
    }

    public function addToFavorite(Request $request)
    {
    	$user = Auth()->user();
    	$prodId = $request->input('productId');
    	$favorite_obj = new Favorite();
    	if( $favorite_obj->checkFavorite($prodId, $user->id) === false )
    	{
    		$favorite_obj->addFavorite($prodId, $user->id);
    		return response()->json(['status' => true]);
    	}
    	else
    	{
    		return response()->json(['status' => false]);
    	}
    }

    public function removeToFavorite(Request $request)
    {
    	$user = Auth()->user();
    	$prodId = $request->input('productId');
    	$favorite_obj = new Favorite();
    	if( $favorite_obj->checkFavorite($prodId, $user->id) === true )
    	{
    		$favorite_obj->removeFavorite($prodId, $user->id);
    		return response()->json(['status' => true]);
    	}
    	else
    	{
    		return response()->json(['status' => false]);
    	}
    }
}
