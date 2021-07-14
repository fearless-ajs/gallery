<?php

namespace App\Http\Livewire;

use App\Models\SubAlbum;
use App\Models\SubSubAlbum;
use Livewire\Component;

class AdminSubSubAlbumListPage extends Component
{
    public $sub_album_id;
    public $album;

    public function mount($sub_album_id)
    {
        $this->sub_album_id = $sub_album_id;
        $this->fetchAlbum();
    }

    public function fetchAlbum()
    {
        $this->album = SubAlbum::findOrFail($this->sub_album_id);
    }

    public function render()
    {
        return view('livewire.admin.pages.admin-sub-sub-album-list-page',  [
            'albums' => SubSubAlbum::where('sub_album_id', $this->sub_album_id)->latest()->paginate(20)
        ]);
    }
}
