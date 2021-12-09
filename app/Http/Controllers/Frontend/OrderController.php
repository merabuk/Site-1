<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Pivot\OrderProduct;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Frontend\StoreOrderRequest;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Auth\RegisterController;
use App\Notifications\OrderCreated;

class OrderController extends Controller
{
    // Create order and order product
    public function store(StoreOrderRequest $request)
    {
        $validator = $request->validated();
        $cart_class = new CartController();
    	$cart = $cart_class->updateCart($request);
        if (!isset($cart)) {
            return response()->json(['status' => 'fail']);
        };
        $cartTotal = $cart_class->getTotalPrice($cart);
        $user_id = null;
        $order_id = null;
        $order = null;

    	if (Auth::check()) {
    		$user = Auth::user();
    	} elseif (!isset($validator['is_guest'])) {
            $register = new RegisterController();
            $request->request->add(['surname' => $validator['surname']]);
            $request->request->add(['name' => $validator['name']]);
            $request->request->add(['patronymic' => $validator['patronymic']]);
            $request->request->add(['email' => $validator['email']]);
            $request->request->add(['phone' => $validator['phone']]);
            $request->request->add(['password' => $validator['password']]);
            $request->request->add(['password_confirmation' => $validator['password_confirmation']]);
    		$register->registerUser($request);
            if (Auth::check()) {
                $user = Auth::user();
            }
        }

        if ($cartTotal['count'] != 0) {
            $user_id = $user->id;
            $order = $this->addOrder($validator, $cartTotal, $user_id);
            $order_id = $order->id;
            $this->addOrderProducts($cart, $order_id);
            //email notify for order
            if (Auth::check()) {
                $user->notify(new OrderCreated($order));
            } else {
                $order->notify(new OrderCreated($order));
            }

            $cart_class->clearCart($request, false);

    	    return response()->json(['status' => 'done', 'order_id' => $order_id]);
        } else {
            return response()->json(['status' => 'fail']);
        }
    }

    // Add order and return order model
    public function addOrder($validator, $cartTotal, $user_id = null)
    {
        if (isset($user_id)) {
            $order = Order::create([
                'total_count' => $cartTotal['count'],
                'total_price' => $cartTotal['cost'],
                'user_id' => $user_id,
                'city' => $validator['city'],
                'address' => $validator['address'],
                'comment' => $validator['comment'],
                'pikup' => $validator['pikup'],
                'manager_id' => (auth()->user()->hasRole('dealer') && isset(auth()->user()->manager_id))
                                ? auth()->user()->manager_id
                                : null,
                'status_id' => 1,
            ]);
        } else {
            $order = Order::create([
                'total_count' => $cartTotal['count'],
                'total_price' => $cartTotal['cost'],
                'user_id' => $user_id,
                'surname' => $validator['surname'],
                'name' => $validator['name'],
                'patronymic' => $validator['patronymic'],
                'email' => $validator['email'],
                'phone' => $validator['phone'],
                'city' => $validator['city'],
                'address' => $validator['address'],
                'comment' => $validator['comment'],
                'pikup' => $validator['pikup'],
                'status_id' => 1,
            ]);
        }
        return $order;
    }

    // Add product for order
    public function addOrderProducts($cart, $order_id)
    {
        foreach ($cart as $cart_key => $cart_item) {
            foreach ($cart_item['attributes'] as $key => $value) {
                OrderProduct::create([
                    'order_id' => $order_id,
                    'product_id' => $cart_item['product']->id,
                    'article' => $cart_item['product']->article,
                    'name' => $cart_item['product']->name,
                    'price' => $cart_item['product']->actual_price_by_role,
                    'count' => $value['count'],
                    'color' => isset($value['color']) ? $value['color'] : null,
                    'size' => isset($value['size']) ? $value['size'] : null,
                    'material' => isset($value['material']) ? $value['material'] : null,
                    'direction' => isset($value['direction']) ? $value['direction'] : null,
                    'sex' => isset($value['sex']) ? $value['sex'] : null,
                    'season' => isset($value['season']) ? $value['season'] : null,
                ]);
            }
        }
        return true;
    }

    public function repeatOrder(User $user, Order $order, Request $request)
    {
        // return [$user, $order];
        //запрет повтора заказа покупателем других покупателей
        abort_if($user->id !== auth()->user()->id, 403);
        // $this->authorize('view', $user);//если условия не выполняются кидает на страницу 403 Запрещено
        //товары в заказе
        $productsInOrder = $order->products;
        // dd($order->products);
        //проверка на наличие товаров в заказе
        if (count($productsInOrder) != 0) {
            $cart_class = new CartController();
            $cart_class->clearCart($request, false);
            foreach ($productsInOrder as $index => $product) {

                $request['productId'] = $product->id;
                $request['productAttr'] = [
                    'count' => $product->pivot->count,
                    'size' => $product->pivot->size,
                    'color' => $product->pivot->color,
                    'material' => $product->pivot->material,
                    'direction' => $product->pivot->direction,
                    'sex' => $product->pivot->sex,
                    'season' => $product->pivot->season,
                ];
                $result = $cart_class->addToCart($request, false);
            };
            return redirect()->route('cart');
        } else {
            return redirect()->route('admin-personal', $user)->with('alert-warning', 'Неможливо повторити замовлення');
        };
    }
}
