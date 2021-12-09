<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderOneclick;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ordersCount = Order::count();
        $clickCount = OrderOneclick::count();
        $newOrdersCount = Order::where('status_id', 1)->count();
        $managersCount = User::withRole('manager')->count();
        $dealersCount = User::withRole('dealer')->count();
        return view('home', compact('ordersCount', 'clickCount', 'newOrdersCount', 'managersCount', 'dealersCount'));
    }
}
