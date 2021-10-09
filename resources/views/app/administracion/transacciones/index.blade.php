<?php
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Transacciones
        </h2>
    </x-slot>
    <div class="py-2 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
            	<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 overflow-x-auto py-4">
                    <div class="inline-block min-w-full rounded-lg overflow-hidden bg-white shadow-xl ">
                        <table class="min-w-full leading-normal">
                        <thead>
                        <tr>
                        	<th>ID</th>
                        	<th>ID Transaccion</th>
                        	<th>Email Cliente</th>
                        	<th>Fecha registro deuda</th>
                        	<th>Fecha del pago</th>
                        	<th>Cliente</th>
                        	<th>Monto</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pagos as $p) {!! print_r($p) !!}
                        <tr>
                        	<td>{{ $p->identificador }}</td>
                        	<td>{{ $p->id_transaccion }}</td>
                        	<td>{{ $p->email_cliente }}</td>
                        	<td>{{ $p->fecha_registro_deuda }}</td>
                        	<td>{{ $p->fecha_pago }}</td>
                        	<td>{{ $p->cliente_nombres }} {{ $p->cliente_apellidos }}</td>
                        	<td>{{ $p->monto_pagado }}</td>
                        </tr>
                        @endforeach
                        @if( !$pagos || count($pagos) <= 0 )
                        <tr><td colspan="7">No se han encontrado pagos registrados</td></tr>
                        @endif
                        </tbody>
                        </table>
					</div>
				</div>
            </div>
		</div>
	</div>
</x-app-layout>