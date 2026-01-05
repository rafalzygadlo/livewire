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

    public string $first_name = '';
    public string $last_name = '';
    public string $email = '';
    public $photo;

    public function mount()
    {
        $user = Auth::user();
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
    }

    public function save()
    {
        $user = Auth::user();

        $validated = $this->validate([
            'first_name' => ['required', 'string', 'max:128'],
            'last_name' => ['required', 'string', 'max:128'],
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
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'email_verified_at' => null,
            ]);

            // Wyślij powiadomienie z linkiem weryfikacyjnym na nowy adres
            $user->sendEmailVerificationNotification();

            session()->flash('status', 'Profil zaktualizowany! Wysłaliśmy link weryfikacyjny na Twój nowy adres e-mail.');
        } else {
            // Jeśli email się nie zmienił, po prostu zaktualizuj imię
            $user->first_name = $validated['first_name'];
            $user->last_name = $validated['last_name'];
            session()->flash('status', 'Profil zaktualizowany pomyślnie.');
        }

        $user->save();

        // Odśwież komponent, aby pokazać aktualne dane (np. komunikat o niezweryfikowanym emailu)
        return $this->redirect(route('profile.index'), navigate: false);
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
        return $this->redirect(route('profile.index'), navigate: true);
    }
}
