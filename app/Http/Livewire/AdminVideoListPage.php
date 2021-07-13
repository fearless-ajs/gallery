<?php

namespace App\Http\Livewire;

use App\Models\Video;
use Livewire\Component;
use Livewire\WithPagination;

class AdminVideoListPage extends Component
{
    use WithPagination;

    public function delete($id){
        Video::find($id)->delete();
        return $this->emit('alert', ['type' => 'success', 'message' => 'Video deleted']);
    }

    public function render()
    {
        return view('livewire.admin.pages.admin-video-list-page', [
            'videos' => Video::latest()->paginate(20)
        ]);
    }
}

