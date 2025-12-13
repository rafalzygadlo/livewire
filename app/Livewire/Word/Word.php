<?php

namespace App\Livewire\Word;

use Livewire\Component;
use Livewire\Attributes\On; 

class Word extends Component
{
    // Nasłuchuje na zdarzenie 'refreshDatatable' i odświeża komponent ($refresh)
    protected $listeners = ['refreshDatatable' => '$refresh'];

    public function openModal($id = null)
    {
        // Wysyła zdarzenie do komponentu formularza, przekazując ID (lub null dla nowego rekordu)
        $this->dispatch('showModal', id: $id);
    }

    public function deleteWord($id)
    {
        \App\Models\Word::find($id)->delete();
        // Komponent odświeży się automatycznie
    }

    public function render()
    {
        // Pobiera wszystkie słowa i przekazuje je do widoku
        return view('livewire.word.index', ['words' => \App\Models\Word::all()])
                ->layout('layouts.user');
    }
}
