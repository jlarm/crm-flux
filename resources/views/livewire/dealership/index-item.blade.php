<flux:row>
    <flux:cell>{{ $dealership->name }}</flux:cell>
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
        <flux:badge size="sm">{{ mt_rand(1, 20) }}</flux:badge>
    </flux:cell>
    <flux:cell class="text-xs">{{ $dealership->type->label() }}</flux:cell>
    <flux:cell>
        @foreach ($dealership->users as $user)
            <p class="text-xs">{{ $user->name }}</p>
        @endforeach
    </flux:cell>
    <flux:cell>View</flux:cell>
</flux:row>
