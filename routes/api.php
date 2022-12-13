<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OrderProductController;
use App\Http\Controllers\OrderrController;
use App\Http\Controllers\PlatosController;
use App\Http\Controllers\TableController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('saveOrder', [ResumenOrdenController::class, 'saveOrder']);

Route::controller(PlatosController::class)->group(function () {
    Route::get('/platos', 'index');
    Route::post('/plato', 'create');
    Route::get('/plato/{id}', 'show');
    Route::post('/platoUpdate', 'update');
    Route::post('/platoUpdateImage', 'updateImage');
    Route::delete('/platos/{id}', 'destroy');
    Route::get('/platosFilter/{category_id}', 'filterByCategory');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/categorias', 'index');
    Route::post('/categoria', 'create');
    Route::get('/categoria/{id}', 'show');
    Route::put('/categoriaUPDATE', 'update');
    Route::delete('/categorias/{id}', 'destroy');
});

Route::controller(TableController::class)->group(function () {
    Route::get('/mesas', 'index');
    Route::post('/mesa', 'create');
    Route::get('/mesa/{number_table}', 'show');
    Route::put('/mesa/{id}', 'update');
    Route::delete('/mesas/{id}', 'destroy');
});

Route::controller(OrderrController::class)->group(function () {
    Route::get('/orders', 'index');
    Route::post('/order', 'create');
    Route::get('/order/{id}', 'show');
    Route::put('/orderUpdate/{id}', 'update');
    Route::delete('/orders/{id}', 'destroy');
});

Route::controller(OrderProductController::class)->group(function () {
    Route::get('/orderProducts', 'index');
    Route::post('/orderProduct', 'create');
    Route::get('/orderProduct/{id}', 'show');
    Route::put('/orderProductUpdate/{id}', 'update');
    Route::delete('/orderProducts/{id}', 'destroy');
});

Route::post('/upload', [ImageController::class, 'uploadImage'])->name('images.upload');
