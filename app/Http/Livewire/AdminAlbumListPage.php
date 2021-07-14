<?php

namespace App\Http\Livewire;

use App\Models\Album;
use App\Models\Picture;
use App\Models\SubAlbum;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class AdminAlbumListPage extends Component
{
    use WithPagination;

    public function delete($id)
    {
        $album = Album::findOrFail($id);
        //Check if it's content are just pictures
        if ($album->content == 'Pictures'){
            //Check if the album has content already
            if (Picture::where('album_id', $id)->first()){
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
            if (SubAlbum::where('album_id', $id)->first()){
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



    public function render()
    {
        return view('livewire.admin.pages.admin-album-list-page', [
            'albums' => Album::latest()->paginate(20)
        ]);
    }
}
