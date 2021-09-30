<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Usuarios
        </h2>
    </x-slot>
    
    <div class="py-5 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="my-2 flex items-center justify-between">
                    <form class="block relative" method="get" action="{{ route('usuarios') }}">
                        <span class="absolute inset-y-0 left-0 flex items-center h-full pl-2">
                            <svg viewBox="0 0 24 24" class="w-4 h-4 text-gray-500 fill-current">
                                <path d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z"></path>
                            </svg>
                        </span>
                        <input placeholder="Buscar"
                            name="search" id="search" value="{{ $search }}"
                            class="appearance-none rounded border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                    </form>
                     <a href="{{ route('usuarios.create') }}" class="flex items-center bg-yellow-500 hover:bg-yellow-600 text-white rounded shadow-lg px-4 py-2">
                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        Nuevo Usuario
                    </a>
                    </div>
                </div>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 overflow-x-auto py-4">
                    <div class="inline-block min-w-full rounded-lg overflow-hidden bg-white shadow-xl ">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th class="px-5 py-3 border-b-2 border-gray-400 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider bg-gray-300">
                                        Nombres & Apellidos
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-400 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider bg-gray-300">
                                        Correo Electronico
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-400 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider bg-gray-300">
                                        Rol
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-400 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider bg-gray-300">
                                        Estado
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-400 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider bg-gray-300">
                                        Fecha Registro
                                    </th>
                            
                                    <th class="px-5 py-3 border-b-2 border-gray-400 text-right text-xs font-semibold text-gray-900 uppercase tracking-wider bg-gray-300">
                                         ---
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $usuarios as $usuario )
                                    <tr>
                                        <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">
                                                <p class="text-gray-900 whitespace-no-wrap capitalize">
                                                    {{ $usuario->nombres }} {{ $usuario->apellidos }}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $usuario->email }}</p>
                                        </td>
                                        <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $usuario->rol }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                                            @if ( $usuario->estado == 'activo' )
                                                <span class="bg-green-300 text-green-700 px-3 py-1 rounded-full">Activo</span>
                                            @else
                                                <span class="bg-red-300 text-red-700 px-3 py-1 rounded-full">De Baja</span>
                                            @endif
                                        </td>
                                        <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $usuario->created_at->format('d/m/Y H:m:s') }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm flex items-center justify-end space-x-2">
                                            <a href="{{ route('usuarios.show', $usuario->id) }}" title="ver mas informacion de usuario" class="flex items-center text-gray-400 hover:text-gray-700">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                            </a>
                                            <a href="{{ route('usuarios.edit', $usuario->id) }}" title="editar usuario" class="flex items-center text-gray-400 hover:text-gray-700">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                            </a>
                                            <button x-data @click="$dispatch('open-dialog', {{ $usuario->id }})" 
                                                class="flex items-center text-gray-400 hover:text-gray-700 cursor-pointer">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="my-4">
                        {!! $usuarios->links() !!}
                    </div>
                </div>

                <!-- INICIO DIALOGO DE CONFIRMACION -->
                <div x-data="{id: 0, open: false}"
                    x-show="open"
                    @open-dialog.window="{ open = true, id = $event.detail }"
                    @click.away="open = false"
                    class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                                    </div>
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                            Dar de baja usuario
                                        </h3>
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500">
                                                ¿Esta seguro de eliminar este usuario? Esta acción es irreversible.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <form method="post" action="{{ route('usuarios.delete') }}">
                                    @method('delete')
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" id="id" x-model="id">
                                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                        Si, eliminar
                                    </button>
                                </form>
                                <button type="button" @click="open = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                    Cancelar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIN DIALOGO DE CONFIRMACION -->
                <!-- INICIO MODAL 
                <div x-data="{ show: false }" x-show="show" 
                    @open-modal.window="{ show = true }"
                    @click.away="show = false"
                    class="fixed inset-0 flex items-center justify-center h-screen antialiased bg-gray-900 bg-opacity-50" @click="show = true">
                    <form method="post" action="#" class="flex flex-col w-11/12 max-w-2xl mx-auto border border-gray-300 rounded-lg shadow-xl sm:w-5/6 lg:w-1/2">
                        @csrf
                        <div class="z-20 flex flex-row justify-between p-6 bg-white border-b border-gray-200 rounded-tl-lg rounded-tr-lg">
                            <p class="font-semibold text-gray-800">Add a step</p>
                            <svg @click="show = false" class="w-6 h-6 cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                        <div class="flex flex-col px-6 py-5 bg-gray-50">
                            Aqui entra el contenido del formulario
                            <form action="{{ route('usuarios.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 sm:p-2 bg-purple-200">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="nombres" class="block text-sm font-medium text-gray-700">Nombres</label>
                                            <input type="text" name="nombres" id="nombres" value="{{ old('nombres') }}" autocomplete="nombres" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="nombres" class="mt-2" />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="apellidos" class="block text-sm font-medium text-gray-700">Apellidos</label>
                                            <input type="text" name="apellidos" id="apellidos" {{ old('apellidos') }} autocomplete="apellidos" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="apelidos" class="mt-2" />
                                        </div>
                                        <div class="col-span-6 sm:col-span-2">
                                            <label for="ci" class="block text-sm font-medium text-gray-700">Cedula de Identidad</label>
                                            <input type="text" name="ci" id="ci" {{ old('ci') }} autocomplete="ci" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="ci" class="mt-2" />
                                        </div>
                        
                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                                            <input type="text" name="email" id="email" {{ old('email') }} autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <x-jet-input-error for="email" class="mt-2" />
                                        </div>
                        
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="rol" class="block text-sm font-medium text-gray-700">Rol</label>
                                            <select id="rol" name="rol" autocomplete="rol" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="administrador">Administrador</option>
                                                <option value="chofer">Chofer</option>
                                                <option value="copiloto">Copiloto</option>
                                                <option value="cliente">Cliente</option>
                                            </select>
                                            <x-jet-input-error for="rol" class="mt-2" />
                                        </div>
                        
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                                            <select id="estado" name="estado" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="activo">Activo</option>
                                                <option value="de baja">De baja</option>
                                            </select>
                                            <x-jet-input-error for="estado" class="mt-2" />
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-purple-50 text-right sm:px-6 flex justify-end">
                                    <button type="submit" class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 flex items-center">
                                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </form>
                        </div>
                        <div class="flex flex-row items-center justify-between p-5 bg-white border-t border-gray-200 rounded-bl-lg rounded-br-lg">
                            <p class="px-4 py-2 font-semibold text-gray-600 border cursor-pointer" @click="show=false">Cancelar</p>
                            <button type="submit" class="px-4 py-2 font-semibold text-white bg-blue-500 rounded">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
                 FIN MODAL -->
                 
            </div>
        </div>
    </div>
</x-app-layout>
