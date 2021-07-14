<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserPagesController extends Controller
{
    public $settings;

    public function __construct()
    {
        $this->settings = Setting::latest()->first();
        Session::put('settings', $this->settings);
    }

    public function homepage()
    {
        $data = [
          'title'       => 'Backyard Railroad - '.  $this->settings->app_name,
          'keywords'    => 'Backyard Railroad - '.  $this->settings->app_name,
          'description' => 'Backyard Railroad - '.  $this->settings->app_name,
        ];
        return view('user.home', ['settings' => $this->settings, 'data' => $data]);
    }
}
