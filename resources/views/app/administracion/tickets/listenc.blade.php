<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>imprimir lista de envio de encomienda </title>
        <style>
            h1{
            text-align: center;
            text-transform: uppercase;
            }
            .contenido{
            font-size: 20px;
            }
            #primero{
            background-color: #ccc;
            }
            #segundo{
            color:#44a359;
            }
            #tercero{
                background-color: #ccc;
            }
        </style>
    </head>
    <body>
        <h1>Expreso Tarija</h1>
        <hr>
        <div class="contenido">
        <p>{{date(now())}}</p>   
        </div>
            <table class="hola" >
                <thead>                        
                    <tr style="height:163px">
                        <th style="text-transform: capitalize color: black; width:50px; height:50px">
                            fecha 
                        </th>                  
                        <th style=" color: black; width:50px; height:50px">
                            Codigo
                        </th>
                        <th style=" color: black; width:50px; height:50px">
                            Remitente
                        </th>                                   
                        <th style=" color: black; width:50px; height:50px">
                            Destinatario
                        </th>
                        <th style=" color: black; width:50px; height:50px">
                            Origen y Destino
                        </th>                                
                        <th style=" color: black; width:50px; height:50px">
                            Cantidad
                        </th>                                   
                        <th style=" color: black; width:50px; height:50px">
                            Estado
                        </th>
                    </tr>                              
                </thead>                          
                <tbody>
                    @foreach($encomiendas as $encomienda)                              
                    <tr>                                   
                        <td style=" color: black; width:80px; height:50px">{{ $encomienda->fecha->format('d-m-Y') }}</td>
                        <td style=" color: black; width:80px; height:50px">{{ $encomienda->codigo }}</td>
                        <td style=" color: black; width:80px; height:50px">{{ $encomienda->remitente }}</td>
                        <td style=" color: black; width:80px; height:50px">{{ $encomienda->destinatario }}</td>                                      
                        <td style=" color: black; width:80px; height:50px">{{ $encomienda->origen }} -
                        {{ $encomienda->destino }} </td>
                        <td style=" color: black; width:80px; height:50px">{{ $encomienda->cantidad }}</td>
                        <td style=" color: black; width:80px; height:50px">{{ $encomienda->estado }}</td>
                    </tr>                                   
                    @endforeach
                </tbody>
            </table>
    </body>
</html>