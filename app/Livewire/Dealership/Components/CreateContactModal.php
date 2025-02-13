<?php

namespace App\Livewire\Dealership\Components;

use App\Models\Dealership;
use Flux;
use Illuminate\View\View;
use Livewire\Component;

class CreateContactModal extends Component
{
    public Dealership $dealership;
    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $role = '';
    public string $linkedIn = '';
    public bool $primary = false;

    public function save(): void
    {
        $this->dealership->contacts()->create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'role' => $this->role,
            'linkedin' => $this->linkedIn,
            'primary' => $this->primary,
        ]);

        Flux::toast(
            text: 'Contact created successfully',
            heading: 'Contact Created',
            variant: 'success'
        );

        $this->dispatch('contact-added');

        Flux::modals()->close();
    }

    public function render(): View
    {
        return view('livewire.dealership.components.create-contact-modal');
    }
}
