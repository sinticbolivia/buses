<x-app-layout>
    <x-slot name="header">
        <h class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de encomiendas
        </h>
    </x-slot>
    <div class="py-5 bg-gray-200">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="my-2 flex items-center justify-between">
                    <form class="block relative" method="get" action="{{ route('encomiendas') }}">
                        <span class="absolute inset-y-0 left-0 flex items-center h-full pl-2">
                            <svg viewBox="0 0 24 24" class="w-4 h-4 text-gray-500 fill-current">
                                <path d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z"></path>
                            </svg>
                        </span>
                        <input placeholder="Buscar"
                            name="search" id="search" value="{{ $search }}"
                            class="appearance-none rounded border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                        
                    </form>
                    <div class="p-3 grid-cols-3 flex items-center space-x-4 justify-end">                          
                        <a target="blank"  title="Imprimir Lista de Encomiendas" href="{{route('pdfencomienda')}}">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                            
                        </a>                           
                        <button onclick="openModal(true)" class="bg-yellow-500 hover:bg-yellow-600 px-4 py-2 rounded text-white focus:outline-none">                               
                            <span>Nuevo Encomienda</span> 
                        </button>
                    </div>                       
                </div>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 overflow-x-auto py-4">
                    <div class="inline-block min-w-full rounded-lg overflow-hidden bg-white shadow-xl ">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>                                   
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider bg-gray-300">
                                       FECHA
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider bg-gray-300">
                                       CODIGO
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider bg-gray-300">
                                        REMITENTE
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider bg-gray-300">
                                        DESTINATARIO
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider bg-gray-300">
                                        ORIGEN & DESTINO
                                    </th>
                                 
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider bg-gray-300">
                                        DETALLE
                                    </th>                                  
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider bg-gray-300">
                                       PRECIO
                                    </th>
                                    
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider bg-gray-300">
                                       ESTADO
                                    </th>
                                    
                                    <th class="px-5 py-3 border-b-2 border-gray-200 text-right text-xs font-semibold text-gray-900 uppercase tracking-wider bg-gray-300">
                                        ---
                                    </th>  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $encomiendas as $encomienda )
                                    <tr>
                                        <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                 {{ $encomienda->fecha->format('d/m/Y H:m') }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">
                                                <p class="text-gray-900 whitespace-no-wrap capitalize">
                                                    {{ $encomienda->codigo }}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="capitalize px-5 py-3 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                 {{ $encomienda->remitente }}
                                            </p>
                                        </td>
                                        <td class="capitalize px-5 py-3 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                 {{ $encomienda->destinatario }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                 {{ $encomienda->origen }} - {{ $encomienda->destino }}
                                            </p>
                                        </td>
                                      
                                        <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $encomienda->detalle }}
                                            </p>
                                        </td>
                                                                              
                                        <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                 {{ $encomienda->precio }} Bs
                                            </p>
                                        </td>
                                      
                                        <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                                            @if ( $encomienda->estado == 'cancelado' )
                                                <span class="bg-green-400 text-gray-700 px-3 py-1 rounded-full">Cancelado</span>
                                            @else
                                                <span class="bg-red-300 text-gray-700 px-3 py-1 rounded-full">Por Pagar</span>
                                            @endif
                                    </td>
                                        <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm flex items-center justify-end space-x-2">
                                            <a title="Imprimir Ticket" target="blank" href="{{url('imprimir_enc/'.$encomienda->id)}}" class="flex items-center text-gray-900 hover:text-gray-700">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                                            </a>

                                            <a href="{{ route('encomiendas.show', $encomienda->id) }}" title="Ver mas informacion" class="flex items-center text-gray-400 hover:text-gray-700">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                            </a>                   
                                            <a href="{{ route('encomiendas.edit', $encomienda->id) }}" title="Editar Encomienda" class="flex items-center text-gray-400 hover:text-gray-700">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                            </a>
                                            <button x-data @click="$dispatch('open-dialog', {{ $encomienda->id }})" 
                                               title="Eliminar" class="flex items-center text-red-400 hover:text-gray-700 cursor-pointer">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>                          
                                             </button>
                                        </form>
                                   </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="my-4">
                        {{ $encomiendas->links() }}
                    </div>
                </div>
                <div x-data="{id: 0, open: false}"
                    x-show="open"
                    @open-dialog.window="{ open = true, id = $event.detail }"
                    @click.away="open = false"
                    class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                                    </div>
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                            Eliminar encomienda
                                        </h3>
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500">
                                                ¿Esta seguro de eliminar? Esta acción es irreversible.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <form method="post" action="{{ route('encomiendas.delete') }}">
                                    @method('delete')
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" id="id" x-model="id">
                                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                        Si, eliminar
                                    </button>
                                </form>
                                <button type="button" @click="open = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                    Cancelar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>              
            </div>
        </div>
    </div>
    
<!-- component -->

<!-- overlay -->
<div id="modal_overlay" class=" absolute inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-start md:items-center pt-10 md:pt-0">

<!-- modal -->
<div id="modal" class="pacity-0 transform -translate-y-full scale-150  relative w-10/12 md:w-1/2 h-1/2 md:h-3/4 bg-white rounded shadow-lg transition-transform duration-300">

    <!-- button close -->
    <button 
    onclick="openModal(false)"
    class="absolute -top-3 -right-3 bg-red-500 hover:bg-red-600 text-2xl w-10 h-10 rounded-full focus:outline-none text-white">
    &cross;
    </button>

    <!-- header -->
    <div class="px-4 py-3 border-b border-gray-200">
    <h2 class="text-xl font-semibold text-gray-600">Agregar nuevo encomienda</h2>
    </div>

    <!-- body -->
    <div class="mt-2 md:mt-0 md:col-span-2">
        <form action="{{ route('encomiendas.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-2 bg-gradient-to-r ">

                    <div class="grid grid-cols-6 gap-6 ">                     
                        <div class="col-span-6 sm:col-span-3">
                            <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
                            <input type="date" name="fecha" id="fecha" placeholder="Introduce una fecha" required min=<?php $hoy=date("Y-m-d"); echo $hoy;?> class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"/>
                            <x-jet-input-error for="fecha" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="codigo" class="block text-sm font-medium text-gray-700">Codigo</label>
                            <input type="text" name="codigo" id="codigo" value="{{ $code }}" autocomplete="codigo" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <x-jet-input-error for="codigo" class="mt-2" />
                        </div>
                    </div>  
                    <div class="py-3 grid grid-cols-6 gap-3">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="remitente" class="block text-sm font-medium text-gray-700">Remitente</label>
                            <input  placeholder="Nombres del remitente" type="text" name="remitente" id="remitente" value="{{ old('remitente') }}" autocomplete="remitente" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <x-jet-input-error for="remitente" class="mt-2" />
                        </div>                          
                        <div class="col-span-6 sm:col-span-3">
                            <label for="destinatario" class="block text-sm font-medium text-gray-700">Destinatario</label>
                            <input  placeholder="Nombres del destinatario" type="text" name="destinatario" id="destinatario" value="{{ old('destinatario') }}" autocomplete="destinatario" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <x-jet-input-error for="destinatario" class="mt-2" />
                        </div>                      
                    </div>
                    <div class="py-3 grid grid-cols-12 gap-6">
                        <div class="col-span-12 sm:col-span-4">
                            <label for="origen" class="block text-sm font-medium text-gray-700" >Origen</label>
                            <select id="origen" name="origen" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-yellow-200 focus:border-yellow-200 sm:text-sm">
                                <option value="Potosi">Potosi</option>                 
                            </select>
                            <x-jet-input-error for="origen" class="mt-2" />
                        </div>
                        <div class="col-span-12 sm:col-span-4">
                            <label for="destino" class="block text-sm font-medium text-gray-700" >Destino</label>
                            <select id="destino" name="destino" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-yellow-200 focus:border-yellow-200 sm:text-sm">
                                <option value="Tarija">Tarija</option>
                                <option value="Camargo">Camargo</option>
                                <option value="Yacuiba">Yacuiba</option>
                                <option value="Bermejo">Bermejo</option>                               
                            </select>
                            <x-jet-input-error for="destino" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label for="cantidad" class="block text-sm font-medium text-gray-700">Cantidad</label>
                            <input  placeholder="Cant de encomienda ej:2" min="1" type="number" name="cantidad" id="cantidad" value="{{ old('cantidad') }}" autocomplete="cantidad" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <x-jet-input-error for="cantidad" class="mt-2" />
                        </div>
                    </div>
                    <div class="py-3 grid grid-cols-6 gap-3">
                        <div class="col-span-6 sm:col-span-4">
                            <label for="detalle" class="block text-sm font-medium text-gray-700">Detalle</label>
                            <input  placeholder="Ej: cajas de sereales" type="text" name="detalle" id="detalle" value="{{ old('detalle') }}" autocomplete="detalle" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <x-jet-input-error for="detalle" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                            <label for="precio" class="block text-sm font-medium text-gray-700">Precio</label>
                            <input  placeholder="Precio Bs" min="1" type="number" name="precio" id="precio" value="{{ old('precio') }}" autocomplete="precio" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <x-jet-input-error for="precio" class="mt-2" />
                        </div>                      
                    </div>
                    <div class="py-3 grid grid-cols-6 gap-6 sm:col-span-8">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                            <select id="estado" name="estado" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-yellow-200 focus:border-yellow-200 sm:text-sm">
                                <option value="cancelado">cancelado</option>
                                <option value="por pagar">por pagar</option> 
                            </select>                              
                            <x-jet-input-error for="estado" class="mt-2" />
                        </div>
                    </div>
                </div>
                <div class="px-3 py-3 bg-gray-100 text-right sm:px-6 flex justify-end">                   
                    <button 
                        onclick="openModal(true)"
                        class="bg-yellow-500 hover:bg-yellow-400 px-4 py-2 rounded text-white focus:outline-none">
                        guardar
                    </button>             
                </div>
            </div>
        </form>
    </div>
    <!-- footer -->   
</div>
</div>
<script>
const modal_overlay = document.querySelector('#modal_overlay');
const modal = document.querySelector('#modal');

function openModal (value){
    const modalCl = modal.classList
    const overlayCl = modal_overlay

    if(value){
    overlayCl.classList.remove('hidden')
    setTimeout(() => {
        modalCl.remove('opacity-0')
        modalCl.remove('-translate-y-full')
        modalCl.remove('scale-150')
    }, 100);
    } else {
    modalCl.add('-translate-y-full')
    setTimeout(() => {
        modalCl.add('opacity-0')
        modalCl.add('scale-150')
    }, 100);
    setTimeout(() => overlayCl.classList.add('hidden'), 300);
    }
}
openModal(false)
</script>
</x-app-layout>