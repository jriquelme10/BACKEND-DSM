<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminHomeController extends Controller
{
    public function index()
    {
        if (is_null(auth()->user())) {
            return view('auth.login');
        } else {
            return view('Admin.index');
        }


    }

    public function ingresarEstilista()
    {
        return view('admin.IngresarEstilista');
    }
}
