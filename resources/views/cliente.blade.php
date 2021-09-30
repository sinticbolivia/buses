
<x-guest-layout>
    <div class="max-w-7xl mx-auto px-4 w-full sm:px-6 lg:px-8 bg-yellow-500 ">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex-shrink-0 flex items-center ">
                    <span>EXPRESO TARIJA</span>
                </div>
            </div>
        </div>
    </div>

    <div class=" bg-gray-100">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div class="w-full sm:max-w-5xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
                
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> 
                        <div class="mt-2 md:mt-0 md:col-span-2">
                        
                            <form action="{{ url('/departure')}}"> 
                            {{ csrf_field() }}
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-2 bg-gradient-to-r">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">Origen</label>
                                            <select id="origen" name="origen" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-yellow-200 focus:border-yellow-200 sm:text-sm">
                                            <option hidden selected> Seleccione el origen</option>                       
                                            <option value="Potosi">Potosi</option>
                                            </select>
                                            <x-jet-input-error for="origen" class="mt-2" />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">Destino</label>
                                            <select id="destino" name="destino" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-yellow-200 focus:border-yellow-200 sm:text-sm">
                                            <option hidden selected> Seleccione el destino</option>                                           
                                            <option value="Tarija">Tarija</option>
                                            <option value="Camargo">Camargo</option>
                                            </select>
                                            <x-jet-input-error for="destino" class="mt-2" />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha de Salida</label>
                                            <input type="date" name="fecha" id="fecha" placeholder="Introduce una fecha" required min=<?php $hoy=date("Y-m-d"); echo $hoy;?> class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"/>
                                            <x-jet-input-error for="fecha" class="mt-2" />
                                        </div>                       
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="pasajeros" class="block text-sm font-medium text-gray-700">Pasajeros</label>
                                            <input type="number" min="1" max="32" name="pasajeros" id="pasajeros" value="1" autocomplete="pasajeros" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="pasajeros" class="mt-2" />
                                        </div>                                                                                 
                                    </div>
                                </div>                   
                            </div>
                            <input type="submit" name="" id="" value="buscar"> 
                            </form>
                        </div>
                    </div>              
            </div>
        </div>
    </div>
</x-guest-layout>

    