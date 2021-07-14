<?php

namespace App\Http\Livewire;

use App\Models\Album;
use App\Models\SubAlbum;
use Livewire\Component;

class AdminSubAlbumListPage extends Component
{
    public $album_id;
    public $album;

    public function mount($album_id)
    {
        $this->album_id = $album_id;
        $this->fetchAlbum();
    }

    public function fetchAlbum()
    {
        $this->album = Album::findOrFail($this->album_id);
    }

    public function render()
    {
        return view('livewire.admin.pages.admin-sub-album-list-page', [
            'albums' => SubAlbum::where('album_id', $this->album_id)->latest()->paginate(20)
        ]);
    }
}
