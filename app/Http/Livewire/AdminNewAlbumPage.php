<?php

namespace App\Http\Livewire;

use App\Models\Album;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminNewAlbumPage extends Component
{
    use WithFileUploads;

    public $title;
    public $details;
    public $content;
    public $image;

    public function updated($field)
    {
        $this->validateOnly($field, [
           'title'   => 'required|max:255',
           'details' => 'required|max:1000',
           'content' => 'required|max:255',
           'image'   => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }

    public function save()
    {
        $this->validate([
            'title'   => 'required|max:255',
            'details' => 'required|max:1000',
            'content' => 'required|max:255',
            'image'   => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //Store the image and return the name
        $image = $this->storeFile($this->image);

        Album::create([
            'title'   => $this->title,
            'details' => $this->details,
            'content' => $this->content,
            'image'   => $image
        ]);

        $this->clear(); //clear user inputs
        return $this->emit('alert', ['type' => 'success', 'message' => 'Album created!']);
    }

    public function storeFile($file)
    {
        $img = ImageManagerStatic::make($file)->encode('jpg', 5);
        $original_filename = $file->getClientOriginalName();
        $name = time() .Str::random(50).'_'.$original_filename;
        Storage::disk('public')->put($name, $img);
        return $name;
    }

    public function clear()
    {
        $this->title    = '';
        $this->details  = '';
        $this->content  = '';
        $this->image    = '';
    }

    public function render()
    {
        return view('livewire.admin.pages.admin-new-album-page');
    }
}
