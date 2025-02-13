<?php

namespace App\Livewire\Dealership;

use App\Models\Dealership;
use App\Models\User;
use Flux;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

class Show extends Component
{
    public Dealership $dealership;
    public $name;
    public $address;
    public $city;
    public $state;
    public $zipCode;
    public $phone;
    public $dev;
    public $type;
    public $status;
    public $rating;
    public $currentSolutionName;
    public $currentSolutionUse;
    public $notes;
    public $selectedUsers;

    public function mount(): void
    {
        $this->name = $this->dealership->name;
        $this->address = $this->dealership->address;
        $this->city = $this->dealership->city;
        $this->state = $this->dealership->state;
        $this->zipCode = $this->dealership->zip_code;
        $this->phone = $this->dealership->phone;
        $this->dev = $this->dealership->in_development;
        $this->type = $this->dealership->type;
        $this->status = $this->dealership->status;
        $this->rating = $this->dealership->rating;
        $this->currentSolutionName = $this->dealership->current_solution_name;
        $this->currentSolutionUse = $this->dealership->current_solution_use;
        $this->notes = $this->dealership->notes;
        $this->selectedUsers = $this->dealership->users()->pluck('id')->toArray();
    }

    public function update()
    {
        $this->dealership->update([
            'name' => $this->name,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'zip_code' => $this->zipCode,
            'phone' => $this->phone,
            'in_development' => $this->dev,
            'type' => $this->type,
            'status' => $this->status,
            'rating' => $this->rating,
            'current_solution_name' => $this->currentSolutionName,
            'current_solution_use' => $this->currentSolutionUse,
            'notes' => $this->notes,
        ]);

        $this->dealership->users()->sync($this->selectedUsers);

        Flux::toast(
            text: 'Dealership updated successfully',
            heading: 'Dealership Updated',
            variant: 'success'
        );
    }

    public function users(): Collection
    {
        return User::query()
            ->orderBy('name')
            ->get();
    }

    public function render(): View
    {
        return view('livewire.dealership.show')
            ->title($this->dealership->name);
    }
}
