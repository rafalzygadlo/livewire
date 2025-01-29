<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User\UserStatus;
use Auth;


class Login extends Component
{

    public $email = "demo";
    public $password ="demo";
    
    public function login()
    {
        $true = Auth::guard()->attempt(['status' => UserStatus::$active, 'email' => $this->email, 'password' => $this->password]);
        
        if($true)
        {
            return redirect()->intended('/profile');    
        }
        
        $this->addError('email','Email falsch oder passwort');
        $this->addError('password','Password falsch');
        $this->addError('status','Status maybe falsch');
    }

    public function logout()
    {
        Auth::guard()->logout();
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.user');
    }

}
