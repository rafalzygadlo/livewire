<?php

namespace App\Livewire\User;

use Livewire\WithFileUploads;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class Profile extends Component
{
    use WithFileUploads;

    public string $name = '';
    public string $email = '';
    public $photo;

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->first_name;
        $this->email = $user->email;
    }

    public function save()
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'photo' => ['nullable', 'image', 'max:1024'], // 1MB Max
        ]);

        // Aktualizacja awatara
        if ($this->photo) {
            $user->avatar = $this->photo->store('avatars', 'public');
        }

        // Sprawdź, czy email został zmieniony
        if ($user->email !== $validated['email']) {
            // Jeśli tak, zaktualizuj email i ustaw flagę weryfikacji na null
            $user->forceFill([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'email_verified_at' => null,
            ]);

            // Wyślij powiadomienie z linkiem weryfikacyjnym na nowy adres
            $user->sendEmailVerificationNotification();

            session()->flash('status', 'Profil zaktualizowany! Wysłaliśmy link weryfikacyjny na Twój nowy adres e-mail.');
        } else {
            // Jeśli email się nie zmienił, po prostu zaktualizuj imię
            $user->name = $validated['name'];
            session()->flash('status', 'Profil zaktualizowany pomyślnie.');
        }

        $user->save();

        // Odśwież komponent, aby pokazać aktualne dane (np. komunikat o niezweryfikowanym emailu)
        return $this->redirect(route('profile'), navigate: true);
    }

    public function render()
    {
        return view('livewire.user.profile')->layout('layouts.user');
    }

    public function removeAvatar()
    {
        $user = Auth::user();

        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
            $user->avatar = null;
            $user->save();
        }

        // Jeśli użytkownik wybrał nowy plik, ale potem kliknął "Usuń",
        // czyścimy również tymczasowy upload.
        $this->photo = null;

        session()->flash('status', 'Awatar został usunięty.');
        return $this->redirect(route('profile'), navigate: true);
    }
}