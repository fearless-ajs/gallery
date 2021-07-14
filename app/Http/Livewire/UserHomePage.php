<?php

namespace App\Http\Livewire;

use App\Models\HomePage;
use Livewire\Component;

class UserHomePage extends Component
{
    public $page;

    public function mount()
    {
        $this->fetchPageData();
    }

    public function fetchPageData()
    {
       $this->page =  HomePage::latest()->first();
    }

    public function render()
    {
        return view('livewire.user.pages.user-home-page');
    }
}
