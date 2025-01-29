<?php

namespace App\Policies;

use App\Models\Dealership;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DealershipPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool {}

    public function view(User $user, Dealership $dealership): bool {}

    public function create(User $user): bool {}

    public function update(User $user, Dealership $dealership): bool {}

    public function delete(User $user, Dealership $dealership): bool {}

    public function restore(User $user, Dealership $dealership): bool {}

    public function forceDelete(User $user, Dealership $dealership): bool {}
}
