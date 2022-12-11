<?php

namespace App\Http\Controllers;

use App\Models\Orderr;
use App\Models\Producto;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrderrController extends Controller
{
    public function index()
    {
        $orderrs = Orderr::all();

        return view("Orders")->with([
            "Orders" => $orderrs


        ]);
    }

    public function detallesOrden(int $order_id)
    {
        $orderrs = DB::table('orders_products')->where('order_id', '=', $order_id)->get();
        return response()->json($orderrs);
    }


    /*public function saveOrder(Request $request)
    {
        $arr = [
            'order' => [

                'totalAmount' => $request->totalAmount,
                'number_table' => $request->number_table,
                'status' => $request->status

            ],
            'resumeOrders' => $request->orders_products

        ];

        $order = Orderr::create($arr['order']);
        $detailsOrden = $request->orders_products;
        foreach ($detailsOrden as $detail) {
            $product = Producto::where('id', $detail['product_id'],)->FirstOrFail();
            $product->save();
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $detail['product_id'],
                'quantity' => $detail['quantity']
            ]);
        }

        return OrderProduct::get();
    }
    public function listar_pedidos()
    {
        $pedidos = Orderr::all();

        return view("administrarOrdenes")->with('reumen_ordens', $pedidos);
    }
    */
    public function atender_orden()
    {
    }
}
