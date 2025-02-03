<div>
    <flux:modal.trigger name="invite-user">
        <flux:button variant="primary" size="sm">Invite</flux:button>
    </flux:modal.trigger>

    <flux:modal name="invite-user" class="space-y-6 md:w-96">
        <div>
            <flux:heading size="lg">Invite user</flux:heading>
        </div>

        <form wire:submit="invite" class="space-y-6">
            <flux:input wire:model="name" label="Name" placeholder="Your name" />

            <flux:input wire:model="email" label="Email" placeholder="example@example.com" />

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" size="sm" variant="primary">Send Invite</flux:button>
            </div>
        </form>
    </flux:modal>
</div>
