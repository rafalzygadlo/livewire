<?php

namespace App\Livewire\Word;

use Livewire\Component;
use Livewire\Attributes\On;

class Word extends Component
{
    public function openModal()
    {
        // Wysyła zdarzenie do komponentu formularza, aby otworzyć pusty modal
        $this->dispatch('showModal');
    }

    public function render()
    {
        // Renderuje tylko widok-kontener, bez przekazywania danych
        return view('livewire.word.index')->layout('layouts.user');
    }
}
