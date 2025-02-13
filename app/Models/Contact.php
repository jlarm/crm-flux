<?php

namespace App\Models;

use App\Observers\ContactObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy(ContactObserver::class)]
class Contact extends Model
{
    protected $fillable = [
        'uuid',
        'dealership_id',
        'store_id',
        'name',
        'email',
        'phone',
        'role',
        'linkedin',
        'primary',
    ];

    public function dealership(): BelongsTo
    {
        return $this->belongsTo(Dealership::class);
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    protected function casts(): array
    {
        return [
            'primary' => 'boolean',
        ];
    }
}
