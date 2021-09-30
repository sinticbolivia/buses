<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            encomiendas
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-2 flex items-center">
                <a href="{{ route('encomiendas') }}" class="flex items-center px-3 py-2 bg-white rounded border shadow hover:shadow-lg">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Atras
                </a>
            </div>
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                           <h3 class="text-lg font-medium leading-6 text-gray-900">Nuevo </h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Registrar
                                </p>
                        </div>
                    </div>
                    <div class="mt-2 md:mt-0 md:col-span-2">
                        <form action="{{ route('encomiendas.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-2 bg-gradient-to-r ">
                                        <div class="grid grid-cols-6 gap-6 ">
                                        
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="fecha" class="block text-sm font-medium text-gray-700"><b>Fecha</b></label>
                                                <input type="date" name="fecha" id="fecha" value=" {{ old('fecha') }}" autocomplete="fecha" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                <x-jet-input-error for="fecha" class="mt-2" />
                        
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="codigo" class="block text-sm font-medium text-gray-700"><b>Codigo</b></label>
                                                <input type="text" name="codigo" id="codigo" value="{{ $code }}" autocomplete="codigo" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                <x-jet-input-error for="codigo" class="mt-2" />
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="remitente" class="block text-sm font-medium text-gray-700"><b>Remitente</b></label>
                                                <input type="text" name="remitente" id="remitente" value=" {{ old('remitente') }}" autocomplete="remitente" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                <x-jet-input-error for="remitente" class="mt-2" />
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="destinatario" class="block text-sm font-medium text-gray-700"><b>Destinatario<b></label>
                                                <input type="text" name="destinatario" id="destinatario" value=" {{ old('destinatario') }}" autocomplete="destinatario" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                <x-jet-input-error for="destinatario" class="mt-2" />
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="origen" class="block text-sm font-medium text-gray-700"><b>Origen<b></label>
                                                <input type="text" name="origen" id="origen" value=" {{ old('origen') }}" autocomplete="origen" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                <x-jet-input-error for="origen" class="mt-2" />
                                            </div>
                                            <div class="col-span-8 sm:col-span-4 ">  
                                                <label for="destino" class="block text-sm font-medium text-gray-700"><b>Destino<b></label>
                                                <select id="destino" name="destino" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option value="Camargo">Camargo</option>
                                                    <option value="Tarija">Tarija</option>
                                                    <option value="Yacuiba">Yacuiba</option>
                                                    <option value="Bermejo">Bermejo</option>
                                                    
                                                </select>
                                                <x-jet-input-error for="destino" class="mt-2" />
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-6 gap-8">
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="cantidad" class="block text-sm font-medium text-gray-700"><b>Cantidad<b></label>
                                                <input type="number" min="1" name="cantidad" id="cantidad" value=" {{ old('cantidad') }}" autocomplete="cantidad" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                <x-jet-input-error for="cantidad" class="mt-2" />
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="detalle" class="block text-sm font-medium text-gray-700"><b>Detalle<b></label>
                                                <input type="text" name="detalle" id="detalle" value=" {{ old('detalle') }}" autocomplete="detalle" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                <x-jet-input-error for="detalle" class="mt-2" />
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-6 gap-6 sm:col-span-8">
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="telefono" class="block text-sm font-medium text-gray-700"><b>Telefono</b></label>
                                                <input type="text" name="telefono" id="telefono" value=" {{ old('telefono') }}" autocomplete="telefono" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                <x-jet-input-error for="telefono" class="mt-2" />
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="estado" class="block text-sm font-medium text-gray-700"><b>Estado</b></label>
                                                <input type="text" name="estado" id="estado" value=" {{ old('estado') }}" autocomplete="estado" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                <x-jet-input-error for="estado" class="mt-2" />
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="precio" class="block text-sm font-medium text-gray-700"><b>Monto bs</b></label>
                                                <input type="text" name="precio" id="precio" value=" {{ old('precio') }}" autocomplete="precio" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                <x-jet-input-error for="precio" class="mt-2" />
                                            </div>
                                        
                                         </div>
                                    </div>
                                <div class="px-3 py-3 bg-red-50 text-right sm:px-6 flex justify-end">
                                    <button type="submit" class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 flex items-center">
                                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                                        Guardar
                                    </button>      
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>