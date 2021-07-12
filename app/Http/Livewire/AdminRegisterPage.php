<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class AdminRegisterPage extends Component
{
    public $name;
    public $email;
    public $password;
    public $c_password;

    public function updated($field)
    {
        $this->validateOnly($field, [
           'name'       => 'required|max:255',
           'email'      => 'required|email|max:255|unique:users,email',
           'password'   => 'required|min:6|max:255',
           'c_password' => 'min:6|required_with:password|same:password',
        ]);
    }

    public function save()
    {
        $this->validate([
            'name'       => 'required|max:255',
            'email'      => 'required|email|max:255|unique:users,email',
            'password'   =>  'required|min:6|max:255',
            'c_password' => 'min:6|required_with:password|same:password',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);
        $user->attachRole('administrator');

        $this->clear(); //To clean user inputs
        return $this->emit('alert', ['type' => 'success', 'message' => 'Admin Created']);

    }

    public function clear()
    {
        $this->name       = '';
        $this->email      = '';
        $this->password   = '';
        $this->c_password = '';
    }

    public function render()
    {
        return view('livewire.admin.pages.admin-register-page');
    }
}
