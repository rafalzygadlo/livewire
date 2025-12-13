<?php

namespace App\Livewire\Word;

use Livewire\Component;
use App\Models\Word;

class WordTable extends Component
{
    // Nasłuchuje na zdarzenie 'refreshDatatable' i odświeża komponent ($refresh)
    protected $listeners = ['refreshDatatable' => '$refresh'];

    public function deleteWord($id)
    {
        // Znajdź i usuń słowo
        Word::find($id)->delete();

        // Komponent odświeży się automatycznie, ponieważ usunięcie rekordu
        // zmienia stan, ale dla pewności możemy wywołać $refresh.
        // W tym przypadku nie jest to konieczne.
    }

    public function render()
    {
        // Pobiera wszystkie słowa i przekazuje je do widoku tabeli
        return view('livewire.word.word-table', ['words' => Word::all()]);
    }
}