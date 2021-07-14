<?php

namespace App\Http\Livewire;

use App\Models\Album;
use App\Models\SubAlbum;
use App\Models\SubPicture;
use App\Models\SubSubAlbum;
use Illuminate\Support\Facades\Storage;
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


    public function delete($id)
    {
        $album = SubAlbum::findOrFail($id);
        //Check if it's content are just pictures
        if ($album->content == 'Pictures'){
            //Check if the album has content already
            if (SubPicture::where('sub_album_id', $id)->first()){
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

        if ($album->content == 'Albums'){
            //Check if the album has content already
            if (SubSubAlbum::where('sub_album_id', $id)->first()){
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
    }

    protected function deleteOldFile($filename){
        Storage::delete('/public/'.$filename);
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
