<?php

namespace App\Http\Livewire;

use App\Models\SubPicture;
use Livewire\Component;

class UserSubPicturesPage extends Component
{
    public $sub_album_id;

    public $original;

    public function showOriginalImage($id){
        $this->original = $id;
    }

    public function mount($sub_album_id)
    {
        $this->sub_album_id = $sub_album_id;
    }

    public function render()
    {
        return view('livewire.user.pages.user-sub-pictures-page', [
            'sub_pics' => SubPicture::where('sub_album_id', $this->sub_album_id)->get()
        ]);
    }
}
