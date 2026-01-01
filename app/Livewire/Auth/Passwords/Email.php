<?php

namespace App\Livewire\Auth\Passwords;

use Livewire\Component;
use Illuminate\Support\Facades\Password;

class Email extends Component
{
    public $email;

    public function sendResetLink()
    {
        $this->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink(['email' => $this->email]);
        session()->flash('status', __(Password::RESET_LINK_SENT));
    }

    public function render()
    {
        return view('livewire.auth.passwords.email')->layout('layouts.user');
    }
}
