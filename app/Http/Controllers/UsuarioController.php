<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        return view('usuario.edit');
    }

    public function edit()
    {
        return view('usuario.edit');
    }

    public function password()
    {
        return view('usuario.changepassword');
    }

    public function changePassword(Request $request)
    {
        $usuario = User::find(Auth::User()->id);
        if (empty($usuario)) {
            //Flash::error('mensaje error');

            return redirect()->back();
            //return redirect(route('logout'));
        }

        $v = Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:10', 'max:15', 'confirmed']
        ]);

        if ($v->fails()) {
            //dd($v->errors());
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $usuario->password = Hash::make($request->input('password'));
        //$usuario->fill($request->all());

        $usuario->save();
        //Flash::success('Perfil actualizado con éxito.');

        \Session::flash('contrasenia_message', 'Contraseña actualizada');

        Auth::logout();
        //return view('auth.login');
        return redirect(route('home'));
    }


    public function update(Request $request)
    {
        $usuario = User::find(Auth::User()->id);
        if (empty($usuario)) {
            //Flash::error('mensaje error');

            return redirect()->back();
            //return redirect(route('logout'));
        }

        //Validacion

        if (strcmp($usuario->email, $request->email) == 0) {

            //dd($request);
            $v = Validator::make($request->all(), [
                'name' => ['required', 'string', 'min:2', 'max:255'],
                'apellido' => ['required', 'string', 'max:255'],
                'telefono' => ['required', 'integer', 'regex:/[0-9]*/', 'min:10000000', 'max:999999999']
            ]);
            //dd($v->fails());

            if ($v->fails()) {
                //dd($v->errors());
                return redirect()->back()->withInput()->withErrors($v->errors());
            }
        } else {
            $v = Validator::make($request->all(), [
                'name' => ['required', 'string', 'min:2', 'max:255'],
                'apellido' => ['required', 'string', 'min:2', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'telefono' => ['required', 'integer', 'regex:/[0-9]*/', 'min:10000000', 'max:999999999']
            ]);

            if ($v->fails()) {
                //dd($v->errors());
                return redirect()->back()->withInput()->withErrors($v->errors());
            }
        }



        $usuario->rut = $request->input('rut');
        $usuario->name = $request->input('name');
        $usuario->apellido = $request->input('apellido');
        $usuario->telefono = $request->input('telefono');
        $usuario->email = $request->input('email');
        $usuario->direccion = $request->input('direccion');
        //$usuario->fill($request->all());

        $usuario->save();
        //Flash::success('Perfil actualizado con éxito.');
        \Session::flash('datos_message', 'Datos actualizados');
        return redirect(route('home'));
    }
}
