<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Venta de Boletos
        </h2>
    </x-slot>

    <div class="py-12"> 
        <livewire:venta-component venta="{{ json_encode($venta->id) }}" />
    </div>
</x-app-layout>
