<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Rutas
        </h2>
    </x-slot>
    <div class="py-12 bg-gray-200">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="my-2 flex items-center justify-between">
                    <form class="block relative" method="get" action="{{ route('rutas') }}">
                        
                    </form>
                    <a href="{{ route('rutas.create') }}" class="flex items-center bg-indigo-700 hover:bg-indigo-600 text-white rounded shadow-lg px-4 py-2">
                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        insertar
                    </a>
                </div>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 overflow-x-auto py-4">
                    <div class="inline-block min-w-full rounded-lg overflow-hidden bg-white shadow-xl ">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider bg-gray-400">
                                        <b>Origen</b>
                                    </th>                 
                                    <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider bg-gray-400">
                                        <b>Destino</b>
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider bg-gray-400">
                                        <b>Descripcion</b>
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 text-right text-xs font-semibold text-gray-900 uppercase tracking-wider bg-gray-400">
                                        <b>---</b>
                                    </th>  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $rutas as $ruta )
                                    <tr>
                                    <!--
                                        <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">
                                                <p class="text-gray-900 whitespace-no-wrap capitalize">
                                                     
                                                <a href="{{ route('ventas', $ruta->id) }}" class="flex items-center text-gray-400 hover:text-gray-700">
                                                    <button class="btn btn-danger">{{ $ruta->ruta }}</button> 
                                                </a>
                                                </p>
                                            </div>
                                        </td>
                                        -->
                                        <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $ruta->origen }}</p>
                                        </td>
                                        
                                        <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $ruta->destino }}</p>
                                        </td>
                                        
                                        <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $ruta->descripcion }}</p>
                                        </td>
                                        <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm flex items-center justify-end space-x-2">
                                        
                                             <a href="{{ route('rutas.edit', $ruta->id) }}" class="flex items-center text-gray-400 hover:text-gray-700">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                            </a>
                                            
                                            <!--
                                            <form method="post" action="{{ route('rutas.delete') }}">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        
                                            @method('delete')
                                              {{ csrf_field() }}
                                                
                                    
                                          </form>
                                            <!-->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                  
                   
                </div>

            </div>
        </div>
    </div>

</x-app-layout>