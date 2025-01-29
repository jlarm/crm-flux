<?php

namespace App\Livewire\Dealership;

use App\Models\Dealership;
use Livewire\Attributes\Url;
use Livewire\Form;

class Filters extends Form
{
    #[Url]
    public FilterStatus $status = FilterStatus::ALL;

    public function apply($query)
    {
        return $this->applyStatus($query);
    }

    public function statuses()
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

    public function applyStatus($query, $status = null)
    {
        $status = $status ?? $this->status;

        if ($status === FilterStatus::ALL) {
            return $query;
        }

        return $query->where('status', $status);
    }

    private function dealerQuery()
    {
        if (! auth()->user()->is_admin) {
            return auth()->user()->dealerships();
        }

        return Dealership::query();
    }
}
