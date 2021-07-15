<?php

namespace App\Http\Livewire;

use App\Models\SubSubPicture;
use Livewire\Component;

class UserSubSubPicturesPage extends Component
{
    public $sub_sub_album_id;

    public function mount($sub_sub_album_id){
        $this->$sub_sub_album_id = $sub_sub_album_id;
    }

    public function render()
    {
        return view('livewire.user.pages.user-sub-sub-pictures-page', [
            'sub_sub_pics' => SubSubPicture::where('sub_sub_album_id', $this->sub_sub_album_id)->get()
        ]);
    }
}
