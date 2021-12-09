<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
	// Index function for cart page. Show session products
    public function index(Request $request)
    {
        $user = null;
        if (Auth::check()) {
            $user = Auth::user();
        }
        $product_list = $this->updateCart($request);
        $products_items = null;
        if (isset($product_list)) {
            $products_items = $product_list;
        } else {
            $products_items = array();
        }
        $products_items = collect($products_items);
        //для секции разпродаж на странице корзины
        $products = Product::isActive()->inStock()->isSale()->with('mainImage')->get()->sortByDesc('created_at')->take(4);

        return view('frontend.cart', compact('products_items', 'user', 'products'));
    }

    // Add product to cart
    public function addToCart(Request $request, $needUnserialize = true)
    {
        $prod_count = null;
        // проверка и получение id товара
        if ($request['productId']) {
            $product_id = $request['productId'];
        } else {
            return response()->json(['result' => false]);
        };
        // проверка и получение атрибутов товара
        if ($request['productAttr']) {
            if ($needUnserialize) {
                $product_attr = $this->getAttributes($request['productAttr']);
            } else {
                $product_attr = $request['productAttr'];
            };
        } else {
            return response()->json(['result' => false]);
        };
        //получение корзины пользователя
        $cart_session = $this->updateCart($request);
        //поиск активного товара по полученному id
        $product = Product::isActive()->inStock()->where('id', $product_id)->with('mainImage')->first();
        //если товар был не найден
        if (empty($product)) {
            return response()->json(['result' => false]);
        };
        //добавляем актуальную цену к товару из функции
        if (Auth::check()){
            $product['actual_price_by_role'] = $product->getActualPriceByRole(Auth::id());
        } else {
            $product['actual_price_by_role'] = $product->getActualPriceByRole();
        };
        $product_id = $product->id;
        //Если корзина еще небыла создана или пуста
        if(!$cart_session) {
            //проверка атрибутов на актуальность
            $checkedAttr = $this->checkAttributes($product, $product_attr);
            if ($checkedAttr) {
                $cart_products_attr = [];
                $prod_count = $product_attr['count'];
                array_push ($cart_products_attr, $product_attr);
                $cart_session = [
                    $product_id => [
                        'product' => $product,
                        'attributes' => $cart_products_attr,
                    ],
                ];
                $request->session()->put('user_cart', $cart_session);
            };
        //Если товар присутствует в корзине с выбранным id
        } elseif (isset($cart_session[$product_id])) {
            //флажек идентичности атрибутов
            $it_same = false;
            //проверка атрибутов на актуальность
            $checkedAttr = $this->checkAttributes($product, $product_attr);
            if ($checkedAttr) {
                //пребираем атрибуты выбранных товаров в корзине
                foreach ($cart_session[$product_id]['attributes'] as $key => $value) {
                    $diff = array_diff($product_attr, $value);
                    //если нашелся товар с теми же атрибутами, но отличается только количество
                    if (count($diff) == 0 || count($diff) == 1 && array_key_exists ('count', $diff)) {
                        $prod_count = $value['count'] + $product_attr['count'];
                        $cart_session[$product_id]['attributes'][$key]['count'] = $prod_count;
                        $it_same = true;
                    };
                };
            };
            //если атрибуты товара не совпали с теми что есть в корзине
            if (!$it_same){
                array_push ($cart_session[$product_id]['attributes'], $product_attr);
                $prod_count = $product_attr['count'];
            };
            $request->session()->put('user_cart', $cart_session);
        //если такого товара нет в корзине
        } else {
            //проверка атрибутов на актуальность
            $checkedAttr = $this->checkAttributes($product, $product_attr);
            if ($checkedAttr) {
                $cart_products_attr = [];
                $prod_count = $product_attr['count'];
                array_push ($cart_products_attr, $product_attr);
                $cart_session[$product_id] = [
                        'product' => $product,
                        'attributes' => $cart_products_attr,
                    ];
                $request->session()->put('user_cart', $cart_session);
            };
        };
        // Return Axios Session cart
        $cart = $request->session()->get('user_cart');
        return response()->json(['cart' => $cart, 'count' => $prod_count]);
    }

    // Get and rebuild attributes for product
    public function getAttributes($attr)
    {
        $new_attr = array();
        if (isset($attr)) {
            foreach ($attr as $key => $value) {
               $new_attr[$value['name']] = $value['value'];
            };
            return $new_attr;
        };
    }

    // Remove product in cart
    public function removeCart(Request $request)
    {
        // проверка и получение товара
        if ($request['product']) {
            $product = $request['product'];
        } else {
            return response()->json(['result' => false]);
        };
        // проверка и получение атрибутов товара
        if ($request['attributes']) {
            $attributes = $request['attributes'];
        } else {
            return response()->json(['result' => false]);
        };
        //получаем корзину
        $user_cart = $request->session()->get('user_cart');
        //пишем id товара
        $product_id = $product['id'];
        if(isset($user_cart[$product_id])) {
            foreach ($user_cart[$product_id]['attributes'] as $key => $value) {
                $diff = array_diff($attributes, $value);
                if (count($diff) == 0 || count($diff) == 1 && array_key_exists ('count', $diff)) {
                    unset($user_cart[$product_id]['attributes'][$key]);
                };
            };
            if (count($user_cart[$product_id]['attributes']) == 0) {
                unset($user_cart[$product_id]);
            };
            $request->session()->forget('user_cart');
            $request->session()->put('user_cart', $user_cart);
            return response()->json(['result' => true]);
        };
        return response()->json(['result' => false]);
    }

    // Return new data to session user_cart
    public function updateCart(Request $request)
    {
        //получаем корзину из сессии
        $productsInCart = $request->session()->get('user_cart');
        if (isset($productsInCart)) {
            //удаляем корзину в сессии
            $request->session()->forget('user_cart');
            //получаем id товаров
            $productsIds = collect($productsInCart)->keys()->toArray();
            //ишем товары по полученным id
            $productsCollection = Product::isActive()->inStock()->whereIn('id', $productsIds)->with('mainImage')->get();
            //если коллекция товаров не пуста
            if ($productsCollection->isNotEmpty()) {
                foreach ($productsCollection as $product) {
                    //добавляем поле актуальной цены
                    if (Auth::check()) {
                        $product['actual_price_by_role'] = $product->getActualPriceByRole(auth()->user()->id);
                    } else {
                        $product['actual_price_by_role'] = $product->getActualPriceByRole();
                    };
                    //проверка атрибутов на актуальность
                    foreach ($productsInCart[$product->id]['attributes'] as $key => $value) {
                        $checkedAttr = $this->checkAttributes($product, $value);
                        //если не совпало удаляем из массива
                        if (!$checkedAttr) {
                            array_splice($productsInCart[$product->id]['attributes'], $key++, 1);
                        };
                    };
                    if (count($productsInCart[$product->id]['attributes']) > 0) {
                        $item[$product->id] = [
                            'product' => $product,
                            'attributes' => $productsInCart[$product->id]['attributes'],
                        ];
                        $request->session()->put('user_cart', $item);
                    };
                };
            };
            return $request->session()->get('user_cart');
        };
        return $productsInCart;
    }

    // Update count product in cart
    public function updateCount(Request $request)
    {
        // проверка и получение товара
        if ($request['product']) {
            $product = $request['product'];
        } else {
            return response()->json(['result' => false]);
        };
        // проверка и получение атрибутов товара
        if ($request['attributes']) {
            if ($request['serialize']) {
                //если пришло со страницы заказа товара
                $attributes = $this->getAttributes($request['attributes']);
            } else {
                //если пришло со страницы корзины
                $attributes = $request['attributes'];
            };
        } else {
            return response()->json(['result' => false]);
        };
        // проверка и получение количества товара
        if ($request['product_count']) {
            $product_count = $request['product_count'];
        } else {
            return response()->json(['result' => false]);
        };
        //получаем корзину
        $user_cart = $request->session()->get('user_cart');
        //пишем id товара
        $product_id = $product['id'];
        if(isset($user_cart[$product_id])) {
            foreach ($user_cart[$product_id]['attributes'] as $key => $value) {
                $diff = array_diff($attributes, $value);
                if (count($diff) == 0 || count($diff) == 1 && array_key_exists ('count', $diff)) {
                    $user_cart[$product_id]['attributes'][$key]['count'] = $product_count;
                };
            };
            $request->session()->put('user_cart', $user_cart);
            return response()->json(['result' => true]);
        };
        return response()->json(['result' => false]);
    }

    // Function return total count and total price cart
    public function cartTotal(Request $request)
    {
        $user_cart = $request->session()->get('user_cart');
        $responce = $this->getTotalPrice($user_cart);
        return response()->json($responce);
    }

    //просчет обчего количества товара в корзине и общей цены
    public function getTotalPrice($user_cart) {
        $all_count = 0;
        $all_price = 0;

       if (isset($user_cart)) {
            foreach($user_cart as $key => $item) {
                foreach ($item['attributes'] as $key => $value) {
                    $all_count = $all_count + $value['count'];
                    if ($value['count'] > 1) {
                        $all_price = $all_price + ($item['product']->actual_price_by_role * $value['count']);
                    } else {
                        $all_price = $all_price + $item['product']->actual_price_by_role;
                    }
                }
            }
            $all_price = round($all_price, 2);
        }
        return ['count' => $all_count, 'cost' => $all_price];
    }

    // Clear cart user
    public function clearCart(Request $request, $redirect = true)
    {
        if ($request->session()->has('user_cart')) {
            $request->session()->forget('user_cart');
            if (Auth::check()) {
                if (isset(Auth::user()->cart->user_cart)) {
                    Auth::user()->cart->update([
                        'user_cart' => null,
                    ]);
                };
            };
        };
        if ($redirect) {
            redirect()->route('cart')->send();
        };
    }

    //проверка атрибутов на актуальность
    public function checkAttributes($product, $product_attr)
    {
        $allOk = true;
        $attr = ['color', 'size', 'material', 'direction', 'sex', 'season'];
        foreach ($attr as $key => $value) {
            if (count($product[$value]) > 0) {
                if (!isset($product_attr[$value]) && !in_array($product_attr[$value], $product[$value])) {
                    $allOk = false;
                };
            };
        };
        return $allOk;
    }
}
