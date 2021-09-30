<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>imprimir boleto</title>
        <style>
            tbody {
                margin: 15px;
                padding: 15px;
            }
            html {
                margin: 5;
            }
            
        </style>
    </head>
    <body style="margin-right: 0;">

        <center><strong> EXPRESO TARIJA</strong>
            <h5> SUC. N° 5 BOLETERIA POTOSÍ </h5> 
            Av. Las Banderas. Zona Lecherias
        </center>
        <div style="border-bottom: 1px dashed black;">
        </div>
        <table cellspacing="5" class="table">		
		<tbody>
			<tr>
                <td style="font-size:60%;">N° BOLETO</td>
				<td style="font-size:60%;">{{ $boleto->id }}</td>
            </tr>
            <tr>
                <td class="text-xs" style="font-size:60%;">SALE DE:</td>
                <td class="text-xs" style="font-size:60%;">DESTINO:</td>
                <td class="text-xs" style="font-size:60%;" align="right"><strong>CARRIL: </strong></td>
			</tr>
            <tr>
				<td style="text-transform:uppercase; font-size:60%;">{{ $boleto->viaje->origen }}</td>
				<td style="text-transform:uppercase; font-size:60%;"><strong>{{ $boleto->viaje->destino }}</strong></td>
				<td style="text-transform:uppercase; font-size:60%;" align="right"><strong>{{ $boleto->viaje->numero_carril }}</strong></td>
			</tr>    
            <tr>
                <td style="border-bottom: 1px dashed black;"></td>
                <td style="border-bottom: 1px dashed black;"></td>
                <td style="border-bottom: 1px dashed black;"></td>
            </tr>                
            <tr>
                <td style="font-size:60%;">FECHA:</td>
                <td style="font-size:60%;">HORA DE SALIDA:</td>
			</tr>
            <tr>
				<td style="text-transform:uppercase; font-size:60%;"><strong>{{ $boleto->viaje->fecha->format('d/m/Y') }}</strong></td>
				<td style="text-transform:uppercase; font-size:60%; border-bottom:1px solid"><strong>{{ $boleto->viaje->hora }}</strong></td>
			</tr>   
            <tr>
                <td style="border-bottom: 1px dashed black;"></td>
                <td style="border-bottom: 1px dashed black;"></td>
                <td style="border-bottom: 1px dashed black;"></td>
            </tr> 
            <tr>
                <td style="font-size:60%;">PLACA:</td>
                <td style="font-size:60%;">MARCA:</td>
                <td style="font-size:60%;" align="right">N° BUS:</td>
            </tr> 
            <tr>
				<td style="text-transform:uppercase; font-size:60%;">{{ $boleto->viaje->placa }}</td>
				<td style="text-transform:uppercase; font-size:60%; font-size:60%;">{{ $boleto->viaje->marca }}</td>
				<td style="text-transform:uppercase; font-size:60%;" align="right">{{ $boleto->viaje->numerobus }}</td>
            </tr>    
            <tr>
                <td></td>
            </tr>      
            <tr>
                <td style="font-size:60%;">CONDUCTOR:</td>
                <td style="font-size:60%;" align="right">LICENCIA:</td>
			</tr>
            <tr>
				<td style="text-transform:uppercase; font-size:60%;">{{ $boleto->viaje->bus->chofer1->nombres }} {{ $boleto->viaje->bus->chofer1->apellidos }}</td>
				<td style="text-transform:uppercase; font-size:60%;" align="right">{{ $boleto->viaje->bus->licencia }}</td>
            </tr> 
            <tr>
                <td style="font-size:60%;">RELEVO:</td>
                <td style="font-size:60%;" align="right">LICENCIA:</td>
			</tr>
            <tr>
				<td style="text-transform:uppercase; font-size:60%;">{{ $boleto->viaje->bus->copiloto1->nombres }} {{ $boleto->viaje->bus->copiloto1->apellidos }}</td>
				<td style="text-transform:uppercase; font-size:60%;" align="right">{{ $boleto->viaje->bus->licencia_copiloto }}</td>
            </tr>
            <tr>
                <td style="font-size:60%;">VENDEDOR:</td>
				<td style="text-transform:uppercase; font-size:60%;"> {{ $boleto->venta->usuario->nombres }} {{ $boleto->venta->usuario->apellidos }} </td>
			</tr>         
		</tbody>
	</table>
    <table  style="width:100%;border-collapse:collapse" width="200%" border="1">
        <thead>
            <tr>
                <th style="font-size:60%; border-style:dotted;">N° ASIENTO</th>
                <th style="font-size:60%; border-style:dotted;">PASAJERO</th>
                <th style="font-size:60%; border-style:dotted;">PRECIO Bs</th>
            </tr>
        </thead>
        <tbody>
            <tr>
				<td style="text-transform:uppercase; font-size:60%; border-style:dotted;" align="center" >{{ $boleto->numero_asiento }}</td>
				<td style="text-transform:uppercase; font-size:60%; border-style:dotted;">{{ $boleto->cliente->nombres }} {{ $boleto->cliente->apellidos }}</td>
                <td style="text-transform:uppercase; font-size:60%; border-style:dotted; " align="right">{{ number_format($boleto->precio, 2) }}</td>
            </tr>
        </tbody>
    </table>
    <p style="font-size:60%;">FECHA DE VENTA: {{date(now())}}</p>
    </body>
</html>