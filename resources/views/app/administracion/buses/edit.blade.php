<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            buses
        </h2>
    </x-slot>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Editar Bus</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="{{ route('buses.update', $usuarios['bus']->id) }}" method="POST">
                        
                            @method('put')
                            {{ csrf_field() }}
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="py-3 grid grid-cols-12 gap-6">
                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo de Bus</label>
                                            <select id="tipo" name="tipo" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-yellow-200 focus:border-yellow-200 sm:text-sm">
                                                <option value="Cama" {{ $usuarios['bus']->tipo == 'Cama' ? 'selected' : '' }} >Cama</option>
                                                <option value="Semi Cama" {{ $usuarios['bus']->tipo == 'Semi Cama' ? 'selected' : '' }}>Semi Cama</option>
                                                <option value="Normal" {{ $usuarios['bus']->tipo == 'Normal' ? 'selected' : '' }}>Normal</option>
                                            </select>
                                            <x-jet-input-error for="tipo" class="mt-2" />
                                        </div>    
                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="numerobus" class="block text-sm font-medium text-gray-700">Numero del Bus</label>
                                            <input type="number" min="1" name="numerobus" id="numerobus" value="{{ old('numerobus') ? old('numerobus') : $usuarios['bus']->numerobus }}" autocomplete="numerobus" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="numerobus" class="mt-2" />
                                        </div>
                                        
                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="placa" class="block text-sm font-medium text-gray-700">Placa</label>
                                            <input type="text" name="placa" id="placa" value="{{ old('placa') ? old('placa') : $usuarios['bus']->placa }}" autocomplete="placa" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="placa" class="mt-2" />
                                        </div>                                       
                                    </div>
                                    <div class="py-3 grid grid-cols-12 gap-6">                                                                
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="capacidad" class="block text-sm font-medium text-gray-700">Total de Asientos</label>
                                            <input type="number" min="20" max="60" name="capacidad" id="capacidad" autocomplete="capacidad" value="{{ old('capacidad') ? old('capacidad') : $usuarios['bus']->capacidad }}" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="capacidad" class="mt-2" />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="fila" class="block text-sm font-medium text-gray-700">Fila de Asientos del Bus</label>
                                            <input type="number" min="2" max="4" name="fila" id="fila" value="{{ old('fila') ? old('fila') : $usuarios['bus']->fila }}" autocomplete="fila" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="fila" class="mt-2" />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="marca" class="block text-sm font-medium text-gray-700">Marca</label>
                                            <input type="text" name="marca" id="marca" value="{{ old('marca') ? old('marca') : $usuarios['bus']->marca }}" autocomplete="marca" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="marca" class="mt-2" />
                                        </div>
                                     
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="color" class="block text-sm font-medium text-gray-700">Color</label>
                                            <input type="text" name="color" id="color" value="{{ old('color') ? old('color') : $usuarios['bus']->color }}" autocomplete="color" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="color" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">                                     
                                            <label for="chofer" class="block text-sm font-medium text-gray-700">Chofer</label>
                                            <select name="chofer" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">                                         
                                            @foreach ($usuarios ['chofer'] as $chofer)                                                                   
                                            <option value="{{$chofer->id}}" selected >{{$chofer->nombres.' '.$chofer->apellidos}}</option>
                                            
                                            @endforeach
                                            </select>
                                            <x-jet-input-error for="chofer" class="mt-2" />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="licencia" class="block text-sm font-medium text-gray-700">Nro de Licencia del Chofer</label>
                                            <input type="text" name="licencia" id="licencia" value="{{ old('licencia') ? old('licencia') : $usuarios['bus']->licencia }}" autocomplete="licencia" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="licencia" class="mt-2" />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">                                     
                                            <label for="copiloto" class="block text-sm font-medium text-gray-700">copiloto</label>
                                            <select name="copiloto" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            
                                            @foreach ($usuarios['copiloto'] as $chofer)  
                                            @if($chofer->id==$usuarios['bus']->copiloto_id)                       
                                            <option value="{{$chofer->id}}" selected >{{$chofer->nombres.' '.$chofer->apellidos}}</option>
                                            @else
                                            <option value="{{$chofer->id}}">{{$chofer->nombres.' '.$chofer->apellidos}}</option>
                                            @endif
                                            @endforeach
                                            </select>
                                            <x-jet-input-error for="copiloto" class="mt-2" />
                                        </div> 
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="licencia_copiloto" class="block text-sm font-medium text-gray-700">Nro de Licencia del Copiloto</label>
                                            <input type="text" name="licencia_copiloto" id="licencia_copiloto" value="{{ old('licencia_copiloto') ? old('licencia_copiloto') : $usuarios['bus']->licencia_copiloto }}" autocomplete="licencia_copiloto" class="mt-1 focus:ring-yellow-500 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="licencia_copiloto" class="mt-2" />
                                        </div>     
                                    </div>
                                    
                                    <div class="py-3 grid grid-cols-12 gap-6">
                                        <div class="col-span-6 sm:col-span-2">
                                            <label for="gradas" class="block text-sm font-medium text-gray-700">Gradas del Bus</label>
                                            <input type="number" name="gradas" id="gradas" min="1" max="2"value="{{ old('gradas') ? old('gradas') : $usuarios['bus']->gradas }}" autocomplete="gradas" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="gradas" class="mt-2" />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="gradas_posicion" class="block text-sm font-medium text-gray-700">Posicion de gradas</label>
                                            <input type="number" name="gradas_posicion" min="1" max="3"id="gradas_posicion" value="{{ old('gradas_posicion') ? old('gradas_posicion') : $usuarios['bus']->gradas_posicion }}" autocomplete="gradas_posicion" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="gradas_posicion" class="mt-2" />
                                        </div>
                                        <div class="col-span-6 sm:col-span-7">
                                            <label for="atributos" class="block text-sm font-medium text-gray-700">Atributos</label>
                                            <input type="text" name="atributos" id="atributos" value="{{ old('atributos') ? old('atributos') : $usuarios['bus']->atributos }}" autocomplete="atributos" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="atributos" class="mt-2" />
                                        </div> 
                                    </div> 
                                    <div class="py-3 grid grid-cols-12 gap-6">  
                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="filas" class="block text-sm font-medium text-gray-700">Fila de tvs</label>
                                            <input type="text" name="filas" id="filas" value="{{ old('filas') ? old('filas') : $usuarios['bus']->filas }}" autocomplete="filas" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="filas" class="mt-2" />
                                        </div> 
                                        
                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="tvs" class="block text-sm font-medium text-gray-700">Cantidad de TVs</label>
                                            <input type="number" min="0" max="12" name="tvs" id="tvs" value="{{ old('tvs') ? old('tvs') : $usuarios['bus']->tvs }}" autocomplete="tvs" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="tvs" class="mt-2" />
                                        </div> 
                                        
                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="imagen" class="block text-sm font-medium text-gray-700">Foto del Bus</label>
                                            <input type="file" name="imagen" id="imagen" value="{{ old('imagen') ? old('imagen') : $usuarios['bus']->imagen }}" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="imagen" class="mt-2" />
                                        </div>
                                    </div>
                                
                                <div class="px-4 py-3 bg-gray-100 text-right sm:px-6 flex justify-between">
                                    <a href="{{ route('buses') }}" class="py-2 px-4 border-transparent text-sm font-medium rounded-md text-gray-700 bg-white shadow-sm focus:outline-none flex items-center border hover:border-gray-500">
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