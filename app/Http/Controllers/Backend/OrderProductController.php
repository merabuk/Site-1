<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Pivot\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderProductRequest;
use App\Http\Requests\UpdateOrderProductRequest;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Order $order)
    {
        $products = Product::with(['mainImage'])->get();
        return view('backend.order_products.create', compact('order','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderProductRequest $request, Order $order)
    {
        $validatedRequest = $request->validated();
        $validatedRequest['order_id'] = $order->id;

        //Записуем текущее значение параметров выбранного товара
        $product = Product::find($validatedRequest['product_id']);
        $validatedRequest['article'] = $product->article;
        $validatedRequest['name'] = $product->name;
        if ($order->user_id) {
            $validatedRequest['price'] = $product->getActualPriceByRole($order->user_id);
        } else {
            $validatedRequest['price'] = $product->getActualPriceByRole();
        };
        //Ищем дубликаты в заказе
        $duplicate_product = OrderProduct::where('order_id', $order->id)
                                        ->where('product_id', $validatedRequest['product_id'] ?? null)
                                        ->where('color', $validatedRequest['color'] ?? null)
                                        ->where('size', $validatedRequest['size'] ?? null)
                                        ->where('material', $validatedRequest['material'] ?? null)
                                        ->where('direction', $validatedRequest['direction'] ?? null)
                                        ->where('sex', $validatedRequest['sex'] ?? null)
                                        ->where('season', $validatedRequest['season'] ?? null)
                                        ->first();
        if ($duplicate_product) {
            //Увеличиваем кол-во товара если он полностью совпадает в корзине
            $duplicate_product->count += $validatedRequest['count'];
            $duplicate_product->save();
        } else {
            //Создаем товар
            OrderProduct::create($validatedRequest);
        }
        //Пересчитываем сумму заказа
        $order_products = OrderProduct::where('order_id', $order->id)->get();
        $total_price = $order_products->sum(function($order_product){
            return $order_product->price * $order_product->count;
        });
        $order->total_price = $total_price;
        $order->total_count = $order_products->sum('count');
        $order->save();

        return redirect()->route('orders.edit', $order->id)->with('alert-success', 'Товар успішно додано до замовлення');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderProduct  $order_product
     * @return \Illuminate\Http\Response
     */
    public function show(OrderProduct $order_product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderProduct  $order_product
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order, OrderProduct $order_product)
    {
        $products = Product::with(['mainImage', 'addedImages'])->get();
        return view('backend.order_products.edit', compact('order', 'order_product', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderProduct  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderProductRequest $request, Order $order, OrderProduct $order_product)
    {
        $validatedRequest = $request->validated();
        //Записуем текущее значение параметров выбранного товара
        $product = Product::find($validatedRequest['product_id']);
        $validatedRequest['article'] = $product->article;
        $validatedRequest['name'] = $product->name;
        if ($order->user_id) {
            $validatedRequest['price'] = $product->getActualPriceByRole($order->user_id);
        } else {
            $validatedRequest['price'] = $product->getActualPriceByRole();
        };
        //Ищем дубликаты в заказе
        $duplicate_product = OrderProduct::where('order_id', $order->id)
                                        ->where('product_id', $validatedRequest['product_id'] ?? null)
                                        ->where('color', $validatedRequest['color'] ?? null)
                                        ->where('size', $validatedRequest['size'] ?? null)
                                        ->where('material', $validatedRequest['material'] ?? null)
                                        ->where('direction', $validatedRequest['direction'] ?? null)
                                        ->where('sex', $validatedRequest['sex'] ?? null)
                                        ->where('season', $validatedRequest['season'] ?? null)
                                        ->first();
        if ($duplicate_product) {
            //Увеличиваем кол-во товара если он полностью совпадает в корзине
            $duplicate_product->count += $validatedRequest['count'];
            $duplicate_product->save();
            //Удаляем товар, который был заменен дубликатом
            $order_product->delete();
        } else {
            //Обновляем товар в заказе
            $order_product->update($validatedRequest);
        }
        //Пересчитываем сумму заказа
        $order_products = OrderProduct::where('order_id', $order->id)->get();
        $total_price = $order_products->sum(function($order_product){
            return $order_product->price * $order_product->count;
        });
        $order->total_price = $total_price;
        $order->total_count = $order_products->sum('count');
        $order->save();

        return redirect()->route('orders.edit', $order->id)->with('alert-success', 'Товар успішно відредаговано');
    }

    /**
     * Удаление товара из заказа
     */
    public function destroy(Request $request, Order $order, OrderProduct $order_product)
    {
        //Минусуем его цену и количество из заказа
        $order->total_count -= $order_product->count;
        $order->total_price -= $order_product->price*$order_product->count;
        $order->save();
        //Удаляем товар из заказа
        $order_product->delete();

        //Возврат результата
        if ($request->ajax()) {
            return response('deleted');
        }
        return redirect()->back();
    }
}
