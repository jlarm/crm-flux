<?php

namespace App\Livewire\Dealership;

use App\Livewire\Dealership\Enums\FilterRating;
use App\Livewire\Dealership\Enums\FilterStatus;
use App\Livewire\Dealership\Traits\HasDealershipQuery;
use Illuminate\Support\Collection;
use Livewire\Attributes\Url;
use Livewire\Form;

class Filters extends Form
{
    use HasDealershipQuery;

    #[Url]
    public FilterStatus $status = FilterStatus::ALL;

    #[Url]
    public array $rating = [];

    public function apply($query)
    {
        $query = $this->applyStatus($query);

        return $this->applyRating($query);
    }

    public function statuses(): Collection
    {
        return collect(FilterStatus::cases())->map(function ($status) {
            $count = $this->applyStatus(
                $this->dealerQuery(),
                $status
            )->count();

            return [
                'value' => $status->value,
                'label' => $status->label(),
                'count' => $count,
            ];
        });
    }

    public function ratings(): Collection
    {
        return collect(FilterRating::cases())
            ->filter(fn ($rating) => $rating !== FilterRating::ALL)
            ->map(function ($rating) {
                return [
                    'value' => $rating->value,
                    'label' => $rating->label(),
                ];
            });
    }

    public function applyStatus($query, $status = null)
    {
        $status = $status ?? $this->status;

        if ($status === FilterStatus::ALL) {
            return $query;
        }

        return $query->where('status', $status);
    }

    public function applyRating($query, $rating = null)
    {
        $rating = $rating ?? $this->rating;

        if (empty($rating)) {
            return $query;
        }

        return $query->whereIn('rating', $rating);
    }
}
