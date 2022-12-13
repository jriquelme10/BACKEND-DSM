<?php


use App\Http\Controllers\OrderrController;
use Illuminate\Support\Facades\Route;
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



Route::resource('/ordenes', OrderrController::class);
Route::get('/detail', [OrderrController::class, 'detail']);
Route::get('/index', [App\Http\Controllers\OrderrController::class, 'index'])->name('index');

Route::get('/attendOrder/{id}', [OrderrController::class, 'attendOrder'])->name('attendOrder');
Route::get('/finishOrder/{id}', [OrderrController::class, 'finishOrder'])->name('finishOrder');













//Nombre rutas
