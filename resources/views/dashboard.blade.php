<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

        <x-navbar />
            

    </x-slot>

    <!-- Menu Item or List Menu -->
    <x-menu-item />
    
</x-app-layout>