<?php

namespace App\Http\Livewire;

use App\Models\SubSubAlbum;
use Livewire\Component;

class UserSubSubAlbumsPage extends Component
{
    public $sub_album_id;

    public function mount($sub_album_id)
    {
        $this->sub_album_id = $sub_album_id;
    }

    public function render()
    {
        return view('livewire.user.pages.user-sub-sub-albums-page', [
            'sub_sub_albums' => SubSubAlbum::where('sub_album_id', $this->sub_album_id)->get()
        ]);
    }
}
