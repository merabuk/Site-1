<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\OrderOneclick;
use Illuminate\Http\Request;

class OrderOneclickController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders_oneclick = OrderOneclick::with(['products'])->get();
        return view('backend.order_oneclick.index', compact('orders_oneclick'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //not used
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //not used
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderOneclick  $orderOneclick
     * @return \Illuminate\Http\Response
     */
    public function show(OrderOneclick $orderOneclick)
    {
        return view('backend.order_oneclick.show', compact('orderOneclick'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderOneclick  $orderOneclick
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderOneclick $orderOneclick)
    {
        //not used
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderOneclick  $orderOneclick
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderOneclick $orderOneclick)
    {
        //not used
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderOneclick  $orderOneclick
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, OrderOneclick $orderOneclick)
    {
        //Удаляем заказа
        $orderOneclick->delete();

        //Возврат результата
        if ($request->ajax()) {
           return response('deleted');
        }
        return redirect()->back();
    }
}
