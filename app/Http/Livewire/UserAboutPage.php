<?php

namespace App\Http\Livewire;

use App\Models\AboutPage;
use App\Models\Setting;
use Livewire\Component;

class UserAboutPage extends Component
{
    public $page;
    public $setting;

    public function mount()
    {
        $this->fetchPageData();
        $this->fetchSettings();
    }

    public function fetchSettings()
    {
        $this->setting = Setting::latest()->first();
    }

    public function fetchPageData()
    {
        $this->page =  AboutPage::latest()->first();
    }

    public function render()
    {
        return view('livewire.user.pages.user-about-page');
    }
}
