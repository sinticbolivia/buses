<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Usuarios
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Editar Usuario</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Editar la información de Usuario
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                            @method('put')
                            {{ csrf_field() }}
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="nombres" class="block text-sm font-medium text-gray-700">Nombres</label>
                                            <input type="text" name="nombres" id="nombres" value="{{  old('nombres') ? old('nombres') : $usuario->nombres }}" autocomplete="nombres" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="nombres" class="mt-2" />
                                        </div>
                        
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="apellidos" class="block text-sm font-medium text-gray-700">Apellidos</label>
                                            <input type="text" name="apellidos" id="apellidos" value="{{ old('apellidos') ? old('apellidos') : $usuario->apellidos }}" autocomplete="apellidos" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="apelidos" class="mt-2" />
                                        </div>

                                        <div class="col-span-6 sm:col-span-2">
                                            <label for="ci" class="block text-sm font-medium text-gray-700">Cedula de Identidad</label>
                                            <input type="text" name="ci" id="ci" autocomplete="ci" value="{{ old('ci') ? old('ci') : $usuario->ci }}" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="ci" class="mt-2" />
                                        </div>
                        
                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                                            <input type="text" name="email" id="email" value="{{ old('email') ? old('email') : $usuario->email }}" autocomplete="email" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="email" class="mt-2" />
                                        </div>
                        
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="rol" class="block text-sm font-medium text-gray-700">Rol</label>
                                            <select id="rol" name="rol" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-yellow-200 focus:border-yellow-200 sm:text-sm">
                                                <option value="administrador" {{ $usuario->rol == 'administrador' ? 'selected' : '' }} >Administrador</option>
                                                <option value="chofer" {{ $usuario->rol == 'chofer' ? 'selected' : '' }} >Chofer</option>
                                                <option value="copiloto" {{ $usuario->rol == 'copiloto' ? 'selected' : '' }} >Copiloto</option>
                                                <option value="cliente" {{ $usuario->rol == 'cliente' ? 'selected' : '' }} >Cliente</option>
                                                <option value="vendedor" {{ $usuario->rol == 'vendedor' ? 'selected' : '' }} >Vendedor</option>
                                            </select>
                                            <x-jet-input-error for="rol" class="mt-2" />
                                        </div>
                        
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                                            <select id="estado" name="estado" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-yellow-200 focus:border-yellow-200 sm:text-sm">
                                               
                                                <option value="de baja" {{ $usuario->estado == 'de baja' ? 'selected' : '' }} >De baja</option>
                                                <option value="activo" {{ $usuario->estado == 'activo' ? 'selected' : '' }} >Activo</option>
                                            </select>
                                            <x-jet-input-error for="estado" class="mt-2" />
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-100 text-right sm:px-6 flex justify-between">         
                                    <a href="{{ route('usuarios') }}" class="py-2 px-4 border-transparent text-sm font-medium rounded-md text-gray-700 bg-white shadow-sm focus:outline-none flex items-center border hover:border-gray-500 ">
                                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path></svg>
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
