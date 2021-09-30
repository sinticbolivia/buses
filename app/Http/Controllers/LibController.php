<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibController extends Controller
{

    public function index()
    {
        return view('lib.index');
    }

    public function libelula()
    {
        //$url="http://www.todotix.com:10365/rest/deuda/registrar";
        $url="http://www.todotix.com:10365/rest/deuda/registrar";

        $data = array(
            'appkey' => 'aa5bc37a-14a3-5934-b2e9-bec7777cd4d8',
            'email_cliente' => '',
            'identificador_deuda' => '',
            'descripcion'=> 'Pago Compra Online',
            'nombre_cliente' => '',
            'apellido_cliente' => '',
            'numero_documento' => '',
            'tipo_factura' => '',
            'razon_social' => '',

            'lineas_detalle_deuda' => array('cantidad' => 1,
                                            'concepto' => 'prueba',
                                            'costo_unitario' => 80,
                                            'codigo_producto' => '',
                                            
                                            )
        );
        //create a new cURL resource
        $ch = curl_init($url);

        //setup request to send json via POST
        /* $data = array(
            'username' => 'codexworld',
            'password' => '123456'
        ); */
        $payload = json_encode(array($data));

        //attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        //set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        //return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute the POST request
        $result = curl_exec($ch);

        //close cURL resource
        curl_close($ch);

        return $result;
    }

    public function get()
    {
        
    }
}
