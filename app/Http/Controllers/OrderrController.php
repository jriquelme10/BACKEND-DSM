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

    public function detailsOrder(int $order_id)
    {
        $orderrs = DB::table('orders_products')->where('order_id', '=', $order_id)->get();
        return response()->json($orderrs);
    }
}
