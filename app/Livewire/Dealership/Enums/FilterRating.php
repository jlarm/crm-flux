<?php

namespace App\Livewire\Dealership\Enums;

use App\Enum\Rating;

enum FilterRating: string
{
    case ALL = 'all';
    case HOT = Rating::HOT->value;
    case WARM = Rating::WARM->value;
    case COLD = Rating::COLD->value;

    public function label(): string
    {
        return match ($this) {
            self::ALL => 'All',
            self::HOT => Rating::HOT->label(),
            self::WARM => Rating::WARM->label(),
            self::COLD => Rating::COLD->label(),
        };
    }
}
