<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleListPage extends Component
{
    use WithPagination;

    public function delete($article_id)
    {
        $article = Article::findOrFail($article_id);
        if ($article){
            //Delete all the images
            $this->deleteOldFile($article->image_1);
            $this->deleteOldFile($article->image_2);
            $this->deleteOldFile($article->image_2);

            //Delete the record from database
            Article::where('id', $article_id)->delete();
            return $this->emit('alert', ['type' => 'success', 'message' => 'Article deleted']);
        }

    }

    protected function deleteOldFile($filename)
    {
        try {
            Storage::delete('/public/'.$filename);
        }catch (\Exception $err){

        }
    }


    public function render()
    {
        return view('livewire.admin.pages.article-list-page', [
            'articles' => Article::latest()->paginate(20)
        ]);
    }
}
