<?php

namespace App\Http\Livewire;

use App\Models\SubAlbum;
use App\Models\SubPicture;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class AdminSubAlbumPicturesPage extends Component
{
    use WithPagination;

    public $album_id;
    public $album;

    public function mount($sub_album_id)
    {
        $this->album_id = $sub_album_id;
        $this->fetchAlbum();
    }

    public function fetchAlbum()
    {
        $this->album = SubAlbum::findOrFail($this->album_id);
    }

    public function remove($image_id)
    {
        $picture = SubPicture::find($image_id);
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
        return view('livewire.admin.pages.admin-sub-album-pictures-page', [
            'images' => SubPicture::where('sub_album_id', $this->album_id)->latest()->paginate(400)
        ]);
    }
}
