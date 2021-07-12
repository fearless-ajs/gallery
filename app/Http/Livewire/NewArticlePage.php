<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewArticlePage extends Component
{
    use WithFileUploads;

    public $title;
    public $category;
    public $author;
    public $image_1;
    public $image_2;
    public $image_3;
    public $quote;
    public $content_1;
    public $content_2;


    public function updated($field)
    {
        $this->validateOnly($field, [
           'title'     => 'required|max:255',
           'category'  => 'required|max:255',
           'author'    => 'required|max:255',
           'image_1'   => 'required|image|max:2000',
           'image_2'   => 'nullable|image|max:2000',
           'image_3'   => 'nullable|image|max:2000',
           'content_1' => 'required|max:4000',
           'quote'     => 'nullable|max:1000',
           'content_2' => 'nullable|max:4000',
        ]);
    }

    public function save()
    {
        $this->validate([
            'title'     => 'required|max:255',
            'category'  => 'required|max:255',
            'author'    => 'required|max:255',
            'image_1'   => 'required|image|max:2000',
            'image_2'   => 'nullable|image|max:2000',
            'image_3'   => 'nullable|image|max:2000',
            'content_1' => 'required|max:4000',
            'quote'     => 'nullable|max:1000',
            'content_2' => 'nullable|max:4000',
        ]);

        $image_1 = $this->storeFile($this->image_1);
        if ($this->image_2){
            $image_2 = $this->storeFile($this->image_2);
        }else{
            $image_2 = null;
        }
        if ($this->image_3){
            $image_3 = $this->storeFile($this->image_3);
        }else{
            $image_3 = null;
        }

        Article::create([
            'title'     => $this->title,
            'category'  => $this->category,
            'author'    => $this->author,
            'image_1'   => $image_1,
            'image_2'   => $image_2,
            'image_3'   => $image_3,
            'content_1' => $this->content_1,
            'quote'     => $this->quote,
            'content_2' => $this->content_2,
        ]);

        $this->clear(); //Clears user inputs
        return $this->emit('alert', ['type' => 'success', 'message' => 'Article published']);

    }

    public function clear()
    {
        $this->title        = '';
        $this->category     = '';
        $this->author       = '';
        $this->image_1      = '';
        $this->image_2      = '';
        $this->image_3      = '';
        $this->content_1    = '';
        $this->quote        = '';
        $this->content_2    = '';
    }

    public function storeFile($file)
    {
        $img = ImageManagerStatic::make($file)->encode('jpg');
        $original_filename = $file->getClientOriginalName();
        $name = time() .Str::random(50).'_'.$original_filename;
        Storage::disk('public')->put($name, $img);
        return $name;
    }

    public function render()
    {
        return view('livewire.admin.pages.new-article-page');
    }
}
