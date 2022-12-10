<?php

use App\Http\Controllers\AdminHomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Contracts\Role;

Route::get('', [AdminHomeController::class, 'index']);
