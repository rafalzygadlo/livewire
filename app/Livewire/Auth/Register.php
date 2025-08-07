<?php
namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Register extends Component
{
    public $email; 
    public $password;
    public $password_confirmation;
    public $company_name;

    protected $rules = [
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
        'company_name' => 'required|min:3',
    ];

    public function register()
    {
        $this->validate();

        $company = Company::create([
            'name' => $this->company_name,
        ]);

        $user = User::create([
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'company_id' => $company->id,
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.auth.register')->layout('layouts.user');
    }
}
