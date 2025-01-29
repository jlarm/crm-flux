<?php

namespace App\Livewire\Dealership;

use App\Models\Dealership;
use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use Searchable, WithPagination;

    public $sortBy = 'name';
    public $sortDirection = 'asc';

    public Filters $filters;

    public function sort($column): void
    {
        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
    }

    #[Title('Dealerships')]
    public function render(): View
    {
        $query = $this->dealerQuery()->with('users');

        $query = $this->applySearch($query);

        $query = $this->filters->apply($query);

        $dealerships = $query
            ->tap(fn ($query) => $this->sortBy ? $query->orderBy($this->sortBy, $this->sortDirection) : $query)
            ->paginate(20);

        return view('livewire.dealership.index', [
            'dealerships' => $dealerships,
        ]);
    }

    private function dealerQuery()
    {
        if (! auth()->user()->is_admin) {
            return auth()->user()->dealerships();
        }

        return Dealership::query();
    }
}
