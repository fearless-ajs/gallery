<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditArticlePage extends Component
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

    public $article_id;
    public $article;
    public $old_image_1;
    public $old_image_2;
    public $old_image_3;


    public function mount($id)
    {
        $this->article_id = $id;
        $this->refresh();
    }
    public function updated($field)
    {
        $this->validateOnly($field, [
            'title'     => 'required|max:255',
            'category'  => 'required|max:255',
            'author'    => 'required|max:255',
            'image_1'   => 'nullable|image|max:2000',
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
            'image_1'   => 'nullable|image|max:2000',
            'image_2'   => 'nullable|image|max:2000',
            'image_3'   => 'nullable|image|max:2000',
            'content_1' => 'required|max:4000',
            'quote'     => 'nullable|max:1000',
            'content_2' => 'nullable|max:4000',
        ]);

        if ($this->image_1){
            $this->deleteOldFile($this->article->image_1);
            $image_1 = $this->storeFile($this->image_1);
        }else{
            $image_1 = $this->article->image_1;
        }

        if ($this->image_2){
            //Check if exist the delete before save
            if ($this->article->image_2){
               $this->deleteOldFile($this->article->image_2);
            }
            $image_2 = $this->storeFile($this->image_2);

        }else{
            $image_2 = $this->article->image_2;
        }


        if ($this->image_3){
            //Check if exist the delete before save
            if ($this->article->image_3){
                $this->deleteOldFile($this->article->image_3);
            }
            $image_3 = $this->storeFile($this->image_3);

        }else{
            $image_3 = $this->article->image_3;
        }

        Article::where('id', $this->article_id)->update([
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

        return $this->emit('alert', ['type' => 'success', 'message' => 'Article update']);
    }

    public function removeImage($image_type, $filename)
    {
        Article::where('id', $this->article_id)->update([
            $image_type => '',
        ]);
        $this->deleteOldFile($filename);
        $this->emit('alert', ['type' => 'success', 'message' => 'Image Deleted']);
        $this->refresh();
    }

    protected function deleteOldFile($filename)
    {
        Storage::delete('/public/'.$filename);
    }

    public function refresh()
    {
        $article = Article::findOrFail($this->article_id);
        $this->article      = $article;
        $this->title        = $article->title;
        $this->category     = $article->category;
        $this->author       = $article->author;
        $this->old_image_1  = $article->Image1Path;
        $this->old_image_2  = $article->Image2Path;
        $this->old_image_3  = $article->Image3Path;
        $this->content_1    = $article->content_1;
        $this->quote        = $article->quote;
        $this->content_2    = $article->content_2;
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
        return view('livewire.admin.pages.edit-article-page');
    }
}
