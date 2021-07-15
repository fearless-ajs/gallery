<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Setting;
use Livewire\Component;

class UserArticleViewPage extends Component
{
    public $article;
    public $setting;

    public function mount($id)
    {
        $this->fetchSettings();
        $this->fetchArticle($id);
    }

    public function fetchArticle($id)
    {
        $this->article = Article::findOrFail($id);
    }

    public function fetchSettings()
    {
        $this->setting = Setting::latest()->first();
    }


    public function render()
    {
        return view('livewire.user.pages.user-article-view-page');
    }
}
