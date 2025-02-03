<flux:row>
    <flux:cell>{{ $user->name }}</flux:cell>
    <flux:cell>
        <flux:badge size="sm" :color="$this->status() === 'Active' ? 'green' : 'amber'" inset="top bottom">
            {{ $this->status() }}
        </flux:badge>
    </flux:cell>
    <flux:cell>{{ $user->email }}</flux:cell>
</flux:row>
