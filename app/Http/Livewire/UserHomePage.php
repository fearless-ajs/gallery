<?php

namespace App\Http\Livewire;

use App\Models\HomePage;
use App\Models\Setting;
use Livewire\Component;

class UserHomePage extends Component
{
    public $page;
    public $setting;

    public function mount()
    {
        $this->fetchPageData();
        $this->fetchSettings();
    }

    public function fetchPageData()
    {
       $page =   HomePage::latest()->first();
       if ($page){
           $this->page = $page;
       }
    }

    public function fetchSettings()
    {
        $this->setting = Setting::latest()->first();
    }

    public function render()
    {
        return view('livewire.user.pages.user-home-page');
    }
}
