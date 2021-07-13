<?php

namespace App\Http\Livewire;

use App\Models\Video;
use Livewire\Component;

class AdminNewVideoPage extends Component
{
    public $name;
    public $details;
    public $link;

    public function updated($field)
    {
        $this->validateOnly($field, [
           'name'    => 'required|max:255',
           'details' => 'required|max:2000',
           'link'    => 'required|max:2000',
        ]);
    }

    public function save()
    {
        $this->validate([
            'name'    => 'required|max:255',
            'details' => 'required|max:2000',
            'link'    => 'required|max:2000',
        ]);

        Video::create([
            'name'    => $this->name,
            'details' => $this->details,
            'link'    => $this->link,
        ]);

        $this->clear(); //Clears user inputs
        return $this->emit('alert', ['type' => 'success', 'message' => 'Video published']);

    }

    public function clear()
    {
        $this->name     = '';
        $this->details  = '';
        $this->link     = '';
    }

    public function render()
    {
        return view('livewire.admin.pages.admin-new-video-page');
    }
}
