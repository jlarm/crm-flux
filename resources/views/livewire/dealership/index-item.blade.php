<flux:row>
    <flux:cell>
        <flux:heading class="mb-1">{{ $dealership->name }}</flux:heading>
        <p class="text-xs">{{ $dealership->city }}, {{ $dealership->state }}</p>
    </flux:cell>
    <flux:cell>
        <flux:badge size="sm" :color="$dealership->status->color()" inset="top bottom">
            {{ $dealership->status->label() }}
        </flux:badge>
    </flux:cell>
    <flux:cell>
        <flux:badge size="sm" :color="$dealership->rating->color()" inset="top bottom">
            {{ $dealership->rating->label() }}
        </flux:badge>
    </flux:cell>
    <flux:cell>
        <flux:badge size="sm">{{ $dealership->stores()->count() }}</flux:badge>
    </flux:cell>
    <flux:cell class="text-xs">{{ $dealership->type->label() }}</flux:cell>
    <flux:cell>
        @foreach ($dealership->users as $user)
            <p class="text-xs">{{ $user->name }}</p>
        @endforeach
    </flux:cell>
    <flux:cell>
        <a wire:navigate href="{{ route('dealership.show', $dealership) }}">View</a>
    </flux:cell>
</flux:row>
