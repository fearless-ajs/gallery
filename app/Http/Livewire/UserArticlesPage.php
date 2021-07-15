<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class UserArticlesPage extends Component
{
    use WithPagination;

    public $setting;

    public function mount()
    {
        $this->fetchSettings();
    }

    public function fetchSettings()
    {
        $this->setting = Setting::latest()->first();
    }

    public function render()
    {
        return view('livewire.user.pages.user-articles-page', [
            'articles' => Article::latest()->paginate(15)
        ]);
    }
}
