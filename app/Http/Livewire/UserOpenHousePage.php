<?php

namespace App\Http\Livewire;

use App\Models\OpenHouseDate;
use App\Models\OpenHousePage;
use App\Models\OpenHouseSubscription;
use App\Models\Setting;
use Livewire\Component;

class UserOpenHousePage extends Component
{
    public $page;
    public $dates;
    public $setting;

    //Form fields
    public $email;
    public $firstname;
    public $lastname;

    public function mount()
    {
        $this->fetchPageData();
        $this->fetchOpenHouseDates();
        $this->fetchSettings();
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
           'email'     => 'required|email|max:255|unique:open_house_subscriptions,email',
           'firstname' => 'required|max:255',
           'lastname'  => 'required|max:255',
        ]);
    }

    public function save()
    {
        $this->validate([
            'email'     => 'required|email|max:255|unique:open_house_subscriptions,email',
            'firstname' => 'required|max:255',
            'lastname'  => 'required|max:255',
        ]);

        OpenHouseSubscription::create([
            'email'      => $this->email,
            'first_name' => $this->firstname,
            'last_name'  => $this->lastname,
        ]);

        $this->clear();
        return $this->emit('alert', ['type' => 'success', 'message' => 'Details submitted.']);
    }

    public function clear()
    {
        $this->email = '';
        $this->firstname = '';
        $this->lastname  = '';
    }




    public function fetchSettings()
    {
        $this->setting = Setting::latest()->first();
    }

    public function fetchPageData()
    {
        $this->page =  OpenHousePage::latest()->first();
    }

    public function fetchOpenHouseDates()
    {
        $this->dates = OpenHouseDate::latest()->get();
    }

    public function render()
    {
        return view('livewire.user.pages.user-open-house-page');
    }
}
