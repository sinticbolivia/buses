<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Registro de Buses
        </h2>
    </x-slot>
    
    <div class="py-5 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="my-2 flex items-center justify-between">
                    <form class="block relative" method="get" action="{{ route('buses') }}">             
                        <span class="absolute inset-y-0 left-0 flex items-center h-full pl-2">
                            <svg viewBox="0 0 24 24" class="w-4 h-4 text-gray-500 fill-current">
                                <path d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z"></path>
                            </svg>
                        </span>
                        <input placeholder="Buscar"
                            name="search" id="search" value="{{ $search }}"
                            class="appearance-none rounded border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                    </form>
                        <!--
                            aqui para agregar
                        <-->
                    <a href="{{ route('buses.create') }}" class="flex items-center bg-yellow-500 hover:bg-yellow-600 text-white rounded shadow-lg px-4 py-2">
                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        Agregar Bus
                    </a>              
                </div>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 overflow-x-auto py-4">
                    <div class="inline-block min-w-full rounded-lg overflow-hidden bg-white shadow-xl ">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th class="px-5 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider bg-gray-300">
                                        CHOFER
                                    </th>
                                    
                                    <th class="px-5 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider bg-gray-300">
                                        COPILOTO
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider bg-gray-300">
                                        PLACA
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider bg-gray-300">
                                        CAPACIDAD
                                    </th>                                   
                                    <th class="px-5 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider bg-gray-300">
                                        TIPO
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-300 text-right text-xs font-semibold text-gray-900 uppercase tracking-wider bg-gray-300">
                                        --- 
                                    </th>                                 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $buses as $bus )
                                    <tr>
                                        <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">
                                                <p class="text-gray-900 whitespace-no-wrap capitalize">
                                                    {{ $bus->chofer1->nombres }}    {{ $bus->chofer1->apellidos }}
                                                </p>
                                            </div>
                                        </td> 
                                        
                                        <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $bus->copiloto1->nombres }} {{ $bus->copiloto1->apellidos }}
                                            </p>
                                        </td>                                     
                                        <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm md:uppercase ">
                                            <p class="text-gray-900 whitespace-no-wrap md:uppercase">
                                                {{ $bus->placa }}
                                            </p>
                                        </td>                                 
                                        <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $bus->capacidad }}
                                            </p>
                                        </td>
                                        
                                        <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $bus->tipo }}
                                            </p>
                                        </td>
                                        <div>
                                            <td  class="px-5 py-3 border-b border-gray-200 bg-white text-sm flex items-center justify-end space-x-2">
                                                <a href="{{ route('buses.show', $bus->id) }}" title="ver mas informacion de bus" class="flex items-center text-gray-400 hover:text-gray-700">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                                </a>
                                                    <a href="{{ route('buses.edit', $bus->id) }}" title="editar bus" class="flex items-center text-gray-400 hover:text-gray-700">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                                </a>
                                                
                                                @if($bus->controlviajes->count() < 1)
                                                <form title="eliminar bus" method="post" action="{{ route('buses.delete', $bus->id) }} " >
                                                    @method('delete')
                                                    {{ csrf_field() }}  
                                                    
                                                    <button type="submit" class="flex items-center bg-red-600 text-white hover:bg-red-500 p-2 rounded">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                    </button>                         
                                                </form>
                                                @endif 
                                        
                                            </td>
                                        </div>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="my-4">
                        {!! $buses->links() !!}
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    <script>
    /*
        import Swal from 'sweetalert2';
        function confirm(id, controlviajes){
         //   alert('hola');

            if(controlviajes > 0){
               // document.getElementById('viaje').setAttribute('href', '#');
                swal('nose puede')
               // alert('hol');
                return;
            }
            swal({
                title: 'confirmar',
                text: 'confirm',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'cerrar',
                cancelButtonColor: '#fff',
                confirmButtonColor: '#3B3F5C',
                confirmButtonText: 'aceptar'
            }).then(function(result){
                if(result.value){
                    window.livewire.emit('deleteRow', id)
                    swal.close()
                }
            })
        }*/
    </script>

</x-app-layout>