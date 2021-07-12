<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function settings()
    {
        return view('admin.settings');
    }
}
