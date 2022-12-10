<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Rules\ValidarRut;
use Illuminate\Auth\Events\Login;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        \Session::flash('registrado_message', 'Usuario registrado con exito');
        return $this->registered($request, $user)
            ?: redirect('login');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'apellido' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:10', 'max:15', 'confirmed'],
            'rut' => ['required', 'string', 'min:8', 'max:9', 'unique:users', new ValidarRut()],
            'telefono' => ['required', 'integer', 'regex:/[0-9]*/', 'min:10000000', 'max:999999999']
        ]);

        $messages = [
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ];
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'rut' => $data['rut'],
            'name' => $data['name'],
            'apellido' => $data['apellido'],
            'direccion' => $data['direccion'],
            'email' => $data['email'],
            'telefono' => $data['telefono'],
            'password' => Hash::make($data['password']),
            'status' => true,

        ]);
    }
}
