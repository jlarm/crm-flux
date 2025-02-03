<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    #[On('invite-created')]
    public function render(): View
    {
        return view('livewire.user.index', [
            'users' => Cache::remember('users', 60, function () {
                return User::orderBy('name')->get();
            }),
        ]);
    }
}
