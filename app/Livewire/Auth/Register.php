<?php

namespace App\Livewire\Auth;

use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Register extends Component
{
    public string $company_name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    protected $rules = [
        'company_name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ];

    public function register()
    {
        $validatedData = $this->validate();

        DB::transaction(function () use ($validatedData) {
            // 1. Stwórz firmę
            $company = Company::create([
                'name' => $validatedData['company_name'],
            ]);

            // 2. Stwórz użytkownika i przypisz go do firmy
            $user = $company->users()->create([
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                // Uzupełnij inne wymagane pola, np. first_name, last_name
                'first_name' => 'Admin', // Przykładowo
                'last_name' => 'Firmy', // Przykładowo
            ]);

            // 3. Ustaw użytkownika jako właściciela firmy
            $company->owner_id = $user->id;
            $company->save();

            // 4. Zaloguj użytkownika
            Auth::guard('user')->login($user);
        });

        return redirect()->route('home.index');
    }

    public function render()
    {
        return view('livewire.auth.register')
            ->layout('layouts.user');
    }
}
