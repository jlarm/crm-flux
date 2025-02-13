<div>
    <flux:modal.trigger name="create-store">
        <flux:button variant="primary" size="xs">Add Contact</flux:button>
    </flux:modal.trigger>

    <flux:modal name="create-store" class="w-[900px] space-y-6">
        <div>
            <flux:heading size="lg">Add Contact</flux:heading>
        </div>

        <form wire:submit.prevent="save" class="space-y-6">
            <flux:input wire:model="name" size="sm" placeholder="Name" />
            <div class="grid grid-cols-2 gap-3">
                <flux:input wire:model="email" size="sm" placeholder="Email Address" />
                <flux:input wire:model="phone" size="sm" placeholder="Phone Number" mask="999-999-9999" />
            </div>
            <flux:input wire:model="role" size="sm" placeholder="Role" />
            <flux:input type="url" wire:model="linkedIn" size="sm" placeholder="LinkedIn Profile URL" />
            <flux:field variant="inline" class="flex w-full justify-between">
                <flux:switch wire:model="primary" />
                <flux:label>Primary Contact</flux:label>
                <flux:error name="email" />
            </flux:field>
            <div class="flex">
                <flux:spacer />

                <flux:button size="sm" type="submit" variant="primary">Save</flux:button>
            </div>
        </form>
    </flux:modal>
</div>
