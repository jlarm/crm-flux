<?php

namespace App\Livewire\Dealership;

use App\Models\Dealership;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class ContactIndex extends Component
{
    public Dealership $dealership;

    #[Computed]
    public function contacts()
    {
        return $this->dealership->contacts()
            ->orderBy('name')
            ->paginate(10);
    }

    #[On('contact-added')]
    public function render(): View
    {
        return view('livewire.dealership.contact-index');
    }
}
