<?php

namespace App\Livewire\Components;

use Illuminate\View\View;
use Livewire\Component;

class DateTime extends Component
{
    public function render(): View
    {
        return view('livewire.components.date-time', [
            'time' => now()->inUserTimezone()->format('F d, y h:i:s a'),
        ]);
    }
}
