<?php

namespace App\Http\Livewire;

use App\Mail\AccountUpdateEmail;
use App\Mail\PasswordTokenEmail;
use App\Models\PasswordReset as PassReset;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;

class PasswordReset extends Component
{

    /*
    | Properties needed for user validation
    | And new password update
    */
    public $email;
    public $token;
    public $password;
    public $password_confirmation;

    public $setting;

    /*
    | Password reset forms display toggle
    */
    public $showResetForm  = true;
    public $showTokenForm  = false;
    public $showChoosePass = false;


    public function mount()
    {
        $this->setting = Setting::latest()->first();
    }
    /*
    | Displays password reset form
    |
    | Opens first before others
    */
    public function showResetForm()
    {
        $this->showResetForm  = true;
        $this->showTokenForm  = false;
        $this->showChoosePass = false;
    }

    /*
    | Displays token form
    */
    public function showTokenForm()
    {
        $this->showResetForm  = false;
        $this->showTokenForm  = true;
        $this->showChoosePass = false;
    }

    /*
    | Displays new password form
    */
    public function showChoosePass()
    {
        $this->showResetForm  = false;
        $this->showTokenForm  = false;
        $this->showChoosePass = true;
    }

    /*
    | Realtime form validation method
    */
    public function updated($field)
    {
        $this->validateOnly
        ($field,[
            'email' => 'required|email|max:255',
        ]);
    }

    /*
     | Updates existing user password reset token
     */
    public function updateToken()
    {
        //fetch user information
        $userData = User::where('email', $this->email)->first();

        //Generate new reset token
        $code = Str::random(10);

        //Updates existing reset token
        PassReset::where('email', $this->email)->update([
            'token' => $code,
        ]);


        //Email Information
        $data = [
            'email' => $this->email,
            'token' => $code,
            'name'  => $userData->name,
            'app_name' => $this->setting->app_name
        ];

        Mail::to($this->email)->send(new PasswordTokenEmail($data));

        //Success message
        session()->flash('message', 'Reset token sent.');

        //Display token form
        $this->showTokenForm();

    }

    /*
    | Add new user password reset token
    */
    public function newToken()
    {

        //fetch user information
        $userData = User::where('email', $this->email)->first();

        //Generate new reset token
        $code = Str::random(10);

        //Add new user password reset token to database
        PassReset::create([
            'email' => $this->email,
            'token' => $code, //generates random
        ]);
        $data = [
            'email' => $this->email,
            'token' => $code,
            'name'  => $userData->name,
            'app_name' => $this->setting->app_name,
            'site_email' => $this->setting->email
        ];
        Mail::to($this->email)->send(new PasswordTokenEmail($data));

        //Success message
        session()->flash('message', 'Reset token sent.');

        //Display token form
        $this->showTokenForm();



    }

    /*
    | Generates user password reset token
    */
    public function getCode()
    {

        //Validates user input before processing
        $this->validate
        ([
            'email' => 'required|email|max:255',
        ]);

        //check if the user exists
        if(User::where('email', $this->email)->first())
        {

            //check for existing tokens
            if(PassReset::where('email', $this->email)->first()) {return $this->updateToken();}

            //If no previous toke found
            return $this->newToken();

        }

        //Error message in session
        session()->flash('error', 'User not found!');

        //Error message in toastr
        $this->emit('alert', ['type' => 'error', 'message' => 'User not found!']);

        //Return statement to destroy the process
        return false;

    }

    /*
    | Verifies user supplied token
    */
    public function verifyToken()
    {

        //Checks if token field is empty
        $this->validate([
            'token' => 'required|max:12',
        ]);

        //Verify token along with email
        if (PassReset::where(['token' => $this->token, 'email' => $this->email])->first())
        {

            // Deletes the old token
            PassReset::where(['token' => $this->token, 'email' => $this->email])->delete();

            // Success Message for the user about validation status
            session()->flash('message', 'New password!.');

            // Display the change password form
            return $this->showChoosePass();

        }

        // Error Message for the user about validation status
        session()->flash('error', 'Invalid token, try again!.');
        return false;

    }

    /*
    | Updates new user password
    */
    public function updatePass()
    {

        // Gets user information
        $userData = User::where('email', $this->email)->first();

        // Validates new password
        $this->validate([
            'password'              => 'required|min:6',
            'password_confirmation' => 'min:6|required_with:password|same:password',
        ]);

        // Updates the password field of the particular user
        User::where('email', $this->email)->update([
            'password' => Hash::make($this->password),
        ]);

        // Mails user concerning the update
        $data = [
            'email' => $this->email,
            'name'  => $userData->name,
            'app_name' => $this->setting->app_name,
            'site_email' => $this->setting->email
        ];
        Mail::to($this->email)->send(new AccountUpdateEmail($data));

        //Success Message for the user
        session()->flash('message', 'Password Updated!');

        //Redirects back to login
        redirect()->route('login');
    }

    /*
    | Renders the livewire component to the browser
    */
    public function render()
    {
        return view('livewire.admin.pages.password-reset');
    }
}
