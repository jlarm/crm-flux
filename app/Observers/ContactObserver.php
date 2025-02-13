<?php

namespace App\Observers;

use App\Models\Contact;
use Illuminate\Support\Str;

class ContactObserver
{
    public function creating(Contact $contact): void
    {
        $contact->uuid = Str::uuid();
    }
}
