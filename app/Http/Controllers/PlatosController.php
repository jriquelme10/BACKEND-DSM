<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

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

        $file = $request->file('image');
        $filename = uniqid() . '_' . $file->getClientOriginalName();
        $file->move(public_path('public/images'), $filename);
        $url = URL::to('/') . '/public/images/' . $filename;
        $producto['url'] = $url;
        $producto['nombre'] = $request->nombre;
        $producto['categoria'] = $request->categoria;
        $producto['precio'] = $request->precio;
        $producto['descripcion'] = $request->descripcion;

        $producto->save();

        return response()->json(['isSuccess' => true, 'url' => $url]);
    }

    public function show($id)
    {
        $producto = Producto::find($id);

        return $producto;
    }

    public function update(Request $request)
    {
        $nombre = $request->nombre;
        $categoria = $request->categoria;
        $precio = $request->precio;
        $descripcion = $request->descripcion;
        $id = $request->id;

        Producto::where('id', $id)->update(['nombre' => $nombre, 'categoria' => $categoria, 'precio' => $precio, 'descripcion' => $descripcion]);

        return response()->json(['isSuccess' => true]);
    }

    public function updateImage(Request $request)
    {
        $validator = Validator::make($request->all(), ['image' => ['required', File::image()->max(10 * 1024)]]);
        if ($validator->fails()) {
            return response()->json($validator->messages());
        }

        $file = $request->file('image');
        $filename = uniqid() . '_' . $file->getClientOriginalName();
        $file->move(public_path('public/images'), $filename);
        $url = URL::to('/') . '/public/images/' . $filename;

        $nombre = $request->nombre;
        $categoria = $request->categoria;
        $precio = $request->precio;
        $descripcion = $request->descripcion;
        $id = $request->id;

        Producto::where('id', $id)->update(['nombre' => $nombre, 'categoria' => $categoria, 'precio' => $precio, 'descripcion' => $descripcion, 'url' => $url]);

        return response()->json(['isSuccess' => true]);
    }

    public function destroy($id)
    {
        Producto::destroy($id);

        return json_encode(['msg' => 'Producto eliminado']);
    }
}
