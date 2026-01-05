<?php

namespace App\Livewire\Word;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\Word;

class WordForm extends Component
{
    public $id;

    public $name_pl;

    public $name_de;

    public $name_en;

    public $example;

    public $edit;

    protected $rules =
    [
        'name_pl' => 'required',
        'name_de' => 'required',
        'name_en' => 'required'
    ];

    #[On('showModal')]
    public function loadWord($id = null)
    {
        $this->reset();

        if ($id) {
            $post = Word::find($id);
            if ($post) {
                $this->id = $post->id;
                $this->name_pl = $post->name_pl;
                $this->name_de = $post->name_de;
                $this->name_en = $post->name_en;
                $this->example = $post->example;
                $this->edit = true;
            }
        } else {
            $this->edit = false;
        }

        $this->dispatch('open-modal');
    }

    public function save()
    {
        $this->validate();

        if ($this->id)
        {
            // Aktualizacja
            $post = Word::find($this->id);
            $post->update
            ([
                'name_pl' => $this->name_pl,
                'name_de' => $this->name_de,
                'name_en' => $this->name_en,
                'example' => $this->example
            ]);
        }
        else
        {

            Word::create
            ([
                'name_pl' => $this->name_pl,
                'name_de' => $this->name_de,
                'name_en' => $this->name_en,
                'example' => $this->example
            ]);
        }

        $this->dispatch('close-modal');
        $this->dispatch('refreshDatatable');

    }

    public function render()
    {
        return view('livewire.word.form');
    }
}
