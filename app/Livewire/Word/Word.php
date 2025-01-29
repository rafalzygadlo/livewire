<?php

namespace App\Livewire\Word;

use Livewire\Component;

class Word extends Component
{


    public function openModal()
    {
        
    }

    public function render()
    {
        return view('livewire.word.index')
                ->layout('layouts.user');
    }

}
