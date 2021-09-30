<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="mt-2 md:mt-0 md:col-span-2">
        <form wire:submit.prevent="submitForm">
            {{ csrf_field() }}
            <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-2 bg-gradient-to-r">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label class="block text-sm font-medium text-gray-700">Origen</label>
                        <select wire:model.lazy="origin" id="origen" name="origen" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-yellow-200 focus:border-yellow-200 sm:text-sm" required>
                            <option hidden selected> Seleccione el origen</option>
                            <option value="Potosi">Potosi</option>
                        </select>
                        <x-jet-input-error for="origin" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label class="block text-sm font-medium text-gray-700">Destino</label>
                        <select wire:model.lazy="destination" id="destino" name="destino" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-yellow-200 focus:border-yellow-200 sm:text-sm" required>
                            <option hidden selected> Seleccione el destino</option>
                            <option value="Tarija">Tarija</option>
                            <option value="Camargo">Camargo</option>
                        </select>
                        <x-jet-input-error for="destination" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha de Salida</label>
                        <input wire:model.lazy="departureDate" type="date" name="fecha" id="fecha" placeholder="Introduce una fecha"
                        required min=<?php $hoy = date("Y-m-d");
                            echo $hoy;?>
                        class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"/>
                        <x-jet-input-error for="fecha" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="pasajeros" class="block text-sm font-medium text-gray-700">Pasajeros</label>
                        <input wire:model.lazy="quantityPassengerSeats" required type="number" min="1" max="32" name="pasajeros" id="pasajeros" value="1" autocomplete="pasajeros" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        <x-jet-input-error for="pasajeros" class="mt-2" />
                    </div>
                </div>
            </div>
            </div>
            
            <input type="submit" value="buscar"
                class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-1 px-2 mt-2 border border-gray-400 rounded shadow">
            @if($trips&&count($trips) > 0)
            <div class="flex flex-col w-2/3 items-center">
                @foreach ($trips as $trip)
                <div class="flex bg-yellow-500 p-4 rounded-lg mt-2">
                    <div class="flex flex-col w-2/3 pr-4 bg">
                        <p class="text-2xl font-black mb-2 text-gray-50">{{$trip->origen}} - {{$trip->destino}}</p>
                        <p class="text-lg font-light leading-5 text-gray-900">{{$trip->fecha->format('j F, Y')}}</p>
                        <p class="text-lg font-light leading-5 text-gray-900">{{$trip->hora}}</p>
                        <p class="text-lg font-light leading-5 text-gray-900">Bus {{$trip->bus->tipo}}</p>
                        <div class="flex h-full items-end text-gray-300 hover:text-gray-50">
                            <button class="text-sm font-semibold flex items-center space-x-2"
                                wire:click="setCurrentTrip({{$trip->id }})"
                            >
                                <span>Comprar boleto</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="w-1/3">
                        <img class="w-full hover:animate-bounce rounded-lg" src="{{$trip->bus->imagen}}" alt="" />
                    </div>
                </div>
                @endforeach
            </div>
            @endif
            @if($trips&&$trips&&count($trips) == 0)
            <p>No se encontro viajes en esa fecha</p>
            @endif
        </form>
    </div>
</div>