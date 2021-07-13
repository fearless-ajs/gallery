<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Support\Facades\Session;


class AdminGalleryController extends Controller
{
    public $settings;

    public function __construct()
    {
        $this->settings = Setting::latest()->first();
        Session::put('settings', $this->settings);
    }

    public function newVideoPage()
    {
        return view('admin.new_video_page', ['settings' => $this->settings]);
    }

    public function allVideosPage()
    {
        return view('admin.videos_list_page', ['settings' => $this->settings]);
    }

    public function editVideoPage($id)
    {
        return view('admin.edit_video_page', ['settings' => $this->settings, 'id' => $id]);
    }
}
