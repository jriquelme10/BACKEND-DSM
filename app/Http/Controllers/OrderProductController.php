<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    public function index()
    {
        return OrderProduct::get();
    }

    public function create(Request $request)
    {
        $order = new OrderProduct();

        $order['quantity'] = $request->quantity;
        $order['product_id'] = $request->product_id;
        $order['order_id'] = $request->order_id;

        $order->save();

        return response()->json(['isSuccess' => true]);
    }
}
