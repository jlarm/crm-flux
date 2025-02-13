<?php

namespace App\Livewire\Dealership;

use App\Livewire\Forms\DealershipForm;
use App\Models\Dealership;
use App\Models\User;
use Flux;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

class Create extends Component
{
    public DealershipForm $form;

    public function users(): Collection
    {
        return User::orderBy('name')->get();
    }

    public function save(): void
    {
        $dealer = Dealership::create([
            'name' => $this->form->name,
            'address' => $this->form->address,
            'city' => $this->form->city,
            'state' => $this->form->state,
            'zip_code' => $this->form->zipCode,
            'phone' => $this->form->phone,
            'in_development' => $this->form->dev,
            'type' => $this->form->type,
            'status' => $this->form->status,
            'rating' => $this->form->rating,
            'current_solution_name' => $this->form->currentSolutionName,
            'current_solution_use' => $this->form->currentSolutionUse,
            'notes' => $this->form->notes,
        ]);

        $dealer->users()->attach($this->form->selectedUsers);

        Flux::toast(
            text: 'Dealership created successfully',
            heading: 'Dealership Created',
            variant: 'success'
        );

        $this->redirect(route('dealership.show', $dealer), true);
    }

    #[Title('Create Dealership')]
    public function render(): View
    {
        return view('livewire.dealership.create');
    }
}
