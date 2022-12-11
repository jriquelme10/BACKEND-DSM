<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;
use Illuminate\Validation\ValidationException;



class SolicitudController extends Controller
{
    public function GenerateRequest()
    {
        return view('/cliente/create');
    }




    protected function requestService(Request $request)
    {

        $DateRequest = $request->dateRequest;
        $user = Auth::user();

        $cliente_id = $user->id;


        DB::table('orders')->where('id', $cliente_id);
        return redirect()->route('home')->with('password', 'updated');
    }


    public function index()
    {
        $orders = Auth::user()->ordenesCliente()->orderBy('date_order')->orderBy('time_order')->simplePaginate(10);

        return view('cliente.edit')->with('orders', $orders);
    }

    /* public function indexEstilista()
    {
        $orders = Auth::user()->solicitudesEstilista()->orderBy('fecha_solicitud')->orderBy('hora_solicitud')->simplePaginate(10);

        return view('estilista.edit')->with('solicituds', $solicituds);
    }*/


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function show(Order $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function update(Order $orders)
    {
    }


    public function updateEstado($request)
    {
        $orders = Order::where('id', $request)->get()->first();
        $orders->status = 'PEDIDO CANCELADO';
        $orders->save();
        return redirect('/cliente');
    }


    public function agregarComentario(Request $request, $id)
    {

        $orders = Order::where('id', $id)->FirstOrFail();

        $orders->time_order = $request->time;

        $orders->save();

        return redirect('/cliente');
    }
    public function cancelStatusSolicitud($request)
    {
        $orders = Order::where('id', $request)->get()->first();
        $orders->estado = 'PEDIDO CANCELADO';
        $orders->save();
        session()->flash('CANCELAR', 'El pedido fue cancelado con exito!');
        return redirect('/cliente');
    }
    public function AceptarServicio(Request $request, $id)
    {
        $user = Auth::user();

        $orders = Order::where('id', $id)->get()->first();

        $orders->cliente_id = $user->id;

        $date = date($orders->date_order);
        $time = date($orders->time_order);

        if (date("Y-m-d") <= $date && date("H:i:s") < $time) {
            $solicitud->estado = 'ATENDIDA A TIEMPO';
            $solicitud->save();
            return redirect(route('home'));
        } else {
            $solicitud->estado = 'ATENDIDA CON RETRASO';
            $solicitud->save();

            session()->flash('atender', 'La Solicitud fue atenidda con exito!');
            return redirect(route('home'));
        }
    }

    /*public function VerSolicitudes()
    {
        $orders = Order::where('status', 'INGRESADO')->simplePaginate(5);
        return view("estilista.index")->with('solicituds', $solicituds);
    }

    public function BuscarPorFecha(Request $request)
    {
        $date = date($request->fecha_solicitud);

        if ($date == null) {
            $solicitudes = Solicitud::where('estado', "=", 'INGRESADA')->simplePaginate(10);
            return view('estilista.index')->with('solicituds', $solicitudes);
        } else {
            $solicitudes = Solicitud::where('estado', "=", 'INGRESADA')->where('fecha_solicitud', $date)->simplePaginate(10);
            return view('estilista.index')->with('solicituds', $solicitudes);
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    /*public function destroy(Solicitud $solicitud)
    {
        //
    }

    public function store(Request $request)
    {

        $date = date($request->fecha_solicitud);
        $time = date($request->hora_solicitud);
        $estado = ('INGRESADA');
        $solicituds = Auth::user()->solicitudesCliente()->get('fecha_solicitud');

        switch ($date) {
            case null:
                throw ValidationException::withMessages(['fecha_solicitud' => 'Debe seleccionar una fecha.']);
                break;

            case ($date < date("Y-m-d")):
                throw ValidationException::withMessages(['fecha_solicitud' => 'La fecha siempre debe ser mayor a la fecha actual ' . date("d-m-Y")]);
                break;

            case ($date >= "9999-12-31"):
                throw ValidationException::withMessages(['fecha_solicitud' => 'La fecha indicada no es válida, debe seguir el formato: DD/MM/YYYY.']);
                break;
        }
        if ($time == null) {
            throw ValidationException::withMessages(['hora_solicitud' => 'Debe seleccionar una hora.']);
        }


        foreach ($solicituds as $solicitud) {

            if ($solicitud->fecha_solicitud == $date) {
                throw ValidationException::withMessages(['fecha_solicitud' => 'Ya existe solicitud para la fecha:' . $date]);
            }
        }


        Solicitud::create([
            'fecha_solicitud' => $date,
            'hora_solicitud' => $time,
            'estado' => $estado,
            'cliente_id' => Auth::user()->id,

        ]);


        return redirect(route('home'));
    }*/
}
