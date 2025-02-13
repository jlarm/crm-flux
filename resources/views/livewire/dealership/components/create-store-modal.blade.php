<flux:modal name="create-store" class="w-[900px] space-y-6">
    <div>
        <flux:heading size="lg">Add Store</flux:heading>
    </div>

    <form wire:submit.prevent="save" class="space-y-6">
        <flux:input wire:model="name" size="sm" placeholder="Name" />
        <flux:input wire:model="address" size="sm" placeholder="Address" />
        <div class="grid grid-cols-3 gap-3">
            <flux:input wire:model="city" size="sm" placeholder="City" />
            <flux:select wire:model="state" size="sm" placeholder="State">
                @foreach (App\Enum\State::cases() as $state)
                    <flux:option :value="$state->value">{{ $state->label() }}</flux:option>
                @endforeach
            </flux:select>
            <flux:input wire:model="zip" size="sm" placeholder="Zip Code" />
        </div>
        <flux:input wire:model="phone" size="sm" placeholder="Phone Number" mask="999-999-9999" />
        <flux:editor wire:model="notes" placeholder="Notes..." />

        <div class="flex">
            <flux:spacer />

            <flux:button size="sm" type="submit" variant="primary">Save</flux:button>
        </div>
    </form>
</flux:modal>
