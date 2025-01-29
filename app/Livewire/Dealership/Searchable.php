<?php

namespace App\Livewire\Dealership;

trait Searchable
{
    public string $search = '';

    public function updatedSearchable($property)
    {
        if ($property === 'search') {
            $this->resetPage();
        }
    }

    protected function applySearch($query)
    {
        return $this->search === ''
            ? $query
            : $query
                ->where('name', 'like', '%' . $this->search . '%');
    }
}
