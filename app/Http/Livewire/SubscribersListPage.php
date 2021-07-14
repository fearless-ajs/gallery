<?php

namespace App\Http\Livewire;

use App\Models\Subscriber;
use Livewire\Component;
use Livewire\WithPagination;

class SubscribersListPage extends Component
{
    use WithPagination;

    public function delete($id)
    {
        Subscriber::findOrFail($id)->delete();
        return $this->emit('alert', ['type' => 'success', 'message' => 'Subscriber removed!']);
    }

    public function render()
    {
        return view('livewire.admin.pages.subscribers-list-page', [
            'subscribers' => Subscriber::latest()->paginate(20)
        ]);
    }
}
