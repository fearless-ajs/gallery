<?php

namespace App\Http\Livewire;

use App\Models\Album;
use Livewire\Component;
use Livewire\WithPagination;

class AdminAlbumListPage extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.admin.pages.admin-album-list-page', [
            'albums' => Album::latest()->paginate(20)
        ]);
    }
}
