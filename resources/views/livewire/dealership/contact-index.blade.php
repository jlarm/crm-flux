<div>
    <x-slot name="pageTitle">{{ $dealership->name }}</x-slot>
    <x-slot name="actions">
        <div>
            <livewire:dealership.components.create-contact-modal :$dealership />
        </div>
    </x-slot>
    <div class="grid grid-cols-12 gap-10">
        <div class="col-span-3">
            <livewire:dealership.components.nav :$dealership />
        </div>
        <div class="col-span-9">
            <flux:table :paginate="$this->contacts">
                <flux:columns>
                    <flux:column>Name</flux:column>
                    <flux:column>Contact</flux:column>
                    <flux:column>Role</flux:column>
                    <flux:column>LinkedIn</flux:column>
                    <flux:column>Primary Contact</flux:column>
                    <flux:column></flux:column>
                </flux:columns>
                <flux:rows>
                    @foreach ($this->contacts() as $contact)
                        <flux:row>
                            <flux:cell>{{ $contact->name }}</flux:cell>
                            <flux:cell>{{ $contact->email }}</flux:cell>
                            <flux:cell>{{ $contact->role }}</flux:cell>
                            <flux:cell>
                                @if ($contact->linkedin)
                                    <flux:button
                                        href="{{ $contact->linkedin }}"
                                        target="_blank"
                                        size="xs"
                                        inset="top bottom"
                                        variant="ghost"
                                        icon="arrow-top-right-on-square"
                                    ></flux:button>
                                @endif
                            </flux:cell>
                            <flux:cell>
                                @if ($contact->primary)
                                    <flux:badge size="sm" inset="top bottom" color="lime">Primary</flux:badge>
                                @endif
                            </flux:cell>
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
