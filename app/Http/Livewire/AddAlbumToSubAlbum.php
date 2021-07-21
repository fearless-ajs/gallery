<?php

namespace App\Http\Livewire;

use App\Models\SubAlbum;
use App\Models\SubSubAlbum;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddAlbumToSubAlbum extends Component
{
    use WithFileUploads;

    public $title;
    public $details;
    public $image;

    public $album_id;


    public function mount($id)
    {
        $this->album_id = $id;
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'title'   => 'required|max:255',
            'details' => 'required|max:1000',
            'image'   => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }

    public function save()
    {
        $this->validate([
            'title'   => 'required|max:255',
            'details' => 'required|max:1000',
            'image'   => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //Store the image and return the name
        $image = $this->storeFile($this->image);

        SubSubAlbum::create([
            'sub_album_id' => $this->album_id,
            'title'        => $this->title,
            'details'      => $this->details,
            'image'        => $image
        ]);

        $this->clear(); //clear user inputs
        return $this->emit('alert', ['type' => 'success', 'message' => 'Album created!']);
    }

    public function storeFile($file)
    {
        $img = ImageManagerStatic::make($file)->encode('jpg', 2);
        $original_filename = $file->getClientOriginalName();
        $name = time() .Str::random(50).'_'.$original_filename;
        Storage::disk('public')->put($name, $img);
        return $name;
    }

    public function clear()
    {
        $this->title    = '';
        $this->details  = '';
        $this->image    = '';
        $this->content  = '';
    }

    public function render()
    {
        return view('livewire.admin.components.add-album-to-sub-album');
    }
}
