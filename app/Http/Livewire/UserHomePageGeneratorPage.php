<?php

namespace App\Http\Livewire;

use App\Models\HomePage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserHomePageGeneratorPage extends Component
{
    use WithFileUploads;

    public $caption;
    public $title;
    public $content;
    public $image;
    public $old_image;

    public $homepage;

    public function mount()
    {
        $this->refresh();
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
           'caption' => 'nullable|max:255',
           'image'   => 'nullable|max:6000',
           'title'   => 'nullable|max:255',
           'content' => 'nullable|max:5000',
        ]);
    }

    public function save()
    {
        $this->validate([
            'caption' => 'nullable|max:255',
            'image'   => 'nullable|max:6000',
            'title'   => 'nullable|max:255',
            'content' => 'nullable|max:5000',
        ]);


        $page =  HomePage::latest()->first();
        if ($this->image){
            //Check if there's is an existing image
            if ($page->image){
                $this->deleteOldFile($page->image);
                $image = $this->storeFile();
            }else{
                $image = $this->storeFile();
            }

        }else{
            if ($page->image){
                $image = $page->image;
            }else{
                $image = '';
            }
        }

        if (HomePage::latest()->first()){
            HomePage::latest()->update([
                'caption' => $this->caption,
                'image'   => $image,
                'title'   => $this->title,
                'content' => $this->content,
            ]);

            return $this->emit('alert', ['type' => 'success', 'message' => 'Homepage Updated']);
        }

        HomePage::create([
            'caption' => $this->caption,
            'image'   => $image,
            'title'   => $this->title,
            'content' => $this->content,
        ]);
        return $this->emit('alert', ['type' => 'success', 'message' => 'Homepage Updated']);
    }

    protected function deleteOldFile($filename){
        Storage::delete('/public/'.$filename);
    }

    public function storeFile()
    {
        $img = ImageManagerStatic::make($this->image)->encode('jpg');
        $original_filename = $this->image->getClientOriginalName();
        $name = time() .Str::random(50).'_'.$original_filename;
        Storage::disk('public')->put($name, $img);
        return $name;
    }

    public function removeImage()
    {
        $this->deleteOldFile($this->homepage->image);
        HomePage::latest()->update([
            'image'   => '',
        ]);
        $this->refresh();
        return $this->emit('alert', ['type' => 'success', 'message' => 'Background image removed']);

    }

    public function refresh()
    {
        $homepage = HomePage::latest()->first();
        if ($homepage){
            $this->homepage = $homepage;
            $this->caption   = $homepage->caption;
            $this->old_image = $homepage->ImagePath;
            $this->title     = $homepage->title;
            $this->content   = $homepage->content;
        }
    }

    public function render()
    {
        return view('livewire.admin.pages.user-home-page-generator-page');
    }
}
