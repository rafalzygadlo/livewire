<?php

namespace App\Livewire\Employee;

use Livewire\Component;

class Employee extends Component
{

    public function render()
    {
        return view('livewire.employee.index')
                ->layout('layouts.user');
    }

}
