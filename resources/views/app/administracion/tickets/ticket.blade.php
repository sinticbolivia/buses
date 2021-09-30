<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>imprimir lista de venta</title>
    <style>
        h1{
            text-align: center;
            text-transform: uppercase;
        }
        html {
           margin: 8;
        }
    </style>
</head>
<body>
    <h1 style=" font-size: 15px">Reporte de Ventas del dia </h1> <br>
    <div class="contenido">
        <p>DEL: {{date(now()->format('d/m/Y'))}}</p>
    </div>
    <table>
        <thead>
            <tr>
                <td>PROPIETARIO:</td>
                <td>OMAR CASSO</td>               
            </tr>
            <tr>
                <td>NIT:</td>
                <td>139287028</td>
            </tr>       
        </thead>
        {{--
        <tbody>
            @foreach ($ventas as $venta)
                @foreach ($venta->boletos as $boleto)           
                    <tr>
                        <td>CONDUCTOR</td>
                        <td>
                            {{ $boleto->viaje->bus->chofer1->nombre }} {{ $boleto->viaje->bus->chofer1->apellidos }}
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
        --}}
    </table>

    <table class="min-w-full leading-normal" style="border-bottom: 1px dashed green;" >
        <thead>                        
            <tr>
                <th style=" font-size:15px">
                    FECHA
                </th>
                <th style=" font-size:15px">
                    HORA
                </th>
                <th style=" font-size:15px">
                    NOMBRES
                </th>
                <th style=" font-size:15px">
                    CI
                </th>
                <th style=" font-size:15px">
                    N° ASIENTO
                </th>
                <th style=" font-size:15px">
                    DESTINO
                </th>   
                <th style=" font-size:15px">
                    IMPORTE Bs
                </th>       
            </tr>
        </thead>    
        <tbody>
            @php $total=0 
            @endphp
            @foreach ($ventas as $venta)
                @foreach ($venta->boletos as $boleto)
                    @php $total = $total + $boleto->precio @endphp
                    <tr>
                        <td style="text-transform:uppercase; font-size:15px">
                            {{ $boleto->viaje->fecha->format('d-m-Y') }}
                        </td>
                        <td style="text-transform:uppercase; font-size:15px">
                            {{ $boleto->viaje->hora }}
                        </td>
                        <td style="text-transform:uppercase; font-size:15px" align="center">
                            {{ $boleto->cliente->nombres }} {{ $boleto->cliente->apellidos }}
                        </td>
                        <td style="text-transform:uppercase; font-size:15px" align="center">
                            {{ $boleto->cliente->ci }}
                        </td>
                        <td style="text-transform:uppercase; font-size:15px" align="center" valign="bottom">
                            {{ $boleto->numero_asiento }}
                        </td>                                       
                        <td style="text-transform:uppercase; font-size:15px">
                            {{ $boleto->viaje->destino }}
                        </td>
                        <td style="text-transform:uppercase; font-size:15px">
                            {{ number_format($boleto->precio, 2) }}                    
                        </td>
                    </tr>                 
                @endforeach               
            @endforeach        
            <tr>
                <td colspan="2" align="right" style="font-weight:bolder" style="text-transform:uppercase; font-size:10px">
                    TOTAL Bs.
                </td>
                <td align="right" style="text-transform:uppercase; font-size:5px text-align: center">
                    {{ number_format($total, 2) }}
                </td>
            </tr>           
        </tbody>
    </table>
</body>
</html>