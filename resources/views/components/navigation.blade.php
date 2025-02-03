<flux:navbar class="-mb-px max-lg:hidden">
    <flux:navbar.item wire:navigate href="{{ route('dashboard') }}">Home</flux:navbar.item>
    <flux:navbar.item wire:navigate href="{{ route('dealership.index') }}">Dealerships</flux:navbar.item>
    <flux:navbar.item wire:navigate href="#">Contacts</flux:navbar.item>
    <flux:navbar.item wire:navigate href="#">Reminders</flux:navbar.item>
    <flux:navbar.item wire:navigate href="{{ route('user.index') }}">Users</flux:navbar.item>

    <flux:dropdown class="max-lg:hidden">
        <flux:navbar.item icon-trailing="chevron-down">Email</flux:navbar.item>

        <flux:navmenu>
            <flux:navmenu.item href="#">Current Emails</flux:navmenu.item>
            <flux:navmenu.item href="#">Templates</flux:navmenu.item>
            <flux:navmenu.item href="#">PDF Attachments</flux:navmenu.item>
            <flux:navmenu.item href="#">Sent Emails</flux:navmenu.item>
        </flux:navmenu>
    </flux:dropdown>
</flux:navbar>
