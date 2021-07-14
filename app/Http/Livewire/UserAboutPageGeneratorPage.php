<?php

namespace App\Http\Livewire;

use App\Models\AboutPage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserAboutPageGeneratorPage extends Component
{
    use WithFileUploads;

    public $old_image;
    public $image;
    public $title;
    public $content;

    public function mount()
    {
        $this->refresh();
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'image'   => 'nullable|max:6000',
            'title'   => 'nullable|max:255',
            'content' => 'nullable|max:5000',
        ]);
    }

    public function save()
    {
        $this->validate([
            'image'   => 'nullable|max:6000',
            'title'   => 'nullable|max:255',
            'content' => 'nullable|max:5000',
        ]);

        if (AboutPage::latest()->first()){
            //Process Image Upload
            $page =  AboutPage::latest()->first();
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
                    $image = ''; $image = '';
                }
            }

            AboutPage::latest()->update([
                'image'   => $image,
                'title'   => $this->title,
                'content' => $this->content,
            ]);

            return $this->emit('alert', ['type' => 'success', 'message' => 'About page Updated']);
        }

        //Process Image Upload
        $image = $this->storeFile();
        AboutPage::create([
            'image'   => $image,
            'title'   => $this->title,
            'content' => $this->content,
        ]);
        return $this->emit('alert', ['type' => 'success', 'message' => 'About page Updated']);
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

    public function refresh()
    {
        $page = AboutPage::latest()->first();
        if ($page){
            $this->old_image   = $page->ImagePath;
            $this->title   = $page->title;
            $this->content = $page->content;
        }
    }

    public function render()
    {
        return view('livewire.admin.pages.user-about-page-generator-page');
    }
}
