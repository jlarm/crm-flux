<?php

namespace App\Livewire\Dealership\Components;

use App\Models\Dealership;
use Flux;
use Illuminate\View\View;
use Livewire\Component;

class CreateStoreModal extends Component
{
    public Dealership $dealership;
    public string $name = '';
    public string $address = '';
    public string $city = '';
    public $state;
    public string $zip = '';
    public string $phone;
    public string $notes;

    public function save(): void
    {
        $this->dealership->stores()->create([
            'name' => $this->name,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'zip_code' => $this->zip,
            'phone' => $this->phone,
            'notes' => $this->notes,
        ]);

        Flux::toast(
            text: 'Dealership created successfully',
            heading: 'Dealership Created',
            variant: 'success'
        );

        $this->dispatch('store-added');

        Flux::modals()->close();
    }

    public function render(): View
    {
        return view('livewire.dealership.components.create-store-modal');
    }
}
