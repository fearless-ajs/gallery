<?php

namespace App\Http\Livewire;

use App\Models\Album;
use App\Models\Article;
use App\Models\Picture;
use App\Models\SubAlbum;
use App\Models\SubPicture;
use App\Models\Subscriber;
use App\Models\SubSubAlbum;
use App\Models\SubSubPicture;
use App\Models\Video;
use Livewire\Component;

class AdminDashboardPage extends Component
{
    public $albumNo;
    public $subscribersNo;
    public $articleNo;
    public $videoNo;

    public function mount()
    {
        $this->countAlbums();
        $this->countSubscribers();
        $this->countArticles();
        $this->countVideos();
    }

    public function countVideos()
    {
        $this->videoNo = Video::count();
    }

    public function countArticles()
    {
        $this->articleNo = Article::count();
    }

    public function countSubscribers()
    {
        $this->subscribersNo = Subscriber::count();
    }


    public function countAlbums()
    {
        $albums = Album::count();
        $subAlbums = SubAlbum::count();
        $subSubAlbums = SubSubAlbum::count();

        $this->albumNo  = $albums + $subAlbums + $subSubAlbums;
    }


    public function render()
    {
        return view('livewire.admin.pages.admin-dashboard-page');
    }
}
