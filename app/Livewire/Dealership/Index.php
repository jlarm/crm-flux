<?php

namespace App\Livewire\Dealership;

use App\Models\Dealership;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use Searchable, WithPagination;

    public $sortBy = 'name';
    public $sortDirection = 'asc';

    public function sort($column): void
    {
        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
    }

    #[Computed]
    public function dealerships()
    {
        $query = $this->dealerQuery()
            ->with('users')
            ->tap(fn ($query) => $this->sortBy ? $query->orderBy($this->sortBy, $this->sortDirection) : $query);

        $query = $this->applySearch($query);

        return $query->paginate(20);
    }

    #[Title('Dealerships')]
    public function render(): View
    {
        return view('livewire.dealership.index');
    }

    private function dealerQuery()
    {
        if (! auth()->user()->is_admin) {
            return auth()->user()->dealerships();
        }

        return Dealership::query();
    }
}
