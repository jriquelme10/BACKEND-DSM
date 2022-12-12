<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
