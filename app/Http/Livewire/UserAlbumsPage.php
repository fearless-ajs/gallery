<?php

namespace App\Http\Livewire;

use App\Models\Album;
use Livewire\Component;

class UserAlbumsPage extends Component
{

    public function render()
    {
        return view('livewire.user.pages.user-albums-page', [
            'albums' => Album::latest()->get()
        ]);
    }
}
