<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;

class IndexItem extends Component
{
    public User $user;

    public function status(): string
    {
        if (! $this->user->email_verified_at) {
            return 'Pending';
        }

        return 'Active';
    }

    public function render(): View
    {
        return view('livewire.user.index-item');
    }
}
