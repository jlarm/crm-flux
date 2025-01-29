<flux:navbar class="-mb-px max-lg:hidden">
    <flux:navbar.item icon="home" href="#" current>Home</flux:navbar.item>
    <flux:navbar.item icon="building-office" href="#">Dealerships</flux:navbar.item>
    <flux:navbar.item icon="user-group" href="#">Contacts</flux:navbar.item>
    <flux:navbar.item icon="calendar" href="#">Reminders</flux:navbar.item>
    <flux:navbar.item icon="user" href="#">Users</flux:navbar.item>

    <flux:separator vertical variant="subtle" class="my-2" />

    <flux:dropdown class="max-lg:hidden">
        <flux:navbar.item icon-trailing="chevron-down">Email</flux:navbar.item>

        <flux:navmenu>
            <flux:navmenu.item href="#">Marketing site</flux:navmenu.item>
            <flux:navmenu.item href="#">Android app</flux:navmenu.item>
            <flux:navmenu.item href="#">Brand guidelines</flux:navmenu.item>
        </flux:navmenu>
    </flux:dropdown>
</flux:navbar>
