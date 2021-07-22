<?php

namespace App\Http\Livewire;

use App\Models\Picture;
use App\Models\SubSubAlbum;
use App\Models\SubSubPicture;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class AdminSubSubAlbumPicturesPage extends Component
{
    use WithPagination;

    public $album_id;
    public $album;

    public function mount($sub_sub_album_id)
    {
        $this->album_id = $sub_sub_album_id;
        $this->fetchAlbum();
    }

    public function fetchAlbum()
    {
        $this->album = SubSubAlbum::findOrFail($this->album_id);
    }

    public function remove($image_id)
    {
        $picture = SubSubPicture::find($image_id);
        $this->deleteOriginalFile($picture->original_image);
        $this->deleteOptimizedFile($picture->optimized_image);

        $picture->delete();
        return $this->emit('alert', ['type' => 'success', 'message' => 'Picture deleted!']);
    }

    protected function deleteOriginalFile($filename)
    {
        Storage::delete('/public/'.$filename);
    }

    protected function deleteOptimizedFile($filename)
    {
        Storage::delete('/public/thumbnail'.$filename);
    }

    public function render()
    {
        return view('livewire.admin.pages.admin-sub-sub-album-pictures-page',  [
        'images' => SubSubPicture::where('sub_sub_album_id', $this->album_id)->latest()->paginate(400)
        ]);
    }
}
