<?php

namespace App\Livewire\Dealership;

use App\Models\Dealership;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class StoreIndex extends Component
{
    use WithPagination;

    public Dealership $dealership;

    #[Computed]
    public function stores()
    {
        return $this->dealership->stores()
            ->orderBy('name')
            ->paginate(10);
    }

    #[On('store-added')]
    public function render(): View
    {
        return view('livewire.dealership.store-index');
    }
}
