<div>
    <x-slot name="pageTitle">Dealerships</x-slot>
    <div class="space-y-5">
        <div>
            <flux:input wire:model.live="search" type="search" icon="magnifying-glass" placeholder="Search..." />
        </div>
        <flux:table :paginate="$this->dealerships">
            <flux:columns>
                <flux:column
                    sortable
                    :sorted="$sortBy === 'name'"
                    :direction="$sortDirection"
                    wire:click="sort('name')"
                >
                    Name
                </flux:column>
                <flux:column>Phone</flux:column>
                <flux:column
                    sortable
                    :sorted="$sortBy === 'status'"
                    :direction="$sortDirection"
                    wire:click="sort('status')"
                >
                    Status
                </flux:column>
                <flux:column
                    sortable
                    :sorted="$sortBy === 'rating'"
                    :direction="$sortDirection"
                    wire:click="sort('rating')"
                >
                    Rating
                </flux:column>
                <flux:column>Stores</flux:column>
                <flux:column>Consultants</flux:column>
                <flux:column></flux:column>
            </flux:columns>
            <flux:rows>
                @foreach ($this->dealerships as $dealership)
                    <livewire:dealership.index-item :$dealership :key="$dealership->id" />
                @endforeach
            </flux:rows>
        </flux:table>
    </div>
</div>
