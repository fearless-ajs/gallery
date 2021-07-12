<?php

namespace App\Http\Livewire;

use App\Models\HomePage;
use Livewire\Component;

class UserHomePageGeneratorPage extends Component
{
    public $caption;
    public $title;
    public $content;

    public function mount()
    {
        $this->refresh();
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
           'caption' => 'nullable|max:255',
           'title'   => 'nullable|max:255',
           'content' => 'nullable|max:5000',
        ]);
    }

    public function save()
    {
        $this->validate([
            'caption' => 'nullable|max:255',
            'title'   => 'nullable|max:255',
            'content' => 'nullable|max:5000',
        ]);

        if (HomePage::latest()->first()){
            HomePage::latest()->update([
                'caption' => $this->caption,
                'title'   => $this->title,
                'content' => $this->content,
            ]);

            return $this->emit('alert', ['type' => 'success', 'message' => 'Homepage Updated']);
        }

        HomePage::create([
            'caption' => $this->caption,
            'title'   => $this->title,
            'content' => $this->content,
        ]);
        return $this->emit('alert', ['type' => 'success', 'message' => 'Homepage Updated']);
    }

    public function refresh()
    {
        $homepage = HomePage::latest()->first();
        if ($homepage){
            $this->caption = $homepage->caption;
            $this->title   = $homepage->title;
            $this->content = $homepage->content;
        }
    }

    public function render()
    {
        return view('livewire.admin.pages.user-home-page-generator-page');
    }
}
