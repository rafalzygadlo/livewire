<?php

namespace App\Livewire\Company;

use Livewire\Component;
use App\Models\Company as CompanyModel;
use Illuminate\Support\Facades\Auth;

class Company extends Component
{
    public CompanyModel $company;
    public string $name = '';

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
        ];
    }

    public function mount(): void
    {
        // Pobieramy firmę zalogowanego użytkownika
        $this->company = Auth::user()->company;
        $this->name = $this->company->name;
    }

    public function update(): void
    {
        $this->validate();

        $this->company->update([
            'name' => $this->name,
        ]);

        session()->flash('status', 'Dane firmy zostały zaktualizowane.');
    }

    public function render()
    {
        return view('livewire.company.company')->layout('layouts.user');
    }
}
