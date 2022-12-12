<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;


class PlatosController extends Controller
{
    public function index()
    {
        // return view('platos.index');
        $productos = Producto::get();

        return json_encode(['productos' => $productos]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), ['image' => ['required', File::image()->max(10 * 1024)]]);
        if ($validator->fails()) {
            return response()->json($validator->messages());
        }



        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->categoria = $request->categoria;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;
        $producto->image = $request->image;


        $producto->save();
    }

    public function show($id)
    {
        $producto = Producto::find($id);

        return $producto;
        // return view('platos.show', compact('name'));
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($request->$id);
        $producto->nombre = $request->nombre;
        $producto->categoria = $request->categoria;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;
        $producto->image = $request->image;


        $producto->save();

        return $producto;
    }

    public function destroy($id)
    {
        $producto = Producto::destroy($id);

        return $producto;
    }
}
