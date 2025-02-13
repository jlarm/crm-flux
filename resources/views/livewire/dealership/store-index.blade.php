<div>
    <x-slot name="pageTitle">{{ $dealership->name }} Stores</x-slot>
    <x-slot name="actions">
        <div>
            <flux:modal.trigger name="create-store">
                <flux:button variant="primary" size="xs">Add Store</flux:button>
            </flux:modal.trigger>

            <livewire:dealership.components.create-store-modal :$dealership />
        </div>
    </x-slot>
    <div class="grid grid-cols-12 gap-10">
        <div class="col-span-3">
            <livewire:dealership.components.nav :$dealership />
        </div>
        <div class="col-span-9">
            <flux:table :paginate="$this->stores">
                <flux:columns>
                    <flux:column>Name</flux:column>
                    <flux:column>Phone</flux:column>
                    <flux:column></flux:column>
                </flux:columns>
                <flux:rows>
                    @foreach ($this->stores as $store)
                        <flux:row>
                            <flux:cell>
                                {{ $store->name }}
                                <span class="block text-xs text-zinc-400">
                                    {{ $store->city }}, {{ $store->state }}
                                </span>
                            </flux:cell>
                            <flux:cell>{{ $store->phone }}</flux:cell>
                            <flux:cell>
                                <flux:dropdown class="flex justify-end">
                                    <flux:button
                                        variant="ghost"
                                        size="sm"
                                        inset="top bottom"
                                        icon-trailing="ellipsis-horizontal"
                                    ></flux:button>
                                    <flux:menu>
                                        <flux:menu.item icon="pencil-square">Edit</flux:menu.item>
                                        <flux:menu.item variant="danger" icon="trash">Delete</flux:menu.item>
                                    </flux:menu>
                                </flux:dropdown>
                            </flux:cell>
                        </flux:row>
                    @endforeach
                </flux:rows>
            </flux:table>
        </div>
    </div>
</div>
