<?php

use App\Models\Venta;
use App\Http\Livewire\FormBySteps;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pdf\PdfController;
use App\Http\Controllers\Administracion\BusController;
use App\Http\Controllers\Administracion\RutaController;
use App\Http\Controllers\Administracion\VentaController;
use App\Http\Controllers\Administracion\ViajeController;
use App\Http\Controllers\Administracion\UsuarioController;
use App\Http\Controllers\Administracion\EncomiendaController;
use App\Http\Controllers\LibController;
use App\Http\Controllers\LibelulaController;
use App\Http\Controllers\Administracion\TransaccionesController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('servicios', function () {
    return view('servicios');
})->name('servicios');


Route::get('imagenes', function () {
    return view('imagenes');
})->name('imagenes');

Route::get('contactos', function () {
    return view('contactos');
})->name('contactos');


// Route::get('departure', function () {
//      $venta = Venta::create([
//         'viaje_id' => null,
//         'usuario_id' => 1
//     ]);
        
//     return view('departure',[
//             'venta' => $venta,
//         ]);
// })->name('departure');

Route::get('prueba', [LibController::class, 'index'])->name('lib.index');
Route::get('pruebaget', [LibController::class, 'get'])->name('lib.get');
Route::post('pruebalib/', [LibController::class, 'libelula'])->name('lib.libelula');

Route::get('departure', FormBySteps::class)->name('departure');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('imprimir',[PdfController::class,'imprimir'])->name('imprimir');
Route::get('imprimirticket/{id}',[PdfController::class,'imprimirticket'])->name('imprimirticket');
Route::get('imprimir/venta/{id}',[PdfController::class,'imprimirVenta'])->name('imprimir.ticket.venta');

Route::get('pdfencomienda',[PdfController::class,'pdfencomienda'])->name('pdfencomienda');
Route::get('imprimir_enc/{id}',[PdfController::class,'imprimir_enc'])->name('imprimir_enc');

//##libelula url
Route::get('libelula-retorno', function(){return view('welcome');})->name('libelula_retorno');
Route::post('libelula-callback', [LibelulaController::class, 'validateCallback'])->name('libelula_callback');

Route::group(['prefix' => 'admin', 'middleware' => ['auth:sanctum', 'verified']], function () {
    
    Route::group(['prefix' => 'administracion'], function () {

        Route::group(['prefix' => 'usuarios'], function () {
            Route::get('/', [UsuarioController::class, 'index'])->name('usuarios')->middleware('rol:administrador'); //para que el cliente puede ingresar
            Route::get('/create', [UsuarioController::class, 'create'])->name('usuarios.create')->middleware('rol:administrador');
            Route::post('/store', [UsuarioController::class, 'store'])->name('usuarios.store')->middleware('rol:administrador');
            Route::get('/{user}/show', [UsuarioController::class, 'show'])->name('usuarios.show')->middleware('rol:administrador');
            Route::get('/{user}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit')->middleware('rol:administrador');
            Route::put('/{user}/update', [UsuarioController::class, 'update'])->name('usuarios.update')->middleware('rol:administrador');
            Route::delete('/destroy', [UsuarioController::class, 'destroy'])->name('usuarios.delete')->middleware('rol:administrador');
        });

        Route::group(['prefix' => 'buses'], function (){
            Route::get('/', [BusController::class, 'index'])->name('buses')->middleware('rol:administrador');
            Route::get('/create', [BusController::class, 'create'])->name('buses.create')->middleware('rol:administrador');
            Route::post('/store', [BusController::class, 'store'])->name('buses.store')->middleware('rol:administrador');
            Route::get('/{bus}/show', [BusController::class, 'show'])->name('buses.show')->middleware('rol:administrador');
            Route::get('/{bus}/edit', [BusController::class, 'edit'])->name('buses.edit')->middleware('rol:administrador');
            Route::put('/{bus}/update', [BusController::class, 'update'])->name('buses.update')->middleware('rol:administrador');
            Route::delete('/destroy/{id}', [BusController::class, 'destroy'])->name('buses.delete')->middleware('rol:administrador');
            //Route::get('/destroy/{id}', [BusController::class, 'destroy'])->name('buses.delete');
        });
        Route::group(['prefix' => 'rutas'], function(){
            Route::get('/', [RutaController::class, 'index'])->name('rutas');
            Route::get('/create', [RutaController::class, 'create'])->name('rutas.create');
            Route::post('/store', [RutaController::class, 'store'])->name('rutas.store');
            Route::get('/{ruta}/edit',[RutaController::class, 'edit'])->name('rutas.edit');
            Route::put('/{ruta}/update', [RutaController::class, 'update'])->name('rutas.update');
            Route::delete('/destroy', [RutaController::class, 'destroy'])->name('rutas.delete');
        });
        Route::group(['prefix' => 'viajes'], function(){
            Route::get('/', [ViajeController::class, 'index'])->name('viajes')->middleware('rol:administrador');
            Route::get('/create', [ViajeController::class, 'create'])->name('viajes.create')->middleware('rol:administrador');
            Route::post('/store', [ViajeController::class, 'store'])->name('viajes.store')->middleware('rol:administrador');
            Route::get('/{viaje}/show', [ViajeController::class, 'show'])->name('viajes.show')->middleware('rol:administrador');
            Route::get('/{viaje}/edit', [ViajeController::class, 'edit'])->name('viajes.edit')->middleware('rol:administrador');
            Route::put('/{viaje}/update', [ViajeController::class, 'update'])->name('viajes.update')->middleware('rol:administrador');
            Route::delete('/destroy/{id}', [ViajeController::class, 'destroy'])->name('viajes.delete')->middleware('rol:administrador');
        });
        Route::group(['prefix' => 'encomiendas'], function(){
            Route::get('/', [EncomiendaController::class, 'index'])->name('encomiendas')->middleware('rol:administrador');
            Route::get('/create', [EncomiendaController::class, 'create'])->name('encomiendas.create')->middleware('rol:administrador');
            Route::post('/store', [EncomiendaController::class, 'store'])->name('encomiendas.store')->middleware('rol:administrador');
            Route::get('/{encomienda}/show', [EncomiendaController::class, 'show'])->name('encomiendas.show')->middleware('rol:administrador');
            Route::get('/{encomienda}/edit', [EncomiendaController::class, 'edit'])->name('encomiendas.edit')->middleware('rol:administrador');
            Route::put('/{encomienda}/update', [EncomiendaController::class, 'update'])->name('encomiendas.update')->middleware('rol:administrador');
            Route::delete('/destroy', [EncomiendaController::class, 'destroy'])->name('encomiendas.delete')->middleware('rol:administrador');
        });
        Route::group(['prefix' => 'ventas'], function(){
            Route::get('/', [VentaController::class, 'index'])->name('ventas')->middleware('rol:administrador');
            Route::get('/create', [VentaController::class, 'create'])->name('ventas.create')->middleware('rol:administrador');
            Route::post('/store', [VentaController::class, 'store'])->name('ventas.store')->middleware('rol:administrador');
            Route::get('/{venta}/show', [VentaController::class, 'show'])->name('ventas.show')->middleware('rol:administrador');
            Route::get('/{venta}/edit', [VentaController::class, 'edit'])->name('ventas.edit')->middleware('rol:administrador');
            Route::put('/{venta}/update', [VentaController::class, 'update'])->name('ventas.update')->middleware('rol:administrador');
            Route::delete('/destroy', [VentaController::class, 'destroy'])->name('ventas.delete')->middleware('rol:administrador');
            Route::get('consultas/ci/{ci}', [VentaController::class, 'buscarCi']);

            Route::get('asientos/reservados/{id}', [VentaController::class, 'consultaAsientos']);
     
            //Route::delete('/destroy/{id}', [EncomiendaController::class, 'destroy'])->name('encomiendas.delete');
            //Route::get('select2', 'ProductController@index');
            //Route::get('/select2-autocomplete-ajax', 'VentaController@dataAjax');
           // Route::get('/venta/find', 'Select2Ajax\VentaController@find');
        });
		Route::group(['prefix' => 'transacciones'], function()
        {
        	Route::get('/', [TransaccionesController::class, 'default'])->name('transacciones')->middleware('rol:administrador');		
        });
    });

});