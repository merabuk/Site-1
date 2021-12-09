<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Pivot\OrderProduct;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Status;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OrdersExport;
use App\Notifications\OrderSended;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        switch ($request->scope) {
            case '':
            case 'all':
                if (auth()->user()->roles->first()->slug == 'manager') {
                    $managerDealersIds = auth()->user()->dealers->pluck('id');
                    $orders = Order::where('manager_id', auth()->user()->id)->orWhereIn('user_id', $managerDealersIds)->with(['user'])->groupBy('id')->get();
                } else {
                    $orders = Order::with(['user'])->get();
                };
                $text = 'Всі замовлення';
                break;
            case 'new':
                if (auth()->user()->roles->first()->slug == 'manager') {
                    $managerDealersIds = auth()->user()->dealers->pluck('id');
                    $orders = Order::where('status_id', 1)->where(function ($query) use ($managerDealersIds) {
                                                                        $query->where('manager_id', auth()->user()->id)->orWhereIn('user_id', $managerDealersIds);
                                                                    })->with(['user'])->groupBy('id')->get();
                } else {
                    $orders = Order::where('status_id', 1)->with(['user'])->get();
                };
                $text = 'Нові замовлення';
                break;
            case 'working':
                if (auth()->user()->roles->first()->slug == 'manager') {
                    $managerDealersIds = auth()->user()->dealers->pluck('id');
                    $orders = Order::where('status_id', 2)->where(function ($query) use ($managerDealersIds) {
                                                                        $query->where('manager_id', auth()->user()->id)->orWhereIn('user_id', $managerDealersIds);
                                                                    })->with(['user'])->groupBy('id')->get();
                } else {
                    $orders = Order::where('status_id', 2)->with(['user'])->get();
                };
                $text = 'Замовлення у обробці';
                break;
            case 'payed':
                if (auth()->user()->roles->first()->slug == 'manager') {
                    $managerDealersIds = auth()->user()->dealers->pluck('id');
                    $orders = Order::where('status_id', 3)->where(function ($query) use ($managerDealersIds) {
                                                                        $query->where('manager_id', auth()->user()->id)->orWhereIn('user_id', $managerDealersIds);
                                                                    })->with(['user'])->groupBy('id')->get();
                } else {
                    $orders = Order::where('status_id', 3)->with(['user'])->get();
                };
                $text = 'Сплачені замовлення';
                break;
            case 'preparing':
                if (auth()->user()->roles->first()->slug == 'manager') {
                    $managerDealersIds = auth()->user()->dealers->pluck('id');
                    $orders = Order::where('status_id', 4)->where(function ($query) use ($managerDealersIds) {
                                                                        $query->where('manager_id', auth()->user()->id)->orWhereIn('user_id', $managerDealersIds);
                                                                    })->with(['user'])->groupBy('id')->get();
                } else {
                    $orders = Order::where('status_id', 4)->with(['user'])->get();
                };
                $text = 'Замовлення, що готуються до відправки';
                break;
            case 'shipped':
                if (auth()->user()->roles->first()->slug == 'manager') {
                    $managerDealersIds = auth()->user()->dealers->pluck('id');
                    $orders = Order::where('status_id', 5)->where(function ($query) use ($managerDealersIds) {
                                                                        $query->where('manager_id', auth()->user()->id)->orWhereIn('user_id', $managerDealersIds);
                                                                    })->with(['user'])->groupBy('id')->get();
                } else {
                    $orders = Order::where('status_id', 5)->with(['user'])->get();
                };
                $text = 'Відправлені замовлення';
                break;
            case 'placed':
                if (auth()->user()->roles->first()->slug == 'manager') {
                    $managerDealersIds = auth()->user()->dealers->pluck('id');
                    $orders = Order::where('status_id', 6)->where(function ($query) use ($managerDealersIds) {
                                                                        $query->where('manager_id', auth()->user()->id)->orWhereIn('user_id', $managerDealersIds);
                                                                    })->with(['user'])->groupBy('id')->get();
                } else {
                    $orders = Order::where('status_id', 6)->with(['user'])->get();
                };
                $text = 'Повернені замовлення';
                break;
            case 'finished':
                if (auth()->user()->roles->first()->slug == 'manager') {
                    $managerDealersIds = auth()->user()->dealers->pluck('id');
                    $orders = Order::where('status_id', 7)->where(function ($query) use ($managerDealersIds) {
                                                                        $query->where('manager_id', auth()->user()->id)->orWhereIn('user_id', $managerDealersIds);
                                                                    })->with(['user'])->groupBy('id')->get();
                } else {
                    $orders = Order::where('status_id', 7)->with(['user'])->get();
                };
                $text = 'Завершені замовлення';
                break;
            default:
                abort(404);
                break;
        }
        return view('backend.orders.index', compact('orders', 'text'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all(['id', 'surname', 'name', 'patronymic']);
        $managers = User::withRole('manager');
        return view('backend.orders.create', compact('users', 'managers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $validatedRequest = $request->validated();
        $validatedRequest['status_id'] = 1; //при создании - статус "в обработке"
        $validatedRequest['total_count'] = 0; //при создании - количество 0 - заказ пуст
        $validatedRequest['total_price'] = 0; //при создании - стоимость 0 - заказ пуст
        Order::create($validatedRequest);
        return redirect()->route('orders.index')->with('alert-success', 'Замовлення успішно створено');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $users = User::all(['id', 'surname', 'name', 'patronymic']);
        $statuses = Status::all();
        $order_products = OrderProduct::where('order_id', $order->id)->with(['product', 'product.mainImage'])->get();
        $managers = User::withRole('manager');
        return view('backend.orders.edit', compact('order', 'users', 'statuses', 'order_products', 'managers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $validatedRequest = $request->validated();
        $order->update($validatedRequest);
        //отправка уведомления когда статус заказа становиться отправленным
        if ($validatedRequest['status_id'] == 5) {
            if (isset($order->user_id)) {
                $order->user->notify(new OrderSended($order));
            } else {
                $order->notify(new OrderSended($order));
            };
        };
        return redirect()->route('orders.index')->with('alert-success', 'Замовлення успішно відредаговано');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Order $order)
    {
        //Удаляем заказа
        $order->delete();

        //Возврат результата
        if ($request->ajax()) {
           return response('deleted');
        }
        return redirect()->back();
    }

    /**
     * Exporting
     */
    public function export()
    {
        return Excel::download(new OrdersExport, 'orders_'.now().'.xlsx');
    }
}
