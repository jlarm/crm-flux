@php
    use App\Enum\Type;
@endphp

<div>
    <x-slot name="pageTitle">Dealerships</x-slot>
    <x-slot name="actions">
        <flux:button variant="primary" size="sm">Create</flux:button>
    </x-slot>
    <div class="space-y-10">
        <flux:radio.group wire:model.live="filters.status" variant="cards" :indicator="false" class="max-sm:flex-col">
            @foreach ($filters->statuses() as $status)
                <flux:radio :value="$status['value']" :label="$status['label']" description="{{ $status['count'] }}" />
            @endforeach
        </flux:radio.group>
        <div class="flex gap-x-3">
            <flux:input wire:model.live="search" type="search" icon="magnifying-glass" placeholder="Search..." />
            <flux:dropdown>
                <flux:button icon-trailing="chevron-down">
                    @if (! empty($filters->rating))
                        <flux:badge color="blue" size="sm">{{ count($filters->rating) }}</flux:badge>
                    @endif

                    Rating
                </flux:button>

                <flux:menu>
                    <flux:checkbox.group wire:model.live="filters.rating">
                        @foreach ($filters->ratings() as $rating)
                            <flux:checkbox :label="$rating['label']" :value="$rating['value']" />
                        @endforeach
                    </flux:checkbox.group>
                </flux:menu>
            </flux:dropdown>
            <flux:dropdown>
                <flux:button icon-trailing="chevron-down">
                    @if (! empty($filters->types))
                        <flux:badge color="blue" size="sm">{{ count($filters->types) }}</flux:badge>
                    @endif

                    Type
                </flux:button>

                <flux:menu>
                    <flux:checkbox.group wire:model.live="filters.types">
                        @foreach ($filters->types() as $type)
                            <flux:checkbox :label="$type['label']" :value="$type['value']" />
                        @endforeach
                    </flux:checkbox.group>
                </flux:menu>
            </flux:dropdown>
            <flux:dropdown>
                <flux:button icon-trailing="chevron-down">
                    @if (! empty($filters->users))
                        <flux:badge color="blue" size="sm">{{ count($filters->users) }}</flux:badge>
                    @endif

                    Consultant
                </flux:button>

                <flux:menu>
                    <flux:checkbox.group wire:model.live="filters.users">
                        @foreach ($filters->users() as $user)
                            <flux:checkbox :label="$user->name" :value="$user->id" />
                        @endforeach
                    </flux:checkbox.group>
                </flux:menu>
            </flux:dropdown>
            @if (! empty($filters->rating) || ! empty($filters->types) || ! empty($filters->users))
                <flux:button icon="x-mark" variant="filled" wire:click="clearFilters">Clear</flux:button>
            @endif
        </div>
        <flux:table :paginate="$dealerships">
            <flux:columns>
                <flux:column
                    sortable
                    :sorted="$sortBy === 'name'"
                    :direction="$sortDirection"
                    wire:click="sort('name')"
                >
                    Name
                </flux:column>
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
                <flux:column>Type</flux:column>
                <flux:column>Consultants</flux:column>
                <flux:column></flux:column>
            </flux:columns>
            <flux:rows>
                @foreach ($dealerships as $dealership)
                    <livewire:dealership.index-item :$dealership :key="$dealership->id" />
                @endforeach
            </flux:rows>
        </flux:table>
    </div>
</div>
