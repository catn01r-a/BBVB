<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderManagementController extends Controller
{
    public function index()
    {
        // For now, show ALL orders (later we'll restrict to only their products)
        $orders = Order::latest()->get();

        return view('seller.orders.index', compact('orders'));
    }
}
