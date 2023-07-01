<x-app-layout>
    <x-slot name="header">
        <x-navbar>
            <x-slot name="content">
                <x-list-bank />
            </x-slot>
        </x-navbar>
    </x-slot>

    <!-- Menu Item or List Menu -->
    <x-menu-item />

    <x-footer />

</x-app-layout>