<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Rutas
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Nuevo </h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Registrar
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="{{ route('rutas.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6 bg-gradient-to-r from-yellow-300 via-red-400 to-pink-400">
                                    <div class="grid grid-cols-6 gap-6">
                                    
                                        <div class="col-span-6 sm:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">Origen</label>
                                            <!--<input type="text" name="ruta" id="ruta" value="{{ old('ruta') }}" autocomplete="ruta" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> -->
                                            <select id="origen" name="origen" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="Potosi">Potosi</option>
                                            </select>
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                        <label class="block text-sm font-medium text-gray-700">Destino</label>
                                            <select id="destino" name="destino" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="Tarija">Tarija</option>
                                                <option value="Camargo">Camargo</option>
                                            </select>
                                           
                                            <x-jet-input-error for="ruta" class="mt-2" />
                                        </div>
                                        
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="descripcion" class="block text-sm font-medium text-gray-700">descripcion</label>
                                            <input type="text" name="descripcion" id="descripcion" value=" {{ old('descripcion') }}" autocomplete="descripcion" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="descripcion" class="mt-2" />
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="px-4 py-3 bg-red-50 text-right sm:px-6 flex justify-end">
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