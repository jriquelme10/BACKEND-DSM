<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orderr;
use App\Models\Producto;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use JeroenNoten\LaravelAdminLte\View\Components\Form\Select;

class OrderrController extends Controller
{
    public function index()
    {
        $orderrs = Orderr::all();

        return view("Orders")->with([
            "Orders" => $orderrs


        ]);
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
        return redirect(route('/index'));
    }

    public function finishOrder($id, Request $request)
    {

        $pedido = Orderr::where('id', $id)->get()->first();

        $pedido->status = 'PEDIDO ENTREGADO';
        $pedido->save();
        return redirect(route('/ordenes'));
    }
}
