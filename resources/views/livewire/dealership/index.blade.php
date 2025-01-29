<div>
    <flux:table :paginate="$this->dealerships">
        <flux:columns>
            <flux:column>Name</flux:column>
            <flux:column>Phone</flux:column>
            <flux:column>Status</flux:column>
            <flux:column>Rating</flux:column>
            <flux:column>Stores</flux:column>
            <flux:column>Consultants</flux:column>
            <flux:column></flux:column>
        </flux:columns>
        <flux:rows>
            @foreach ($this->dealerships as $dealership)
                <flux:row :key="$dealership->id">
                    <flux:cell>{{ $dealership->name }}</flux:cell>
                    <flux:cell>{{ $dealership->phone }}</flux:cell>
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
                    <flux:cell>
                        @foreach ($dealership->users as $user)
                            <p class="text-xs">{{ $user->name }}</p>
                        @endforeach
                    </flux:cell>
                    <flux:cell>View</flux:cell>
                </flux:row>
            @endforeach
        </flux:rows>
    </flux:table>
</div>
