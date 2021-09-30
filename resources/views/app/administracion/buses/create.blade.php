<x-app-layout>
    <link href="{{ asset('css/select2.min.css') }}">
    <script src="{{ asset('js/select2.full.js')}}"></script>
    <body>
        <script >
            $(document).ready(function() {
                $('.js-xample-basic-single').select2();
            });
        </script>
    </body>

    <x-slot name="header">
        <h2 class="inline-block align-top font-semibold text-xl text-gray-800 leading-tight">
            Buses 
        </h2>
    </x-slot>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                             <h3 class="text-lg font-medium leading-6 text-gray-900">Registrar Nuevo Bus</h3>                             
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="{{ route('buses.store') }}" enctype="multipart/form-data" method="POST">
                            {{ csrf_field() }}
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-2 py-5 bg-white sm:p-6 bg-gradient-to-r ">
                                    <div class="py-3 grid grid-cols-12 gap-6">
                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo de bus</label>                                           
                                            <select id="tipo" name="tipo" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-yellow-200 focus:border-yellow-200 sm:text-sm">
                                                <option value="Cama">Cama</option>
                                                <option value="Semi Cama">Semi Cama</option>
                                                <option value="Normal">Normal</option>
                                            </select>
                                            <x-jet-input-error for="tipo" class="mt-2" />
                                        </div>
                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="numerobus" class="block text-sm font-medium text-gray-700">Numero del bus</label>                                           
                                            <input placeholder="Numero del bus, ej: 52" type="number" name="numerobus" id="numerobus" value="{{ old('numerobus') }}" autocomplete="numerobus" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="numerobus" class="mt-2" />
                                        </div>  
                                        <div class="col-span-12 sm:col-span-4">
                                            <label for="placa" class="block text-sm font-medium text-gray-700" >Placa</label>
                                            <input class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="1010-DD" type="text" name="placa" id="placa" value= "{{ old('placa') }}" autocomplete="placa" >
                                            <x-jet-input-error for="placa" class="mt-2" />
                                        </div>
                                         
                                    </div>
                                    <div class="py-2 grid grid-cols-12 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="capacidad" class="block text-sm font-medium text-gray-700">Total de Asientos</label>
                                            <input x-on:change="changeEvent($event)" min="20" max="60"placeholder="Ej: 50" type="number" name="capacidad" id="capacidad" value="{{ old('capacidad') }}" autocomplete="capacidad" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="capacidad" class="mt-2" />
                                        </div>
                                                                        
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="fila" class="block text-sm font-medium text-gray-700">Fila de Asientos del Bus</label>
                                            <input  placeholder="Fila de asientos Ej:4" min="1" max="4" type="number" name="fila" id="fila" value="{{ old('fila') }}" autocomplete="fila" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="fila" class="mt-2" />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="marca" class="block text-sm font-medium text-gray-700">Marca</label>                            
                                            <input placeholder="Ej: Volvo" type="text" name="marca" id="marca" value="{{ old('marca') }}" autocomplete="marca" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="marca" class="mt-2" />
                                        </div>
                                        
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="color" class="block text-sm font-medium text-gray-700">Color</label>                                           
                                            <input placeholder="Color del Bus Ej: Azul" type="text" name="color" id="color" value="{{ old('color') }}" autocomplete="color" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="color" class="mt-2" />
                                        </div>
                                        
                                    </div>
                                    <div class="grid grid-cols-6 gap-6">
                                    
                                        <div class="col-span-6 sm:col-span-3">                                     
                                            <label for="chofer" class="block text-sm font-medium text-gray-700">Chofer</label>                    
                                            <select  class=" mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" name="chofer">
                                            <option hidden selected> Seleccione al Chofer</option>
                                            
                                            @foreach ($choferes as $chofer)                         
                                            <option value="{{$chofer->id}}">{{$chofer->nombres.' '.$chofer->apellidos}}</option>
                                            @endforeach
                                            </select>
                                            <x-jet-input-error for="chofer" class="mt-2" />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="licencia" class="block text-sm font-medium text-gray-700">Nro de Licencia del Chofer</label>
                                            <input x-model="licencia" wire:model="licencia" min="7" max="15" placeholder="ingrese su nro de licencia" type="text" name="licencia" id="licencia" value="{{ old('licencia') }}" autocomplete="licencia" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="licencia" class="mt-2" />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">                                     
                                            <label for="copiloto" class="block text-sm font-medium text-gray-700">Copiloto</label>
                                            <select class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" name="copiloto" style="/*width: 20px; height: 20px;*/">
                                            <option hidden selected> Seleccione al Copiloto</option>
                                            @foreach ($copiloto as $chofer)                         
                                            <option value="{{$chofer->id}}">{{$chofer->nombres.' '.$chofer->apellidos}}</option>
                                            @endforeach
                                            </select>
                                            <x-jet-input-error for="copiloto" class="mt-2" />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="licencia_copiloto" class="block text-sm font-medium text-gray-700">Nro de Licencia del Copiloto</label>
                                            <input placeholder="ingrese su nro de licencia" type="text" name="licencia_copiloto" id="licencia_copiloto" value="{{ old('licencia_copiloto') }}" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="licencia_copiloto" class="mt-2" />
                                        </div>
                                    </div>
                                    
                                    <div class="py-3 grid grid-cols-12 gap-6">
                                        <div class="col-span-6 sm:col-span-2">
                                            <label for="gradas" class="block text-sm font-medium text-gray-700">Gradas del bus</label>
                                            <input  placeholder="Ej: 1" type="number" min="1" max="1"name="gradas" id="gradas" value="{{ old('gradas') }}" autocomplete="gradas" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="gradas" class="mt-2" />
                                        </div>
                                        
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="gradas_posicion" class="block text-sm font-medium text-gray-700">Posicion de Gradas</label>
                                            <input  placeholder="Ej: 2" type="number" min="1" max="12"name="gradas_posicion" id="gradas_posicion" value="{{ old('gradas_posicion') }}" autocomplete="gradas_posicion" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="gradas_posicion" class="mt-2" />
                                        </div>
                                        <div class="col-span-6 sm:col-span-7">
                                            <label for="atributos" class="block text-sm font-medium text-gray-700">Atributos</label>
                                            <input  placeholder="TV, calefaccion, cama" type="text" name="atributos" id="atributos" value="{{ old('atributos') }}" autocomplete="atributos" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="atributos" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="py-3 grid grid-cols-12 gap-6"> 
                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="filas" class="block text-sm font-medium text-gray-700">Fila de TVs</label>                                           
                                            <input placeholder="Filas de TVs Ej: 1,2,3" type="text" name="filas" id="filas" value="{{ old('filas') }}" autocomplete="filas" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="filas" class="mt-2" />
                                        </div>  
                                              
                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="tvs" class="block text-sm font-medium text-gray-700">Cantidad de TVs</label>                                           
                                            <input placeholder="Cantidad de TVs Ej: 1" min="0" max="10" type="number" name="tvs" id="tvs" value="{{ old('tvs') }}" autocomplete="tvs" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="tvs" class="mt-2" />
                                        </div>  
                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="imagen" class="form-control">Foto del Bus</label>
                                            <input class="placeholder-gray-300 placeholder-opacity-200" type="file" name="imagen" id="imagen" value="{{ old('imagen') }}" 
                                                accept="image/*" autocomplete="imagen" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="imagen" class="mt-2" />
                                        </div>
                                    </div>
                                       
                                </div>
                                <div class="px-4 py-3 bg-gray-100 text-right sm:px-6 flex justify-between">
                                    <a href="{{ route('buses') }}" class="py-2 px-4 border-transparent text-sm font-medium rounded-md text-gray-700 bg-white shadow-sm focus:outline-none flex items-center border hover:border-gray-500 ">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path></svg>    
                                        Volver  
                                    </a>
                                    <div class="flex items-center space-x-4 justify-end">
                                        <button type="reset" class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 flex items-center">
                                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                            Cancelar
                                        </button>
                                        <button type="submit" class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400 flex items-center">
                                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                                            Guardar
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
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>

        <link href="{{ asset('css/select2.min.css')}}">
        <script src="{{ asset('js/select2.full.js')}}">
    </script>
    <script >
            $(document).ready(function() {
                $('.cliente_id').select2();
            });
    </script>
</x-app-layout>