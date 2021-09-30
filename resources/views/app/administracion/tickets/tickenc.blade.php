<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>imprimir encomienda</title>
        <style>
            h4{
            text-align: center;
            text-transform: uppercase;
            }
            html {
            margin: 5;
            }
            
        </style>
    </head>
    <body>
        <center><strong> EXPRESO TARIJA</strong>
            <h5> SUC. N° 5 BOLETERIA POTOSÍ </h5> 
            Av. Las Banderas. Zona Lecherias          
        </center> 
        
        <div style="border-bottom: 1px dashed black;">
        </div>
        <p style="font-size:60%;"><center> BOLETA DE VENTA </center></p>
        <p style="font-size:60%;"><center>{{ $encomiendas->codigo }}</center></p>

        <table style="width:100%;border-collapse:collapse" width="100%" cellspacing="10">
            <tbody>
                <tr>
                    <td>
                        <p style="font-size:60%;" cellspacing="5">FECHA: {{date(now()->format('m/d/Y'))}}</p>
                    </td>
                    <td>
                        <p style="font-size:60%;">HORA: {{ date(now()->format('H:i')) }}</p>
                    </td>
                </tr>
                <tr>
                    <td style="border-bottom: 1px dashed black;"></td>
                    <td style="border-bottom: 1px dashed black;"></td>
                    <td style="border-bottom: 1px dashed black;"></td>
                </tr> 
                <tr>
                    <td style="text-transform:uppercase; font-size:60%;">origen:</td>
                    <td style="text-transform:uppercase; font-size:60%;">{{ $encomiendas->origen }}</td>
                </tr>
                <tr>
                    <td style="text-transform:uppercase; font-size:60%;">Destino:</td>
                    <td style="text-transform:uppercase; font-size:60%;"><strong>{{ $encomiendas->destino }}</strong></td>
                </tr>
                <tr>
                    <td style="border-bottom: 1px dashed black;"></td>
                    <td style="border-bottom: 1px dashed black;"></td>
                    <td style="border-bottom: 1px dashed black;"></td>
                </tr> 
                <tr>
                    <td style="text-transform:uppercase; font-size:60%;">Detalle</td>
                    <td style="text-transform:uppercase; font-size:60%;">{{ $encomiendas->detalle }}</td>
                </tr>
                <tr>
                    <td style="border-bottom: 1px dashed black;"></td>
                    <td style="border-bottom: 1px dashed black;"></td>
                    <td style="border-bottom: 1px dashed black;"></td>
                </tr> 
                <tr>
                    <td style="text-transform:uppercase; font-size:60%;">Estado</td>
                    <td style="text-transform:uppercase; font-size:60%;">{{ $encomiendas->estado }}</td>
                </tr>
            </tbody>
	    </table>
        <table style="width:100%;border-collapse:collapse" width="100%" border="1">
            <tbody>
                <tr>
                    <td style="text-transform:uppercase; font-size:60%; border-bottom: 1px dashed green;">Remitente</td>
                    <td style="text-transform:uppercase; font-size:60%;">{{ $encomiendas->remitente }}</td>
                </tr>
                <tr>
                    <td style="text-transform:uppercase; font-size:60%;">Destinatario</td>
                    <td style="text-transform:uppercase; font-size:60%;">{{ $encomiendas->destinatario }}</td>
                </tr>      
            </tbody>
        </table>
    </body>
</html>