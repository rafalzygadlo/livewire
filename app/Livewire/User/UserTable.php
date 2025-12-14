<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserTable extends Component
{
    // Nasłuchuje na zdarzenie 'refreshUserTable' i odświeża komponent
    protected $listeners = ['refreshUserTable' => '$refresh'];

    public function deleteUser($id)
    {
        $user = User::find($id);
        if ($user) {
            // Usuń awatar, jeśli istnieje
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $user->delete();
        }
    }

    public function render()
    {
        return view('livewire.user.user-table', ['users' => User::all()]);
    }
}
