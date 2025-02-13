<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ $title ?? config('app.name') }}</title>

        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.svg') }}" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @fluxStyles
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:header container class="border-b border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <x-application-logo class="mr-4 h-8 w-auto" />

            <x-navigation />

            <flux:spacer />

            <livewire:components.date-time />

            <flux:dropdown position="top" align="start">
                <flux:button variant="ghost" icon-trailing="chevron-down">{{ auth()->user()->name }}</flux:button>
                <flux:menu class="space-y-2">
                    <flux:menu.item wire:navigate href="{{ route('profile') }}" icon="user">Profile</flux:menu.item>

                    <flux:radio.group x-data variant="segmented" x-model="$flux.appearance">
                        <flux:radio value="light" icon="sun" />
                        <flux:radio value="dark" icon="moon" />
                        <flux:radio value="system" icon="computer-desktop" />
                    </flux:radio.group>

                    <flux:menu.item icon="arrow-right-start-on-rectangle">Logout</flux:menu.item>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        <flux:sidebar
            stashable
            sticky
            class="border-r border-zinc-200 bg-zinc-50 lg:hidden dark:border-zinc-700 dark:bg-zinc-900"
        >
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <x-navigation-mobile />

            <flux:spacer />

            <flux:navlist variant="outline">
                <flux:navlist.item icon="cog-6-tooth" href="#">Settings</flux:navlist.item>
                <flux:navlist.item icon="information-circle" href="#">Help</flux:navlist.item>
            </flux:navlist>
        </flux:sidebar>

        <flux:main container>
            <div>
                <div class="flex items-end justify-between">
                    @if (isset($pageTitle))
                        <flux:heading size="lg">{{ $pageTitle }}</flux:heading>
                    @endif

                    @if (isset($actions))
                        {{ $actions }}
                    @endif
                </div>
                @if (isset($pageTitle))
                    <flux:separator class="my-5" variant="subtle" />
                @endif
            </div>

            {{ $slot }}
        </flux:main>
        @persist('toast')
            <flux:toast />
        @endpersist

        @fluxScripts
    </body>
</html>
