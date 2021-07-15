<?php

namespace App\Http\Livewire;

use App\Models\Picture;
use Livewire\Component;

class UserPicturesPage extends Component
{
    public $album_id;

    public $original;

    public function showOriginalImage($id){
        $this->original = $id;
    }

    public function mount($album_id)
    {
        $this->album_id = $album_id;
    }

    public function render()
    {
        return view('livewire.user.pages.user-pictures-page', [
            'pics' => Picture::where('album_id', $this->album_id)->paginate(100)
        ]);
    }
}
