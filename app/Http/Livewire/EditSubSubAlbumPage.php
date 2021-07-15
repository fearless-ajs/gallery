<?php

namespace App\Http\Livewire;

use App\Models\SubAlbum;
use App\Models\SubSubAlbum;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditSubSubAlbumPage extends Component
{
    use WithFileUploads;

    public $title;
    public $details;
    public $content;
    public $image;
    public $old_image;

    public $album_id;
    public $album;

    public function mount($id)
    {
        $this->album_id = $id;
        $this->refresh();
    }


    public function updated($field)
    {
        $this->validateOnly($field, [
            'title'   => 'required|max:255',
            'details' => 'required|max:1000',
            'image'   => 'nullable|image|max:500',
        ]);
    }

    public function save()
    {
        $this->validate([
            'title'   => 'required|max:255',
            'details' => 'required|max:1000',
            'image'   => 'nullable|image|max:500',
        ]);

        //Store the image and return the name
        if ($this->image){
            //Delete old file
            $this->deleteOldFile($this->album->image);
            //Save the new file
            $image = $this->storeFile($this->image);
        }else{
            $image = $this->album->image;
        }

        SubSubAlbum::where('id', $this->album_id)->update([
            'title'   => $this->title,
            'details' => $this->details,
            'image'   => $image
        ]);

        $this->refresh(); //clear user inputs
        return $this->emit('alert', ['type' => 'success', 'message' => 'Album updated!']);
    }

    public function storeFile($file)
    {
        $img = ImageManagerStatic::make($file)->encode('jpg', 2);
        $original_filename = $file->getClientOriginalName();
        $name = time() .Str::random(50).'_'.$original_filename;
        Storage::disk('public')->put($name, $img);
        return $name;
    }

    protected function deleteOldFile($filename)
    {
        Storage::delete('/public/'.$filename);
    }

    public function refresh()
    {
        $album = SubSubAlbum::findOrFail($this->album_id);
        if ($album){
            $this->album     = $album;
            $this->title     = $album->title;
            $this->details   = $album->details;
            $this->content   = $album->content;
            $this->old_image = $album->ImagePath;
        }
    }

    public function render()
    {
        return view('livewire.admin.pages.edit-sub-sub-album-page');
    }
}
