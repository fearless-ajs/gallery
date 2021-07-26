<?php

namespace App\Http\Livewire;

use App\Models\Picture;
use App\Models\SubPicture;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddPictureToSubAlbum extends Component
{
    use WithFileUploads;

    public $caption;
    public $image;
    public $images = [];
    public $album_id;

    public function mount($album_id)
    {
        $this->album_id = $album_id;
    }


    public function updated($field)
    {
        $this->validateOnly($field, [
            'images.*'  => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
            'caption'   =>   'nullable|max:255',
        ]);
    }


    public function removeImg($index)
    {
        array_splice($this->images, $index, 1);
    }


    public function save()
    {
        if (empty($this->images)){
            return $this->emit( 'alert', ['type' => 'error', 'message' => 'Please select at least one image!']);
        }
        $this->validate([
            'images.*'  => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
            'caption'   =>   'nullable|max:255',
        ]);


        foreach ($this->images as $pic){
            $original_image     = $this->storeFile($pic);
            // create a compressed version of the image
            $compressed_version = $this->compressAndStoreFile($pic, 2);


            SubPicture::create([
                'sub_album_id'    => $this->album_id,
                'caption'         => $this->caption,
                'original_image'  => $original_image,
                'optimized_image' => $compressed_version
            ]);
        }


        $this->clear();
        return $this->emit('alert', ['type' => 'success', 'message' => 'Picture Added to album!']);
    }

    public function clear()
    {
        $this->caption = '';
        $this->images   = '';
    }

    public function storeFile($file)
    {
        $img = ImageManagerStatic::make($file)->encode('jpg');
        $original_filename = $file->getClientOriginalName();
        $name = time() .Str::random(50).'_'.$original_filename;
        Storage::disk('public')->put($name, $img);
        return $name;
    }

    public function compressAndStoreFile($file, $quality)
    {
        $img = ImageManagerStatic::make($file)->encode('jpg', $quality);
        $original_filename = $file->getClientOriginalName();
        $name = time() .Str::random(50).'_'.$original_filename;
        Storage::disk('thumbnail')->put($name, $img);
        return $name;
    }

    public function render()
    {
        return view('livewire.admin.components.add-picture-to-sub-album');
    }
}
