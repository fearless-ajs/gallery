<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Article;
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

    public function aboutPage()
    {
        $data = [
            'title'       => 'About Backyard Railroad - '.  $this->settings->app_name,
            'keywords'    => 'About Backyard Railroad - '.  $this->settings->app_name,
            'description' => 'About Backyard Railroad - '.  $this->settings->app_name,
        ];
        return view('user.about', ['settings' => $this->settings, 'data' => $data]);
    }

    public function articlesPage()
    {
        $data = [
            'title'       => 'Articles - '.  $this->settings->app_name,
            'keywords'    => 'Articles - '.  $this->settings->app_name,
            'description' => 'Articles - '.  $this->settings->app_name,
        ];
        return view('user.articles', ['settings' => $this->settings, 'data' => $data]);
    }

    public function articleViewPage($id)
    {
        $article = Article::find($id);
        $data = [
            'title'       => $article->title.' - '.  $this->settings->app_name,
            'keywords'    => $article->title.' - '.  $this->settings->app_name,
            'description' => $article->title.' - '.  $this->settings->app_name,
        ];
        return view('user.article_view', ['settings' => $this->settings, 'data' => $data, 'id' => $id]);
    }

    public function openHousePage()
    {
        $data = [
            'title'       => 'Open Houses - '.  $this->settings->app_name,
            'keywords'    => 'Open Houses - '.  $this->settings->app_name,
            'description' => 'Open Houses - '.  $this->settings->app_name,
        ];
        return view('user.open_house', ['settings' => $this->settings, 'data' => $data]);
    }


    public function videosPage()
    {
        $data = [
            'title'       => 'Videos - '.  $this->settings->app_name,
            'keywords'    => 'Videos - '.  $this->settings->app_name,
            'description' => 'Videos - '.  $this->settings->app_name,
        ];
        return view('user.videos', ['settings' => $this->settings, 'data' => $data]);
    }

    public function albumsPage()
    {
        $data = [
            'title'       => 'Albums - '.  $this->settings->app_name,
            'keywords'    => 'Albums - '.  $this->settings->app_name,
            'description' => 'Albums - '.  $this->settings->app_name,
        ];
        return view('user.albums', ['settings' => $this->settings, 'data' => $data]);
    }

    public function picturesPage($album_id)
    {
        $data = [
            'title'       => 'Pictures - '.  $this->settings->app_name,
            'keywords'    => 'Pictures - '.  $this->settings->app_name,
            'description' => 'Pictures - '.  $this->settings->app_name,
        ];
        return view('user.pictures', ['settings' => $this->settings, 'data' => $data, 'album_id' => $album_id]);
    }

    public function subPicturesPage($sub_album_id)
    {
        $data = [
            'title'       => 'Pictures - '.  $this->settings->app_name,
            'keywords'    => 'Pictures - '.  $this->settings->app_name,
            'description' => 'Pictures - '.  $this->settings->app_name,
        ];
        return view('user.sub_pictures', ['settings' => $this->settings, 'data' => $data, 'sub_album_id' => $sub_album_id]);
    }

    public function subSubPicturesPage($sub_sub_album_id)
    {
        $data = [
            'title'       => 'Pictures - '.  $this->settings->app_name,
            'keywords'    => 'Pictures - '.  $this->settings->app_name,
            'description' => 'Pictures - '.  $this->settings->app_name,
        ];
        return view('user.sub_sub_pictures', ['settings' => $this->settings, 'data' => $data, 'sub_sub_album_id' => $sub_sub_album_id]);
    }

    public function subAlbumsPage($album_id)
    {
        $data = [
            'title'       => 'Albums - '.  $this->settings->app_name,
            'keywords'    => 'Albums - '.  $this->settings->app_name,
            'description' => 'Albums - '.  $this->settings->app_name,
        ];
        return view('user.sub_albums', ['settings' => $this->settings, 'data' => $data, 'album_id' => $album_id]);
    }

    public function subSubAlbumsPage($sub_album_id)
    {
        $data = [
            'title'       => 'Albums - '.  $this->settings->app_name,
            'keywords'    => 'Albums - '.  $this->settings->app_name,
            'description' => 'Albums - '.  $this->settings->app_name,
        ];
        return view('user.sub_sub_albums', ['settings' => $this->settings, 'data' => $data, 'sub_album_id' => $sub_album_id]);
    }
}
