
 <form wire:submit.prevent="submitForm">
    {{ csrf_field() }}
    <span>Pasajero</span>

    <div class="grid grid-cols-2 ">
        <div class="py-2">
            <label for="numero_tarjeta" class="block text-sm font-medium text-gray-700">Numero de Tarjeta</label>
            <input wire:model.lazy="numero_tarjeta" type="text" name="numero_tarjeta" id="numero_tarjeta" value="{{ old('numero_tarjeta') }}" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            <x-jet-input-error for="numero_tarjeta" class="mt-2" />
        </div>
</div>
<div class="grid grid-cols-2 ">

        <div class="py-2">
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input wire:model.lazy="nombre" type="text" name="nombre" id="nombre" value =" {{ old('nombre') }} " autocomplete="apellidos" class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            <x-jet-input-error for="nombre" class="mt-2" />
        </div>
</div>
<div class="grid grid-cols-4 ">

        <div class="py-2">
            <label for="fecha_expiracion" class="block text-sm font-medium text-gray-700">Fecha de Expiracion</label>
            <input wire:model.lazy="fecha_expiracion" type="text" name="fecha_expiracion" id="fecha_expiracion" value="{{ old('fecha_expiracion') }} " class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            <x-jet-input-error for="fecha_expiracion" class="mt-2" />
        </div>
      
        <div class="py-2 px-1">
            <label for="cvv" class="block text-sm font-medium text-gray-700">CVV</label>
            <input wire:model.lazy="cvv" type="text" name="cvv" id="cvv" value="{{ old('cvv') }} " class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            <x-jet-input-error for="cvv" class="mt-2" />
        </div>
</div>
<div class="grid grid-cols-2 ">

        <div class="py-2">
            <label for="envio_email" class="block text-sm font-medium text-gray-700">Una vez procesado el pago, te enviaremos tus pasajes al correo electrónico</label>
            <input wire:model.lazy="envio_email" type="text" name="envio_email" id="envio_email" value="{{ old('envio_email') }} " class="mt-1 focus:ring-yellow-200 focus:border-yellow-200 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            <x-jet-input-error for="envio_email" class="mt-2" />
        </div>
    </div>
</form>
