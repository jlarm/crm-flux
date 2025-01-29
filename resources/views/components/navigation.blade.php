<flux:navbar class="-mb-px max-lg:hidden">
    <flux:navbar.item wire:navigate icon="home" href="{{ route('dashboard') }}">Home</flux:navbar.item>
    <flux:navbar.item wire:navigate icon="building-office" href="#">Dealerships</flux:navbar.item>
    <flux:navbar.item wire:navigate icon="user-group" href="#">Contacts</flux:navbar.item>
    <flux:navbar.item wire:navigate icon="calendar" href="#">Reminders</flux:navbar.item>
    <flux:navbar.item wire:navigate icon="user" href="#">Users</flux:navbar.item>

    <flux:dropdown class="max-lg:hidden">
        <flux:navbar.item icon="envelope" icon-trailing="chevron-down">Email</flux:navbar.item>

        <flux:navmenu>
            <flux:navmenu.item href="#">Current Emails</flux:navmenu.item>
            <flux:navmenu.item href="#">Templates</flux:navmenu.item>
            <flux:navmenu.item href="#">PDF Attachments</flux:navmenu.item>
            <flux:navmenu.item href="#">Sent Emails</flux:navmenu.item>
        </flux:navmenu>
    </flux:dropdown>
</flux:navbar>
