<?php

namespace App\Http\Livewire;

use App\Models\OpenHouseDate;
use Livewire\Component;

class NewOpenHouseDate extends Component
{
    public $start_date;
    public $start_time;
    public $end_date;
    public $end_time;

    public function updated($field)
    {
        $this->validateOnly($field, [
           'start_date' => 'required|max:255',
           'start_time' => 'required|max:255',
           'end_date'   => 'required|max:255',
           'end_time'   => 'required|max:255',
        ]);
    }

    public function save()
    {
        $this->validate([
            'start_date' => 'required|max:255',
            'start_time' => 'required|max:255',
            'end_date'   => 'required|max:255',
            'end_time'   => 'required|max:255',
        ]);

        //Check for bad date formatting
        if (date(strtotime("$this->start_date $this->start_time")) > date(strtotime("$this->end_date $this->end_time"))){
            return $this->emit('alert', ['type' => 'error', 'message' => 'End date must be greater than or equals start date']);
        }

        OpenHouseDate::create([
            'start_date'      => $this->start_date,
            'start_time'      => $this->start_time,
            'start_timestamp' => date(strtotime("$this->start_date $this->start_time")),
            'end_date'        => $this->end_date,
            'end_time'        => $this->end_time,
            'end_timestamp'   => date(strtotime("$this->end_date $this->end_time")),
        ]);

        $this->clear(); //Clear user inputs
        $this->emit('refreshDates'); //Fires the event to refresh the dates list
        return $this->emit('alert', ['type' => 'success', 'message' => 'New date added']);

    }

    public function clear()
    {
       $this->start_time = '';
       $this->start_date = '';
       $this->end_time   = '';
       $this->end_date   = '';
    }

    public function render()
    {
        return view('livewire.admin.components.new-open-house-date');
    }
}
