<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminSettingsPage extends Component
{
    public $domain;
    public $app_name;
    public $email;
    public $facebook;
    public $instagram;

    public function mount()
    {
      $this->refresh();
    }
    public function updated($field)
    {
        $this->validateOnly($field, [
           'domain'    => 'nullable|max:255',
           'app_name'   => 'required|max:255',
           'email'     => 'nullable|email|max:255',
           'facebook'  => 'nullable|max:255',
           'instagram' => 'nullable|max:255'
        ]);
    }

    public function save()
    {
        $this->validate([
            'domain'    => 'nullable|max:255',
            'app_name'   => 'required|max:255',
            'email'     => 'nullable|email|max:255',
            'facebook'  => 'nullable|max:255',
            'instagram' => 'nullable|max:255'
        ]);

        if (Setting::latest()->first()){
          Setting::latest()->update([
              'domain'    => $this->domain,
              'app_name'  => $this->app_name,
              'email'     => $this->email,
              'facebook'  => $this->facebook,
              'instagram' => $this->instagram
          ]);
          return $this->emit('alert', ['type' => 'success', 'message' => 'Settings Updated']);
        }

        Setting::create([
            'user_id'   => Auth::user()->id,
            'domain'    => $this->domain,
            'app_name'  => $this->app_name,
            'email'     => $this->email,
            'facebook'  => $this->facebook,
            'instagram' => $this->instagram
        ]);
        return $this->emit('alert', ['type' => 'success', 'message' => 'Settings Updated']);

    }

    public function refresh()
    {
        $setting          = Setting::latest()->first();
        $this->domain     = $setting->domain;
        $this->app_name   = $setting->app_name;
        $this->email      = $setting->email;
        $this->facebook   = $setting->facebook;
        $this->instagram  = $setting->instagram;
    }

    public function render()
    {
        return view('livewire.admin.pages.admin-settings-page');
    }
}
