<div class="w-full max-w-7xl mx-auto px-4">
    <div class="grid grid-cols-3 gap-4">
        <div class="flex flex-col space-y-4">
            <div class="flex justify-between items-center">
                <h4 class="font-bold text-lg">N° Venta</h4>
                <button wire:click="newBoleto" type="button" 
                    class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 flex items-center">
                    <svg class="w-4 h-4 lg:mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    <span class="hidden lg:inline">Agregar Boleto</span>
                </button>
            </div>          
            <ul class="space-y-3">            
                @foreach ( $boletos as $boleto )
                    <li class="flex items-center justify-between bg-white rounded-md shadow px-2 py-3">
                        <span title="Precio" target="blank" class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-gray-500 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M9 10a1 1 0 00-1 1v2a1 1 0 002 0v-2a1 1 0 00-1-1zm12 1a1 1 0 001-1V6a1 1 0 00-1-1H3a1 1 0 00-1 1v4a1 1 0 001 1 1 1 0 010 2 1 1 0 00-1 1v4a1 1 0 001 1h18a1 1 0 001-1v-4a1 1 0 00-1-1 1 1 0 010-2zm-1-1.82a3 3 0 000 5.64V17H10a1 1 0 00-2 0H4v-2.18a3 3 0 000-5.64V7h4a1 1 0 002 0h10z"/></svg>
                            {{ $boleto->precio}} Bs
                        </span>
                        <span title="Numero de Asiento" target="blank" class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-gray-500 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.999 511.999">
                                <path d="M6.575 32.883c-.015-.054.013.055 0 0z"/><path d="M476.941 369.752c-16.625-14.585-37.491-21.077-58.74-18.291l-226.983 29.793-8.959-86.883a490.531 490.531 0 00-33.196-139.75l-8.011-20.053a64.697 64.697 0 00-33.078-34.843c6.517-14.471 7.464-30.851 2.422-46.153a6.918 6.918 0 00-.159-.437A84.34 84.34 0 0033.511.005c-8.32-.164-16.168 3.434-21.458 9.891-5.291 6.458-7.287 14.836-5.478 22.987l75.364 328.866a7.533 7.533 0 1014.706-3.274L45.112 126.961a15.144 15.144 0 013.088-12.956c2.983-3.64 7.398-5.65 12.095-5.576l21.59.443c4.458.091 8.801.775 12.944 1.983.203.071.408.135.614.188a49.65 49.65 0 0131.619 29.112l8.011 20.053a475.475 475.475 0 0132.183 135.522l.011.124 9.007 87.361-14.305 1.877c-9.679-13.01-26.432-19.876-43.251-16.126-22.793 5.086-37.21 27.769-32.136 50.564l.029.126 18.445 76.641a20.435 20.435 0 0019.928 15.702h289.519c21.377 0 38.792-17.25 39.078-38.56h17.587c19.249 0 34.908-16.815 34.908-37.482.002-25.829-10.618-49.96-29.135-66.205zM93.548 95.051a65.104 65.104 0 00-11.352-1.239l-21.59-.443a30.075 30.075 0 00-21.714 8.536L21.267 29.551a11.889 11.889 0 012.438-10.107c2.341-2.858 5.831-4.437 9.497-4.378A69.305 69.305 0 0196.16 58.503a48.64 48.64 0 01-2.612 36.548zm31.437 401.884a5.414 5.414 0 01-5.281-4.161l-18.429-76.575c-3.232-14.672 6.054-29.255 20.724-32.528 14.691-3.278 29.32 6.01 32.615 20.774l21.51 92.49h-51.139zm346.185-38.56h-84.951a7.532 7.532 0 100 15.064h52.299c-.285 13.003-10.944 23.496-24.014 23.496H191.59l-5.464-23.496h165.045a7.532 7.532 0 100-15.064H182.622l-13.321-57.277a41.799 41.799 0 00-.429-1.717l251.289-32.983c16.891-2.219 33.528 2.996 46.844 14.677 15.257 13.386 24.008 33.39 24.008 54.882 0 12.362-8.901 22.418-19.843 22.418z"/></svg>
                            {{ $boleto->numero_asiento }} 
                        </span>                      
                        <span class="capitalize">{{ $boleto->cliente->nombres }} {{ $boleto->cliente->apellidos }}</span>
                        <div class="flex items-center">
                            <a title="Imprimir Boleto" target="blank" href="{{url('imprimirticket/'.$boleto->id)}}">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                            </a>
                            @if ( $boleto->tipo == 'reserva') 
                                <a title="Completar Venta"
                                    class="bg-green-400 rounded-md text-white hover:bg-green-500 p-1 cursor-pointer"
                                    wire:click="completarVenta({{ $boleto->id }})">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>    
                                </a>
                            @endif

                            <a title="Eliminar Boleto" class="cursor-pointer" wire:click="deleteBoleto({{ $boleto->id }})">
                                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </a>
                        </div>                       
                    </li>
                @endforeach
            </ul>
            <div class="border px-2 py-3 rounded-lg">

                @foreach ( $asientos as $fila)
                    <div class="grid gap-y-4 my-2 grid-cols-{{ $propiedades['filas'] }}">
                        @foreach ( $fila as $asiento )
                            @if ( $asiento['pasillo'] )
                                <div class="flex items-center justify-center py-2 select-none cursor-none text-xs ">
                                @if ( $asiento['tv'])
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"><path d="M21 6h-7.59l3.29-3.29L16 2l-4 4-4-4-.71.71L10.59 6H3a2 2 0 00-2 2v12c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V8a2 2 0 00-2-2zm0 14H3V8h18v12zM9 10v8l7-4z"/></svg>
                                @endif
                                </div>
                            @elseif ( $asiento['gradas'] )
                            <div class=" rounded-md flex items-center justify-center font-bold py-2 select-none cursor-none bg-gray-400 text-white">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                            </div>
                            @elseif ($asiento['reservado'] || $asiento['ocupado'])
                                <div class="bg-white rounded-md flex items-center justify-center font-bold py-2 select-none cursor-not-allowed text-xs {{ $asiento['ocupado'] ? 'bg-red-300' : '' }} {{ !$asiento['ocupado'] ? 'hover:bg-gray-300' : '' }} {{ $asiento['reservado'] ? 'bg-green-300' : '' }} {{ $asiento['gradas'] ? 'bg-gray-400 text-gray-500': '' }}">
                                    {{ $asiento['numero'] }}
                                </div>
                            @else
                                <div class="bg-white rounded-md flex items-center justify-center font-bold py-2 select-none cursor-pointer text-xs {{ $asiento['ocupado'] ? 'bg-red-200' : '' }} {{ !$asiento['ocupado'] ? 'hover:bg-gray-300' : '' }} {{ $asiento['reservado'] ? 'bg-green-300' : '' }} {{ $asiento['gradas'] ? 'bg-gray-400 text-gray-500': '' }}"
                                    wire:click="seleccionarAsiento({{ $asiento['numero'] }})">
                                    {{ $asiento['numero'] }}
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-span-2">
            @if ( $show )
                <div class="bg-white px-6 py-5 rounded-lg shadow-lg">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        <div>
                            <label for="tipo" class="block text-sm font-medium text-gray-700"><b>Tipo</b></label>
                            <select id="tipo" name="tipo" wire:model="tipo" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-yellow-200 focus:border-yellow-200 sm:text-sm">
                                <option value="venta" selected>Venta</option>
                                <option value="reserva">Reserva</option>
                            </select>
                            <x-jet-input-error for="tipo" class="mt-2" />
                        </div>

                        <div class="col-span-3">
                            <label for="ruta_id" class="block text-sm font-medium text-gray-700">Rutas</label>
                            <select name="ruta_id" wire:model="ruta_id" 
                                wire:change="cambiar()"
                                class="mt-1 focus:ring-yellow-200 focus:border-yellow-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <option hidden selected>Seleccione un Bus</option>

                                @foreach ($viajes as $viaje)                         
                                    <option value="{{$viaje->id}}">{{ $viaje->origen }} - {{ $viaje->destino }} --- {{ $viaje->bus->tipo }} </option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="ruta_id" class="mt-2" /> 
                        </div>
                        <div>
                            <label for="numero_asiento" class="block text-sm font-medium text-gray-700">Nro Asiento</label>
                            <input change="muchosasientos()" readonly wire:model="numero_asiento" type="text" name="numero_asiento" id="numero_asiento" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <x-jet-input-error for="numero_asiento" class="mt-2" />
                        </div>
                        <div>
                            <label for="precio" class="block text-sm font-medium text-gray-700">Precio</label>
                            <input x-model="precio" wire:model="precio" type="number" min="1" max="200" name="precio" id="precio" value="1" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <x-jet-input-error for="precio" class="mt-2" />
                        </div>
                        <div>
                            <label for="ci" class="block text-sm font-medium text-gray-700">CI / NIT</label>
                            <input type="text" name="ci" id="ci" wire:model="ci" wire:keydown.tab="searchCi" wire:keydown.enter="searchCi" class="ci mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            <x-jet-input-error for="ci" class="mt-2" />
                        </div>
                                                            
                        <div class="col-span-2">
                            <label for="nombres" class="block text-sm font-medium text-gray-700"> Nombres</label>
                            <input type="text" name="nombres" id="nombres" wire:model="nombres" required class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <x-jet-input-error for="nombres" class="mt-2" />
                        </div>
                        <div class="col-span-2">
                            <label for="apellidos" class="block text-sm font-medium text-gray-700">Apellidos</label>
                            <input type="text" name="apellidos" id="apellidos" wire:model="apellidos" value="" required class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <x-jet-input-error for="apellidos" class="mt-2" />
                        </div>                      
                    </div>
                    <div class="px-4 py-3 bg-gray-100 text-right sm:px-6 flex justify-between">                       
                        <a href="{{ route('ventas') }}" class="py-2 px-4 border-transparent text-sm font-medium rounded-md text-gray-700 bg-white shadow-sm focus:outline-none flex items-center border hover:border-gray-500 ">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path></svg>   
                            Volver
                        </a>
                        
                        <div class="flex items-center space-x-4 justify-end">
                            <form>
                                <input value="Actualizar" onclick="history.go(0)" type="button" class="flex items-center px-4 py-2 bg-blue-400 rounded border shadow hover:shadow-lg">
                            </form>  
                            <button wire:click="storeBoleto" type="button" 
                                class="flex items-center px-4 py-2 bg-yellow-400 rounded border shadow hover:shadow-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Vender
                            </button>
                        </div>
                    </div>             
                </div>
                <div class="py-12 px-10">
                    <div class="py-3">Asientos Ocupados 
                        <span class="py-2 px-4 bg-red-300 box-border h-10 w-10 border-4"> </span>
                    </div>
                    <div class="py-3">Asientos Reservados
                        <span class="py-2 px-4 bg-green-300 box-border h-10 w-10 border-4"> </span>
                    </div>
                    <div class="py-3">Asientos Libres
                        <span class="py-2 px-4 bg-white box-border h-10 w-10 border-4"> </span>
                    </div>
                </div>
            @endif
        </div>
    </div>  
</div> 
