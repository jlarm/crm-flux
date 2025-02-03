<div>
    <x-slot name="pageTitle">Users</x-slot>
    <x-slot name="actions">
        <flux:button variant="primary" size="sm">Create</flux:button>
    </x-slot>
    <div>
        <flux:table>
            <flux:columns>
                <flux:column>Name</flux:column>
                <flux:column>Email</flux:column>
                <flux:column></flux:column>
            </flux:columns>
            <flux:rows>
                @foreach ($users as $user)
                    <flux:row>
                        <flux:cell>{{ $user->name }}</flux:cell>
                        <flux:cell>{{ $user->email }}</flux:cell>
                    </flux:row>
                @endforeach
            </flux:rows>
        </flux:table>
    </div>
</div>
