<?php

namespace App\Http\Livewire;

use App\Models\Picture;
use App\Models\SubAlbum;
use App\Models\SubPicture;
use App\Models\SubSubAlbum;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditSubAlbumPage extends Component
{
    use WithFileUploads;

    public $title;
    public $details;
    public $content;
    public $image;
    public $old_image;

    public $album_id;
    public $album;

    public $contentStatus;

    public function mount($id)
    {
        $this->album_id = $id;
        $this->refresh();
        $this->checkContentStatus();
    }

    public function checkContentStatus()
    {
        $pictures  = SubPicture::where('sub_album_id', $this->album_id)->count();
        $sub_album = SubSubAlbum::where('sub_album_id', $this->album_id)->count();

        if ($pictures > 0 || $sub_album > 0){
            $this->contentStatus = 'Filled';
        }
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'title'   => 'required|max:255',
            'details' => 'required|max:1000',
            'content' => 'required|max:255',
            'image'   => 'nullable|image|max:500',
        ]);
    }

    public function save()
    {
        $this->validate([
            'title'   => 'required|max:255',
            'details' => 'required|max:1000',
            'content' => 'required|max:255',
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

        SubAlbum::where('id', $this->album_id)->update([
            'title'   => $this->title,
            'details' => $this->details,
            'content' => $this->content,
            'image'   => $image
        ]);

        $this->refresh(); //clear user inputs
        return $this->emit('alert', ['type' => 'success', 'message' => 'Album updated!']);
    }

    public function storeFile($file)
    {
        $img = ImageManagerStatic::make($file)->encode('jpg');
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
        $album = SubAlbum::findOrFail($this->album_id);
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
        return view('livewire.admin.pages.edit-sub-album-page');
    }
}
