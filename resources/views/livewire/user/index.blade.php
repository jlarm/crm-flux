<div>
    <x-slot name="pageTitle">Users</x-slot>
    <x-slot name="actions">
        <livewire:user.invite />
    </x-slot>
    <div>
        <flux:table>
            <flux:columns>
                <flux:column>Name</flux:column>
                <flux:column>Status</flux:column>
                <flux:column>Email</flux:column>
                <flux:column></flux:column>
            </flux:columns>
            <flux:rows>
                @foreach ($users as $user)
                    <livewire:user.index-item :$user :wire:key="$user->id" />
                @endforeach
            </flux:rows>
        </flux:table>
    </div>
</div>
