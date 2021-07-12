<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminLoginPage extends Component
{
    public $email;
    public $password;

    public function updated($feild)
    {
        $this->validateOnly($feild, [
           'email' => 'required|email|max:255',
           'password' => 'required|max:255',
        ]);
    }

    public function login ()
    {
        $this->validate([
            'email'  => 'required|email|max:255',
            'password' => 'required|max:255',
        ]);

        if(Auth::attempt(['email' => $this->email, 'password' => $this->password]))
        {
            return redirect()->intended('/dashboard');
        }

       return $this->emit('alert', ['type' => 'error', 'message' => 'invalid credentials.']);

    }

    public function render()
    {
        return view('livewire.admin.pages.admin-login-page');
    }
}
