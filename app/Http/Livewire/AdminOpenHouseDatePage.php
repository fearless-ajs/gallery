<?php

namespace App\Http\Livewire;

use App\Models\OpenHouseDate;
use Livewire\Component;

class AdminOpenHouseDatePage extends Component
{
    public $dates;

    public $start_date;
    public $start_time;
    public $end_date;
    public $end_time;
    public $date_id;

    protected $listeners = ['refreshDates' => 'refresh'];


    public function mount()
    {
        $this->refresh();
    }

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
        if(!$this->date_id){
            return $this->emit('alert', ['type' => 'error', 'message' => 'Please select a date']);
        }

        $this->validate([
            'start_date' => 'required|max:255',
            'start_time' => 'required|max:255',
            'end_date'   => 'required|max:255',
            'end_time'   => 'required|max:255',
        ]);

        if (date(strtotime("$this->start_date $this->start_time")) > date(strtotime("$this->end_date $this->end_time"))){
            return $this->emit('alert', ['type' => 'error', 'message' => 'End date must be greater than or equals start date']);
        }

        OpenHouseDate::where('id', $this->date_id)->update([
            'start_date'      => $this->start_date,
            'start_time'      => $this->start_time,
            'start_timestamp' => date(strtotime("$this->start_date $this->start_time")),
            'end_date'        => $this->end_date,
            'end_time'        => $this->end_time,
            'end_timestamp'   => date(strtotime("$this->end_date $this->end_time")),
        ]);

        $this->refresh();
        return $this->emit('alert', ['type' => 'success', 'message' => 'Date Updated']);
    }

    public function refresh()
    {
        $this->dates = OpenHouseDate::latest()->get();
    }

    public function remove($id){
        OpenHouseDate::findOrFail($id)->delete();
        $this->emit('alert', ['type' => 'success', 'message' => 'Date deleted']);
        return $this->refresh();
    }

    public function edit($id){
        $date = OpenHouseDate::findOrFail($id);
        $this->date_id = $date->id;
        $this->start_date    = $date->start_date;
        $this->start_time    = $date->start_time;
        $this->end_date      = $date->end_date;
        $this->end_time      = $date->end_time;
    }
    public function render()
    {
        return view('livewire.admin.pages.admin-open-house-date-page');
    }
}
