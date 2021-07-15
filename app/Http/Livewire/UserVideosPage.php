<?php

namespace App\Http\Livewire;

use App\Models\Video;
use Livewire\Component;
use Livewire\WithPagination;

class UserVideosPage extends Component
{

   use WithPagination;

    public function render()
    {
        return view('livewire.user.pages.user-videos-page', [
            'videos' => Video::latest()->get()
        ]);
    }
}
