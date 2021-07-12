<?php

namespace App\Http\Livewire;

use App\Models\OpenHouseDate;
use Livewire\Component;

class AdminOpenHouseDatePage extends Component
{
    public $dates;

    public $date;
    public $time;
    public $date_id;

    protected $listeners = ['refreshDates' => 'refresh'];


    public function mount()
    {
        $this->refresh();
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'date' => 'required|max:255',
            'time' => 'required|max:255',
        ]);
    }

    public function save()
    {
        if(!$this->date_id){
            return $this->emit('alert', ['type' => 'error', 'message' => 'Please select a date']);
        }

        $this->validate([
            'date' => 'required|max:255',
            'time' => 'required|max:255',
        ]);

        OpenHouseDate::where('id', $this->date_id)->update([
           'date' => $this->date,
           'time' => $this->time,
           'timestamp' => date(strtotime("$this->date $this->time")),
        ]);

        $this->refresh();
        return $this->emit('alert', ['type' => 'success', 'message' => 'Date Updated']);
    }

    public function refresh()
    {
        $this->dates = OpenHouseDate::latest()->get();
    }

    public function remove($id){
        OpenHouseDate::where('id', $id)->delete();
        $this->emit('alert', ['type' => 'success', 'message' => 'Date deleted']);
        $this->refresh();
    }

    public function edit($id){
        $date = OpenHouseDate::findOrFail($id);
        $this->date_id = $date->id;
        $this->date    = $date->date;
        $this->time    = $date->time;
    }
    public function render()
    {
        return view('livewire.admin.pages.admin-open-house-date-page');
    }
}
