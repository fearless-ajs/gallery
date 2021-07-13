<?php

namespace App\Http\Livewire;

use App\Models\Video;
use Livewire\Component;

class EditVideoPage extends Component
{
    public $name;
    public $details;
    public $link;

    public $video_id;

    public function mount($id)
    {
        $this->video_id = $id;
        $this->refresh();
    }

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

        Video::where('id', $this->video_id)->update([
            'name'    => $this->name,
            'details' => $this->details,
            'link'    => $this->link,
        ]);

        $this->refresh(); //Clears user inputs
        return $this->emit('alert', ['type' => 'success', 'message' => 'Video updated']);

    }

    public function refresh()
    {
        $video = Video::findOrFail($this->video_id);
        $this->name    = $video->name;
        $this->details = $video->details;
        $this->link    = $video->link;
    }
    public function render()
    {
        return view('livewire.admin.pages.edit-video-page');
    }
}
