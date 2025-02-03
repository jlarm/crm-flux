<?php

namespace App\Livewire\User;

use App\Models\User;
use App\Notifications\UserInviteNotification;
use Flux;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Invite extends Component
{
    #[Validate('required', 'string', 'min:3', 'max:255')]
    public string $name = '';
    #[Validate('required', 'email', 'unique:users,email')]
    public string $email = '';

    public function invite(): void
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Str::password(),
        ]);

        $user->notify(new UserInviteNotification);

        $this->reset(['name', 'email']);

        $this->dispatch('invite-created');

        Flux::modals()->close();

        Flux::toast(
            text: 'User invited successfully',
            heading: 'User Invited',
            variant: 'success'
        );
    }

    public function render()
    {
        return view('livewire.user.invite');
    }
}
