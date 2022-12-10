<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
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


        DB::table('solicituds')->where('id', $cliente_id);
        return redirect()->route('home')->with('password', 'updated');
    }


    public function index()
    {
        $solicituds = Auth::user()->solicitudesCliente()->orderBy('fecha_solicitud')->orderBy('hora_solicitud')->simplePaginate(10);

        return view('cliente.edit')->with('solicituds', $solicituds);
    }

    public function indexEstilista()
    {
        $solicituds = Auth::user()->solicitudesEstilista()->orderBy('fecha_solicitud')->orderBy('hora_solicitud')->simplePaginate(10);

        return view('estilista.edit')->with('solicituds', $solicituds);
    }


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
    public function show(Solicitud $solicitud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitud $solicitud)
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
    public function update(Solicitud $solicitud)
    {
    }


    public function updateEstado($request)
    {
        $solicitud = Solicitud::where('id', $request)->get()->first();
        $solicitud->estado = 'ANULADA';
        $solicitud->save();
        return redirect('/cliente');
    }


    public function agregarComentario(Request $request, $id)
    {

        $solicitud = Solicitud::where('id', $id)->FirstOrFail();

        $solicitud->comentario = $request->texto;

        $solicitud->save();

        return redirect('/cliente');
    }
    public function cancelStatusSolicitud($request)
    {
        $solicitud = Solicitud::where('id', $request)->get()->first();
        $solicitud->estado = 'ANULADA';
        $solicitud->save();
        session()->flash('anular', 'La Solicitud fue anulada con exito!');
        return redirect('/cliente');
    }
    public function AceptarServicio(Request $request, $id)
    {
        $user = Auth::user();

        $solicitud = Solicitud::where('id', $id)->get()->first();

        $solicitud->estilista_id = $user->id;

        $date = date($solicitud->fecha_solicitud);
        $time = date($solicitud->hora_solicitud);

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

    public function VerSolicitudes()
    {
        $solicituds = solicitud::where('estado', 'INGRESADA')->simplePaginate(5);
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
    public function destroy(Solicitud $solicitud)
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
    }
}
