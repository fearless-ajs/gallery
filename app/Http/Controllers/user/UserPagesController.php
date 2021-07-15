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
}
