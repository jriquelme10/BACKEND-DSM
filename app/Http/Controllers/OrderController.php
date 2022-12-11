<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // return view('platos.index');
        $order = Order::get();

        return json_encode(['order' => $order]);
    }

    public function create(Request $request)
    {
        $order = new Order();
        $order->table_id = $request->table_id;
        $order->totalAmount = $request->totalAmount;



        $order->save();
    }

    public function show($id)
    {
        $order = Order::find($id);

        return $order;
        // return view('platos.show', compact('name'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($request->$id);
        $order->table_id = $request->table_id;


        $order->save();

        return $order;
    }

    public function destroy($id)
    {
        $order = order::destroy($id);

        return $order;
    }
}
