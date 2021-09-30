<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Buses
        </h2>
    </x-slot>
    <div class="py-2 bg-gray-200">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-2 flex items-center">
                <a href="{{ route('buses') }}" class="flex items-center px-3 py-2 bg-white rounded border shadow hover:shadow-lg">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Atras
                </a>
            </div>
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Información de Bus
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Ver información detallada de Bus
                    </p>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500 uppercase">
                                Tipo de bus:
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $bus->tipo }}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500 uppercase">
                                Numero del bus:
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $bus->numerobus }}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500 uppercase">
                                Placa del Bus:
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $bus->placa }}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500 uppercase">
                                total de asientos de: {{ $bus->tipo }}
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $bus->capacidad }}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500 uppercase">
                                total fila de asientos de: {{ $bus->tipo}}
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $bus->fila }}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500 uppercase">
                                Marca del bus:
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $bus->marca }}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500 uppercase">
                                Color de bus:
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $bus->color }}
                            </dd>
                        </div>
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3 bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-xs font-medium text-gray-500 uppercase">
                                    Chofer:
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                 {{ $bus->chofer1->nombres }}  {{ $bus->chofer1->apellidos }}
                                </dd>
                            </div>
                            <div class="col-span-6 sm:col-span-3 bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-xs font-medium text-gray-500 uppercase">
                                    Nro de Licencia del Chofer:
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $bus->licencia }}
                                </dd>
                            </div>
                        </div>
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3 bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-xs font-medium text-gray-500 uppercase">
                                    Copiloto:
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                
                                {{ $bus->copiloto1->nombres }} {{ $bus->copiloto1->apellidos }}
                                </dd>
                            </div>
                            <div class="col-span-6 sm:col-span-3 bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-xs font-medium text-gray-500 uppercase">
                                    Nro de Licencia del Copiloto:
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $bus->licencia_copiloto }}
                                </dd>
                            </div>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500 uppercase">
                                Cantidad de Gradas del Bus:
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $bus->gradas }}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500 uppercase">
                                Posicion de gradas en fila:
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $bus->gradas_posicion }}
                            </dd>
                        </div>
                        
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500 uppercase">
                                Atributos del bus:
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $bus->atributos }}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500 uppercase">
                                Cantidad de televisiones del bus:
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $bus->tvs }}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-6 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500 uppercase">
                                Ubicacion por fila de asientos las televisiones del bus:
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $bus->filas }}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500 uppercase">
                                Foto del Bus:
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $bus->imagen }}
                            </dd>                   
                            <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"> 
                                <a href="{{$bus->imagen}}"  >
                                <img src= "{{$bus->imagen}}" alt="" width="150px"></a>                                  
                            </td>  
                        </div>
                        
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500 uppercase">
                                Fecha de Registro:
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $bus->created_at->format('d/m/Y H:m:s') }}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500 uppercase">
                                Ultima actualización:
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $bus->updated_at->format('d/m/Y H:m:s') }}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
  
        </div>
    </div>
</x-app-layout>
