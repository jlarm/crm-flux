<flux:navlist class="col-span-2">
    <flux:navlist.item
        wire:navigate
        href="{{ route('dealership.show', $dealership) }}"
        icon="home"
        :current="request()->routeIs('dealership.show', $dealership)"
    >
        General
    </flux:navlist.item>
    <flux:navlist.item wire:navigate href="#" icon="puzzle-piece">Stores</flux:navlist.item>
    <flux:navlist.item wire:navigate href="#" icon="user">Contacts</flux:navlist.item>
    <flux:navlist.item wire:navigate href="#" icon="chart-bar">Progress</flux:navlist.item>
    <flux:navlist.item wire:navigate href="#" icon="envelope">Emails</flux:navlist.item>
</flux:navlist>
