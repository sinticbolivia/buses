 <form wire:submit.prevent="submitForm">
    {{ csrf_field() }}
    <span>Pasajero</span>

    <div class="grid grid-cols-6 gap-6">
        <div class="col-span-6 sm:col-span-3">
            <label for="nombres" class="block text-sm font-medium text-gray-700">Nombres</label>
            <input wire:model.lazy="name" type="text" name="nombres" id="nombres" value="{{ old('nombres') }}" autocomplete="nombres" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            <x-jet-input-error for="name" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-3">
            <label for="apellidos" class="block text-sm font-medium text-gray-700">Apellidos</label>
            <input wire:model.lazy="lastname" type="text" name="apellidos" id="apellidos" value =" {{ old('apellidos') }} " autocomplete="apellidos" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            <x-jet-input-error for="lastname" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-2">
            <label for="ci" class="block text-sm font-medium text-gray-700">Cedula de Identidad</label>
            <input wire:model.lazy="identification" type="text" name="ci" id="ci" value="{{ old('ci') }} "autocomplete="ci" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            <x-jet-input-error for="identification" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
            <input wire:model.lazy="email" type="text" name="email" id="email" value="{{ old('email') }} " autocomplete="email" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            <x-jet-input-error for="email" class="mt-2" />
        </div>
    </div>

    <span>Datos de la facturación</span>

    <div class="grid grid-cols-6 gap-6">
        <div class="col-span-6 sm:col-span-3">
            <label for="invoiceName" class="block text-sm font-medium text-gray-700">Nombre de la factura</label>
            <input wire:model.lazy="invoiceName" type="text" name="invoiceName" id="invoiceName" value="{{ old('invoiceName') }}"
                autocomplete="invoiceName" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            <x-jet-input-error for="invoiceName" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-3">
            <label for="nit" class="block text-sm font-medium text-gray-700">NIT</label>
            <input wire:model.lazy="nit" type="number" name="nit" id="nit" value="{{ old('nit') }}"
                autocomplete="nit" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            <x-jet-input-error for="nit" class="mt-2" />
        </div>    
    </div>
    <div class="mt-8 p-4">
        <div class="flex p-2 mt-4">
        
            <div class="flex-auto flex flex-row-reverse">
            <button
                            type="submit"
                            class="next mx-3 bg-indigo-600 text-white active:bg-purple-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                            type="button">
                            Siguiente
                        </button>
               </div>
        </div>
    </div>
</form>
