<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class UserObserver
{
    public function creating(User $user): void
    {
        $user->uuid = Str::uuid();
    }

    public function created(): void
    {
        Cache::forget('users');
    }

    public function updated(User $user): void
    {
        Cache::forget('users');
    }

    public function deleted(User $user): void
    {
        Cache::forget('users');
    }
}
