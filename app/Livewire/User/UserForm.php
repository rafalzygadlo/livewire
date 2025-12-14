<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserForm extends Component
{
    public $userId;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $edit = false;

    #[On('showUserModal')]
    public function loadUser($id = null)
    {
        $this->reset();
        $this->resetValidation();

        if ($id) {
            // Zabezpieczenie: Szukaj użytkownika tylko w obrębie firmy zalogowanej osoby.
            // Jeśli użytkownik o podanym ID nie należy do firmy, $user będzie null.
            $user = User::forCurrentCompany()->find($id);

            if ($user) {
                $this->userId = $user->id;
                $this->name = $user->name;
                $this->email = $user->email;
                $this->edit = true;
            }
        } else {
            $this->edit = false;
        }

        $this->dispatch('open-user-modal');
    }

    public function save()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->userId)],
        ];

        // Dodaj walidację hasła tylko przy tworzeniu nowego użytkownika
        // lub gdy pole hasła jest wypełnione podczas edycji
        if (!$this->edit || !empty($this->password)) {
            $rules['password'] = 'required|min:8|confirmed';
        }

        $validatedData = $this->validate($rules);

        $userData = [
            'name' => $this->name,
            'email' => $this->email,
        ];

        if (!empty($this->password)) {
            $userData['password'] = Hash::make($this->password);
        }

        if ($this->edit) {
            // Aktualizacja
            User::find($this->userId)->update($userData);
        } else {
            // Tworzenie
            User::create($userData);
        }

        $this->dispatch('close-user-modal');
        $this->dispatch('refreshUserTable');
    }

    public function render()
    {
        return view('livewire.user.form');
    }
}
