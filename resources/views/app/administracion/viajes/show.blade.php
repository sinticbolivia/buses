<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Viajes
        </h2>
    </x-slot>
    <div class="py-3 bg-gray-200">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-2 flex items-center">
                <a href="{{ route('viajes') }}" class="flex items-center px-3 py-2 bg-white rounded border shadow hover:shadow-lg">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Atras
                </a>
            </div>
            <div class="bg-white shadow-3x1 overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Información de Viajes
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Ver información detallada de Viajes
                    </p>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500 uppercase">
                                Fecha salida del bus
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $viaje->fecha}} 
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500 uppercase">
                                Hora salida del bus
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $viaje->hora}}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500 uppercase">
                                Precio del Boleto
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $viaje->precio }}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500 uppercase">
                                Numero carril de la partida del bus
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $viaje->numero_carril }}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500 uppercase">
                                Placa del Bus
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $viaje->tieneviaje["placa"] }}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500 uppercase">
                                tipo bus
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $viaje->tienetipo["tipo"] }}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500 uppercase">
                                Fecha de Registro
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $viaje->created_at->format('d/m/Y H:m:s') }}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500 uppercase">
                                Ultima actualización
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $viaje->updated_at->format('d/m/Y H:m:s') }}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
         </div>
    </div>
</x-app-layout>
