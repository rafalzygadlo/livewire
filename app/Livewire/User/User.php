<?php

namespace App\Livewire\User;

use Livewire\Component;

class User extends Component
{
    public function openModal()
    {
        // Wysyła zdarzenie do komponentu formularza, aby otworzyć pusty modal
        $this->dispatch('showModal');
    }

    public function render()
    {
        return view('livewire.user.index')->layout('layouts.user');
    }
}
