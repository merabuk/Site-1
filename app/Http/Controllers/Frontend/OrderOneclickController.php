<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Frontend\StoreOrderOneclickRequest;

use App\Models\OrderOneclick;
use App\Models\Pivot\OrderOneclickProduct;
use App\Http\Controllers\Frontend\CartController;

class OrderOneclickController extends Controller
{
    //этот метод временно не используется
    /**
     * Add Oneclick order for product preview or category
     */
    public function orderOneclickProductPreview(StoreOrderOneclickRequest $request)
    {
        $product_id = $request->input('product_id');
        $validator = $request->validated();
        $attributes = array();

        $order = $this->createOrder($validator);

        $attributes['count'] = 1;
        $attributes['size'] = null;
        $attributes['color'] = null;
        $attributes['material'] = null;
        $attributes['direction'] = null;
        $attributes['sex'] = null;
        $attributes['season'] = null;
        $this->createOrderProducts($order->id, $product_id, $attributes);

        return response()->json(['result' => 'ok', 'order_id' => $order->id]);
    }

	/**
	 * Add Oneclick order for one product card product
	 */
	public function orderOneclickProduct(StoreOrderOneclickRequest $request)
	{
		$validator = $request->validated();
		$formData = $this->getSerrializeData($request->input('formData'));
		$product_id = $formData['product_id'];
		$attributes = array();

		$order = $this->createOrder($validator);

		$attributes['count'] = $formData['count'];
		$attributes['size'] = isset($formData['size']) ? $formData['size'] : null ;
		$attributes['color'] = isset($formData['color']) ? $formData['color'] : null ;
		$attributes['material'] = isset($formData['material']) ? $formData['material'] : null ;
		$attributes['direction'] = isset($formData['direction']) ? $formData['direction'] : null ;
		$attributes['sex'] = isset($formData['sex']) ? $formData['sex'] : null ;
		$attributes['season'] = isset($formData['season']) ? $formData['season'] : null ;
		$this->createOrderProducts($order->id, $product_id, $attributes);

		return response()->json(['result' => 'ok', 'order_id' => $order->id]);
	}

	/**
	 * Add Oneclick order for cart all product
	 */
    public function orderOneclickCart(StoreOrderOneclickRequest $request)
    {
    	$cart_class = new CartController();
    	$cart = $cart_class->updateCart($request);
        if (!isset($cart)) {
            return response()->json(['result' => 'empty']);
        };
    	$validator = $request->validated();

		$order = $this->createOrder($validator);

		foreach ($cart as $index => $item) {
            foreach($item['attributes'] as $key => $value) {
                $product_id = $item['product']->id;
                $attributes = array();
                $attributes['count'] = $value['count'];
                $attributes['size'] = isset($value['size']) ? $value['size'] : null ;
                $attributes['color'] = isset($value['color']) ? $value['color'] : null ;
                $attributes['material'] = isset($value['material']) ? $value['material'] : null ;
                $attributes['direction'] = isset($value['direction']) ? $value['direction'] : null ;
                $attributes['sex'] = isset($value['sex']) ? $value['sex'] : null ;
                $attributes['season'] = isset($value['season']) ? $value['season'] : null ;

                $this->createOrderProducts($order->id, $product_id, $attributes);
            }
		}

        $cart_class->clearCart($request, false);

		return response()->json(['result' => 'ok', 'order_id' => $order->id]);
    }

    /**
     * Create order in OrderOneclick table
     */
    protected function createOrder($validator)
    {
    	$order = OrderOneclick::create([
    		'name' => $validator['name'],
    		'phone' => $validator['phone'],
    	]);

    	return $order;
    }

    /**
     * Create products for order
     */
    protected function createOrderProducts($order_id, $product_id, $attributes)
    {
    	OrderOneclickProduct::create([
    		'order_oneclick_id' => $order_id,
            'product_id' => $product_id,
            'count' => $attributes['count'],
            'color' => $attributes['color'],
            'size' => $attributes['size'],
            'material' => $attributes['material'],
            'direction' => $attributes['direction'],
            'sex' => $attributes['sex'],
            'season' => $attributes['season'],
    	]);

    	return true;
    }

    /**
     * Function for tranform Jquery serializeArray for assoc
     */
    protected function getSerrializeData($data)
    {
    	$result = array();

    	foreach ($data as $key => $value) {
    		$result[$value['name']] = $value['value'];
    	}

    	return $result;
    }
}
