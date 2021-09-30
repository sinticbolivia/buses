<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            viaje
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Editar Viaje</h3>
                            <p class="mt-1 text-sm text-gray-600">
                            editar formulario de viaje
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="{{ route('viajes.update', $viaje->id) }}" method="POST">
                            @method('put')
                            {{ csrf_field() }}
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6 shadow-3x1">
                                    <div class="grid grid-cols-6 gap-6 ">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
                                            <input type="datetime" name="fecha" id="fecha" value="{{ old('fecha') ? old('fecha') : $viaje->fecha }}" required min=<?php $hoy=date("Y-m-d"); echo $hoy;?> class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"/>
                                            <x-jet-input-error for="fecha" class="mt-2" />
                                        </div>
                                        
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="hora" class="block text-sm font-medium text-gray-700">Hora</label>
                                            <input type="time" name="hora" id="hora" value="{{ old('hora') ? old('hora') : $viaje->hora }}" autocomplete="hora" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="hora" class="mt-2" />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="origen" class="block text-sm font-medium text-gray-700">Origen</label>
                                            <select id="origen" name="origen" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-yellow-200 focus:border-yellow-200 sm:text-sm">                                              
                                                <option value="Potosi" selected="">Potosi</option>
                                            </select>            
                                            <x-jet-input-error for="origen" class="mt-2" />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="destino" class="block text-sm font-medium text-gray-700">Destino</label>
                                            <select id="destino" name="destino" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-yellow-200 focus:border-yellow-200 sm:text-sm">                                              
                                                <option value="Tarija" {{ $viaje->destino == 'Tarija' ? 'selected' : '' }} >Tarija</option>
                                                <option value="Camargo" {{ $viaje->destino == 'Camargo' ? 'selected' : '' }} >Camargo</option>
                                            </select>            
                                            <x-jet-input-error for="destino" class="mt-2" />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="precio" class="block text-sm font-medium text-gray-700">Precio Bs</label>
                                            <input type="number" name="precio" id="precio" value="{{ old('precio') ? old('precio') : $viaje->precio }}" autocomplete="precio" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">                                          
                                            <x-jet-input-error for="precio" class="mt-2" />
                                        </div>
                                        
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="numero_carril" class="block text-sm font-medium text-gray-700">Numero Carril</label>
                                            <input type="number" min="1" name="numero_carril" id="numero_carril" value="{{ old('numero_carril') ? old('numero_carril') : $viaje->numero_carril }}" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="numero_carril" class="mt-2" />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">                                     
                                            <label for="bus_id" class="block text-sm font-medium text-gray-700">bus</label>
                                                <select name="bus_id" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                @if($placas->id==$viaje->buses_id)                       
                                                <option value="{{$placas->id}}" selected >{{$placas->placa}}</option>
                                                @else
                                                <option value="{{$placas->id}}">{{$placas->placa}}</option>
                                                @endif
                                                </select>
                                            <x-jet-input-error for="bus_id" class="mt-2" />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">                                     
                                            <label for="tipo_bus" class="block text-sm font-medium text-gray-700">Tipo bus</label>
                                                <select name="tipo_bus" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                @if($tipobus->id==$viaje->tipo_bus)                       
                                                <option value="{{$tipobus->id}}" selected >{{$tipobus->tipo}}</option>
                                                @else
                                                <option value="{{$tipobus->id}}">{{$tipobus->tipo}}</option>
                                                @endif
                                                </select>
                                            <x-jet-input-error for="tipo_bus" class="mt-2" />
                                        </div>                
                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-100 text-right sm:px-6 flex justify-between">
                                        <a href="{{ route('viajes') }}" class="py-2 px-4 border-transparent text-sm font-medium rounded-md text-gray-700 bg-white shadow-sm focus:outline-none flex items-center border hover:border-gray-500 ">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                                            Volver
                                        </a>         
                                    <div class="flex items-center space-x-4 justify-end">
                                        <button type="reset" class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 flex items-center">
                                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                            Cancelar
                                        </button>
                                        <button type="submit" class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400 flex items-center">
                                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                                            Actualizar
                                        </button>                                   
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
