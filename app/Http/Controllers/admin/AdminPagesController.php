<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminPagesController extends Controller
{
    public $settings;

    public function __construct()
    {
        $this->settings = Setting::latest()->first();
        Session::put('settings', $this->settings);
    }

    public function homePage()
    {
        return view('admin.home_page', ['settings' => $this->settings]);
    }

    public function aboutPage()
    {
        return view('admin.about_page', ['settings' => $this->settings]);
    }

    public function openHousePage()
    {
        return view('admin.open_house_page', ['settings' => $this->settings]);
    }

    public function openHouseDatePage()
    {
        return view('admin.admin_open_house_date_page', ['settings' => $this->settings]);
    }


}
