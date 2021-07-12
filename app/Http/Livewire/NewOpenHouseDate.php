<?php

namespace App\Http\Livewire;

use App\Models\OpenHouseDate;
use Livewire\Component;

class NewOpenHouseDate extends Component
{
    public $date;
    public $time;

    public function updated($field)
    {
        $this->validateOnly($field, [
           'date' => 'required|max:255',
           'time' => 'required|max:255',
        ]);
    }

    public function save()
    {
        $this->validate([
            'date' => 'required|max:255',
            'time' => 'required|max:255',
        ]);

        OpenHouseDate::create([
            'date'      => $this->date,
            'time'      => $this->time,
            'timestamp' => date(strtotime("$this->date $this->time")),
        ]);

        $this->clear(); //Clear user inputs
        $this->emit('refreshDates'); //Fires the event to refresh the dates list
        return $this->emit('alert', ['type' => 'success', 'message' => 'New date added']);

    }

    public function clear()
    {
        $this->date = '';
        $this->time = '';
    }

    public function render()
    {
        return view('livewire.admin.components.new-open-house-date');
    }
}
