<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.user.index', [
            'users' => Cache::remember('users', 60, function () {
                return User::orderBy('name')->get();
            }),
        ]);
    }
}
