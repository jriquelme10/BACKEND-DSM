<?php

use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\EstilistaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\HabilitarUsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use JeroenNoten\LaravelAdminLte\AdminLte;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //dd(auth()->user());
    if (is_null(auth()->user())) {
        return view('auth.login');
    } else {
        return view('Admin.index');
    }
});


Auth::routes();


Route::get('/home', [App\Http\Controllers\AdminHomeController::class, 'index'])->name('home');
Route::get('/usuario', function () {
    return view('usuario.edit');
});
Route::get('/changepassword', function () {
    return view('usuario.changepassword');
});



Route::get('/cliente/create', function () {
    return view('cliente.create');
});
Route::get('/cliente/edit', function () {
    return view('cliente.edit');
});
Route::get('/cliente', function () {
    return view('cliente.index');
});




Route::get('/Admin', function () {
    return view('Admin.index');
});
Route::get('/ingresarEstilista', function () {
    return view('Admin.IngresarEstilista');
});

Route::get('/estilista', function () {
    return view('administrador.estilista.index');
});
Route::get('/estilista/create', function () {
    return view('administrador.estilista.create');
});

Route::get('/estilista/edit', function () {
    return view('administrador.estilista.edit');
});

Route::get('/habilitarUsuarios', function () {
    return view('administrador.usuari00.index');
});
Route::get('/estilistaa', function () {
    return view('estilista.index');
});
Route::get('/estilistaa/create', function () {
    return view('estilista.create');
});












Route::middleware(['RutaEstilista'])->group(function () {
    Route::get('/estilista', [EstilistaController::class, "index"])->name("estilista");
    Route::get('/estilista/create', [EstilistaController::class, "create"])->name("crear_estilista");
    Route::post('/estilista/create', [EstilistaController::class, "store"])->name("crear_estilista_post");
    Route::get('/estilista/edit/{id}', [EstilistaController::class, "edit"])->name("editar_estilista");
    Route::post("/estilista/edit/{id}", [EstilistaController::class, "update"])->name("editar_estilista_post");
    Route::get('/habilitarUsuarios', [HabilitarUsuarioController::class, 'index'])->name('habilitarUsuarios');
    Route::get('/habilitarUsuarios/{id}', [HabilitarUsuarioController::class, 'updateStatus'])->name('cambiarEstado');
    Route::get('/administrarSolicitud', [HabilitarUsuarioController::class, 'create'])->name('administrar_Solicitudes');
});


//Nombre rutas
Route::post('/usuario', [UsuarioController::class, 'edit'])->name('edit');
Route::post('/changepassword', [UsuarioController::class, 'password'])->name('password');


Route::get('/cliente', [SolicitudController::class, 'index'])->name('solicitud');
Route::post('/cliente/edit', [SolicitudController::class, 'store'])->name('editar_solicitud_post');
Route::get('/cliente/create', [SolicitudController::class, 'create'])->name('crear_solicitud');
Route::post('/cliente/create', [SolicitudController::class, 'store'])->name('crear_solicitud_post');

Route::post('/Admin', [AdminHomeController::class, 'admin'])->name('admin');
Route::post('/IngresarEstilista', [AdminHomeController::class, 'ingresarEstilista'])->name('ingresarEstilista');
Route::post('/IngresarEstilista', [EstilistaController::class, 'nuevoEstilista'])->name('nuevoEstilista');
//Actualizaciones de datos
Route::patch('/update', [UsuarioController::class, 'update'])->name('update');
Route::patch('/updatepassword', [UsuarioController::class, 'changePassword'])->name('changePassword');



Route::get('/cliente/{id}', [SolicitudController::class, 'updateEstado'])->name('update.status');


Route::get('/cliente-comentario/{id}', [SolicitudController::class, 'agregarComentario'])->name('agregar_comentario');


Route::get('/estilistaa-buscar', [SolicitudController::class, 'BuscarPorFecha'])->name('BuscarPorFecha');
Route::get('/estilistaa', [SolicitudController::class, 'VerSolicitudes'])->name('VerSolicitudes');
Route::get('/estilistaa/create/{id}', [SolicitudController::class, 'AceptarServicio'])->name('AceptarServicio');
Route::get('/estilistaa-administrar-solicitudes', [SolicitudController::class, 'indexEstilista'])->name('solicitudEstilista');

//Route::post('/Servicios/edit', [SolicitudController::class, 'store'])->name('editar_solicitud_post');
//Route::get('/Servicios/create', [SolicitudController::class, 'create'])->name('crear_solicitud');
//Route::post('/Servicios/create', [SolicitudController::class, 'store'])->name('crear_solicitud_post');*/



//Route::get('/usuario', [App\Http\Controllers\UsuarioController::class, 'index'])->name('usuario');
