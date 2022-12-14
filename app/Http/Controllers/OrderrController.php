<?php

namespace App\Http\Controllers;

use App\Models\Orderr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderrController extends Controller
{
    public function indexAPP()
    {
        $order = Orderr::get();

        return json_encode(['order' => $order]);
    }

    public function index()
    {
        $orderrs = Orderr::all();

        return view('Orders')->with([
            'Orders' => $orderrs,
        ]);
    }

    public function create(Request $request)
    {
        $order = new Orderr();

        $order['totalAmount'] = $request->totalAmount;
        $order['number_table'] = $request->number_table;
        $order['status'] = $request->status;

        $order->save();

        return response()->json(['isSuccess' => true, 'idOrden' => $order->id]);
    }

    public function show($id)
    {
        $order = Orderr::find($id);

        return $order;
    }

    public function detailsOrder(int $order_id)
    {
        $orderrs = DB::table('orders_products')->where('order_id', '=', $order_id)->get();

        return response()->json($orderrs);
    }

    public function attendOrder($id, Request $request)
    {
        $pedido = Orderr::where('id', $id)->get()->first();

        $pedido->status = 'PREPARANDO PEDIDO';
        $pedido->minutes = $request->minutes;
        $pedido->save();

        return redirect(route('index'));
    }

    public function finishOrder($id)
    {
        $pedido = Orderr::where('id', $id)->get()->first();

        $pedido->status = 'PEDIDO ENTREGADO';
        $pedido->save();

        return redirect(route('index'));
    }
}
