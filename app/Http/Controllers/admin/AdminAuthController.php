<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function reset()
    {
        return view('admin.reset');
    }

    public function register()
    {
        return view('admin.register');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
