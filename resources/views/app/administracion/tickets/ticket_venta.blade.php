<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>imprimir boleto</title>
        <style>
        
        .contenido{
        font-size: 30px;
        }
        html {
           margin: 5;
        }
        body {
           margin: 2;
           font-family: "Montserrat", "Helvetica Neue", Helvetica, Arial, sans-serif;
           font-size: 1rem;
           line-height: 1.2;
           word-break: break-all;
        }
        .circular--square {
            width:200px;
            height:200px;
            border-radius:150px;
        }
    </style>
    </head>
    <body>
        <!--
        <img src="{{ public_path('imagen/logo.jpg') }}" width="50px" height="70px" alt="" style="border-radius;" class="circular--square">
    -->
         <center><strong> EXPRESO TARIJA</strong>
            <h5> SUC. N° 5 BOLETERIA POTOSÍ </h5> 
            Av. Las Banderas. Zona Lecherias
        </center> 
        
        <div style="border-bottom: 1px dashed black;">

        </div>
        <table class="table" cellspacing="5">
            <tbody>
                <tr>
                    <td style="text-transform:uppercase; font-size:60%;">SALE DE:</td>
                    <td style="text-transform:uppercase; font-size:60%;">DESTINO: </td>
                    <td style="text-transform:uppercase; font-size:60%;">CARRIL: </td>
                </tr>
                <tr>
                    <td style="text-transform:uppercase; font-size:60%;">{{ $venta->boletos->first() ? $venta->boletos->first()->viaje->origen : '---' }}</td>			    
                    <td style="text-transform:uppercase; font-size:60%;"><strong> {{ $venta->boletos->first() ? $venta->boletos->first()->viaje->destino : '---' }}</strong></td>
                    <td style="text-transform:uppercase; font-size:60%;" align="right"><strong> {{ $venta->boletos->first() ? $venta->boletos->first()->viaje->numero_carril : '---' }}</strong></td>
                </tr>  
                <tr>
                    <td cellpadding="5" style="border-bottom: 1px dashed black;"></td>
                    <td style="border-bottom: 1px dashed black;"></td>
                    <td style="border-bottom: 1px dashed black;"></td>
                </tr>     
                <tr>
                    <td style="text-transform:uppercase; font-size:60%;">FECHA:</td>
                    <td style="text-transform:uppercase; font-size:60%;">HORA DE SALIDA: </td>              
                    <td style="text-transform:uppercase; font-size:60%;">N° BUS: </td>
                </tr>
                
                <!-- <span style="border-bottom: 1px dashed green;"></span> -->
                <tr>
                    <td style="text-transform:uppercase; font-size:60%; "> <strong>{{ $venta->boletos->first() ? $venta->boletos->first()->viaje->fecha->format('Y-m-d') : '---' }}</strong></td>
                    <td style="text-transform:uppercase; font-size:60%; border-bottom:1px solid"> <strong>{{ $venta->boletos->first() ? $venta->boletos->first()->viaje->hora : '---' }}</strong></td>			
                    <td style="text-transform:uppercase; font-size:60%; border-bottom:1px solid" align="right">{{ $venta->boletos->first() ? $venta->boletos->first()->viaje->bus->numerobus : '---' }}</td>
                </tr>
                <tr>
                    <td style="border-bottom: 1px dashed black;"></td>
                    <td style="border-bottom: 1px dashed black;"></td>
                    <td style="border-bottom: 1px dashed black;"></td>
                </tr>
                <tr>
                    <td style="text-transform:uppercase; font-size:60%;">PLACA: </td>
                    <td style="text-transform:uppercase; font-size:60%;">MARCA: </td>
                </tr>
                <tr>
                    <td style="text-transform:uppercase; font-size:60%;"><strong>{{ $venta->boletos->first() ? $venta->boletos->first()->viaje->bus->placa : '---' }}</strong></td>
                    <td style="text-transform:uppercase; font-size:60%;">{{ $venta->boletos->first() ? $venta->boletos->first()->viaje->bus->marca : '---' }}</td>
                </tr>
                <tr>
                    <td style="text-transform:uppercase; font-size:60%;">CONDUCTOR: </td>               
                    <td style="text-transform:uppercase; font-size:60%;"  align="right">LICENCIA: </td>
                </tr>
                <tr>
                    <td style="text-transform:uppercase; font-size:60%;">{{ $venta->boletos->first() ? $venta->boletos->first()->viaje->bus->chofer1->nombres.' '.$venta->boletos->first()->viaje->bus->chofer1->apellidos : '---' }}</td>
                    <td style="text-transform:uppercase; font-size:60%;" align="right">{{ $venta->boletos->first() ? $venta->boletos->first()->viaje->bus->licencia : '---' }}</td>
                </tr>
                <tr>
                    <td style="text-transform:uppercase; font-size:60%;">RELEVO: </td>               
                    <td style="text-transform:uppercase; font-size:60%;" align="right">LICENCIA: </td>
                </tr>
                <tr>
                    <td style="text-transform:uppercase; font-size:60%;">{{ $venta->boletos->first() ? $venta->boletos->first()->viaje->bus->copiloto1->nombres.' '.$venta->boletos->first()->viaje->bus->copiloto1->apellidos : '---' }}</td>
                    <td style="text-transform:uppercase; font-size:60%;" align="right">{{ $venta->boletos->first() ? $venta->boletos->first()->viaje->bus->licencia_copiloto : '---' }}</td>
                </tr>
                <tr>
                    <td style="border-bottom: 1px dashed black;"></td>
                    <td style="border-bottom: 1px dashed black;"></td>
                    <td style="border-bottom: 1px dashed black;"></td>
                </tr>
                <tr>
                    <td style="text-transform:uppercase; font-size:60%;">BUS:</td>
                    <td style="text-transform:uppercase; font-size:60%;"> {{ $venta->boletos->first() ? $venta->boletos->first()->viaje->bus->tipo : '---' }} </td>
                </tr>
                <tr>
                    <td style="text-transform:uppercase; font-size:60%;">VENDEDOR: </td>
                    <td style="text-transform:uppercase; font-size:60%;"> {{ $venta->usuario->nombres }} {{ $venta->usuario->apellidos }}</td>
                </tr>  
                <tr>
                    <td style="border-bottom: 1px dashed black;"></td>
                    <td style="border-bottom: 1px dashed black;"></td>
                    <td style="border-bottom: 1px dashed black;"></td>
                </tr>     
            </tbody>       
	    </table>
        <br>
    
        <div class="contenido"></div>
        <table style="width:100%;border-collapse:collapse" width="100%" border="1" >
            <thead>
                <tr>
                    <th style="text-transform:uppercase; font-size:60%;">N°</th>
                    <th style="text-transform:uppercase; font-size:60%;">PASAJERO</th>
                    <th style="text-transform:uppercase; font-size:60%;">IMPORTE Bs</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $venta->boletos as $boleto )
                    <tr>
                        <td stye="border:1px solid #000" style="text-transform:uppercase; font-size:60%; ">
                            {{ $boleto->numero_asiento }}
                        </td>
                        <td stye="border:1px solid #000" style="text-transform:uppercase; font-size:60%;">
                            {{ $boleto->cliente->nombres }} {{ $boleto->cliente->apellidos }}
                        </td>
                        <td align="right" stye="border:1px solid #000" style="text-transform:uppercase; font-size:60%; ">
                            {{ number_format($boleto->precio, 2) }} 
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2" align="right" style="font-weight:bolder" style="text-transform:uppercase; font-size:50%;">
                        TOTAL Bs.
                    </td>
                    <td align="right" style="text-transform:uppercase; font-size:60%;">
                        {{ number_format($venta->boletos->sum('precio'), 2) }} Bs
                    </td>
                </tr>
            </tbody>
        </table>    
    </body>
</html>