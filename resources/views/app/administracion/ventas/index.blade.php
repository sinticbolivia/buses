<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Venta de Boletos
        </h2>
    </x-slot>
    <div class="py-2 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="my-2 flex items-center justify-between">
                    <form class="block relative" method="get" action="{{ route('ventas') }}">
                        <span class="absolute inset-y-0 left-0 flex items-center h-full pl-2">
                            <svg viewBox="0 0 24 24" class="w-4 h-4 text-gray-500 fill-current">
                                <path d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z"></path>
                            </svg>
                        </span>                       
                        <input placeholder="Buscar"
                            name="search" id="search" value="{{ $search }}"
                            class="appearance-none rounded border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />                   
                    </form>
                    <div class="flex items-center space-x-4 justify-end">
                        <a target="blank" title="Imprimir Lista" href="{{route('imprimir')}}" class=" ">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>                       
                        </a>
                        <a href="{{ route('ventas.create') }}" class="flex items-center bg-yellow-500 hover:bg-yellow-600 text-white rounded shadow-lg px-4 py-2">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                            Nuevo Venta
                        </a>
                    </div>
                </div>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 overflow-x-auto py-4">
                    <div class="inline-block min-w-full rounded-lg overflow-hidden bg-white shadow-xl ">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider bg-gray-300">
                                        Bus
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider bg-gray-300">
                                        Fecha
                                    </th>
                                    
                                    <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider bg-gray-300">
                                        Numero Asiento
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider bg-gray-300">
                                        Vendedor
                                    </th>
                                    
                                    <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider bg-gray-300">
                                        Pasajero
                                    </th>                                
                                    <th class="px-5 py-3 border-b-2 border-gray-200 text-right text-xs font-semibold text-gray-900 uppercase tracking-wider bg-gray-300">
                                        ---
                                    </th>  
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ( $ventas as $venta )
                                <tr>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <p class="text-gray-900 whitespace-no-wrap capitalize">
                                                {{ $venta->boletos->first() ? $venta->boletos->first()->viaje->bus->tipo : '---' }}
                                                
                                            </p>
                                        </div>
                                    </td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <p class="text-gray-900 whitespace-no-wrap capitalize">
                                                
                                                    {{ $venta->created_at->format('d/m/Y H:m:s') }}
                                            </p>
                                        </div>
                                    </td>
                               
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <p class="text-gray-900 px-9 whitespace-no-wrap capitalize">                                
                                                @foreach($venta->boletos as $boleto)
                                                    {{ $boleto->numero_asiento }},
                                                @endforeach
                                            </p>
                                        </div>
                                    </td>
                                    
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <p class="text-gray-900 whitespace-no-wrap capitalize">
                                                    {{ $venta->usuario->apellidos}} {{ $venta->usuario->nombres}}
                                            </p>
                                        </div>
                                    </td>
                                    
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <p class="text-gray-900 whitespace-no-wrap capitalize">
                                                @foreach($venta->boletos as $boleto)
                                                    {{ $boleto->cliente->ci}} {{ $boleto->cliente->apellidos}} {{ $boleto->cliente->nombres}} <br>
                                                @endforeach
                                            </p> 
                                        </div>
                                    </td>
                                    
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm flex items-center justify-end space-x-2">
                                        <a href="{{ route('ventas.show', $venta->id) }}" title="ver venta" class="flex items-center text-gray-400 hover:text-gray-700">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                        </a>
                                        {{--<button type="button" class="btn btn-success" wire:click='edit({{ $venta->id }})'>Editar</button> 
                                        
                                        <a href="{{ route('ventas.edit', $venta->id) }}" class="flex items-center text-gray-400 hover:text-gray-700">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                        </a> --}}
                                        <a target="blank" href="{{ route('imprimir.ticket.venta', $venta->id) }}" title="imprimir">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                                        </a>
                                        {{--
                                        <button x-data @click="$dispatch('open-dialog', {{ $venta->id }})" 
                                            class="flex items-center text-gray-400 hover:text-gray-700 cursor-pointer">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button> --}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                   
                    <div class="my-4">
                        {!! $ventas->links() !!}
                    </div>
                </div>
                
            </div>
        </div>
    </div>
   
</x-app-layout>