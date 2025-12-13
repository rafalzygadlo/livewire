<?php

namespace App\Livewire\Word;

use Livewire\Component;
use Livewire\Attributes\On; 

class Word extends Component
{
    public $selectedPostId = null;
    
    
    public function openModal($id)
    {
        $this->dispatch('showModal', id: $id);
    }
    
    public function render()
    {
        return view('livewire.word.index', ['words' => \App\Models\Word::all()])
                ->layout('layouts.user');
    }

}
