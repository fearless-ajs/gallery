<?php

namespace App\Http\Livewire;

use App\Models\SubAlbum;
use Livewire\Component;

class UserSubAlbumsPage extends Component
{
    public $album_id;

    public function mount($album_id)
    {
        $this->album_id = $album_id;
    }

    public function render()
    {
        return view('livewire.user.pages.user-sub-albums-page',[
            'sub_albums' => SubAlbum::where('album_id', $this->album_id)->get()
        ]);
    }
}
