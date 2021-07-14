<?php

namespace App\Http\Livewire;

use App\Models\SubAlbum;
use App\Models\SubSubAlbum;
use App\Models\SubSubPicture;
use Illuminate\Support\Facades\Storage;
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


    public function delete($id)
    {
        $album = SubSubAlbum::findOrFail($id);
            //Check if the album has content already
            if (SubSubPicture::where('sub_sub_album_id', $id)->first()){
                //Alert this album is not empty
                $this->emit('alert', ['type' => 'error', 'message' => 'Sorry, the album is not empty!']);
                return;
            }
            //Delete the Album
            //Delete the album cover image first
            $this->deleteOldFile($album->image);

            //Delete the record from the database
            $album->delete();

            //Alert the user and return
            $this->emit('alert', ['type' => 'success', 'message' => 'Album deleted successfully']);
            return;

    }

    protected function deleteOldFile($filename){
        Storage::delete('/public/'.$filename);
    }


    public function render()
    {
        return view('livewire.admin.pages.admin-sub-sub-album-list-page',  [
            'albums' => SubSubAlbum::where('sub_album_id', $this->sub_album_id)->latest()->paginate(20)
        ]);
    }
}
