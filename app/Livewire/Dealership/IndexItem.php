<?php

namespace App\Livewire\Dealership;

use App\Models\Dealership;
use Livewire\Component;

class IndexItem extends Component
{
    public Dealership $dealership;

    public function render()
    {
        return view('livewire.dealership.index-item');
    }
}
