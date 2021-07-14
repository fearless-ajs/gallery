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

    public function newAlbumPage()
    {
        return view('admin.new_album_page', ['settings' => $this->settings]);
    }

    public function allAlbumsPage()
    {
        return view('admin.albums_list_page', ['settings' => $this->settings]);
    }

    public function editAlbumPage($id)
    {
        return view('admin.edit_album_page', ['settings' => $this->settings, 'id' => $id]);
    }


    public function albumPicturesPage($album_id)
    {
        return view('admin.album_pictures_page', ['settings' => $this->settings, 'album_id' => $album_id]);
    }

    public function subAlbumPicturesPage($sub_album_id)
    {
        return view('admin.sub_album_pictures_page', ['settings' => $this->settings, 'sub_album_id' => $sub_album_id]);
    }

    public function subSubAlbumPicturesPage($sub_sub_album_id)
    {
        return view('admin.sub_sub_album_pictures_page', ['settings' => $this->settings, 'sub_sub_album_id' => $sub_sub_album_id]);
    }

    public function allSubAlbumsPage($album_id)
    {
        return view('admin.sub_albums_list_page', ['settings' => $this->settings, 'album_id' => $album_id]);
    }

    public function editSubAlbumPage($id)
    {
        return view('admin.edit_sub_album_page', ['settings' => $this->settings, 'id' => $id]);
    }

    public function allSubSubAlbumsPage($sub_album_id)
    {
        return view('admin.sub_sub_albums_list_page', ['settings' => $this->settings, 'sub_album_id' => $sub_album_id]);
    }

    public function editSubSubAlbumPage($id)
    {
        return view('admin.edit_sub_sub_album_page', ['settings' => $this->settings, 'id' => $id]);
    }

}
