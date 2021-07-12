<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminDashboardController extends Controller
{

    public $settings;

    public function __construct()
    {
        $this->settings = Setting::latest()->first();
        Session::put('settings', $this->settings);
    }

    public function dashboard()
    {
        return view('admin.dashboard', ['settings' => $this->settings]);
    }

    public function settings()
    {
        return view('admin.settings',  ['settings' => $this->settings]);
    }
}
