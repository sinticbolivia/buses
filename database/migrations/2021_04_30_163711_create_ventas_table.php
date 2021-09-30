<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
           // $table->date('fecha');
            //$table->time('hora');
           
           // $table->integer('numero_boleto');
            //$table->integer('precio');
            //$table->enum('tipo', ['venta', 'reserva']);          
            //$table->integer('numero_asiento');
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->foreign('usuario_id')->references('id')->on('users');
            //$table->unsignedBigInteger('cliente_id')->nullable();
           // $table->foreign('cliente_id')->references('id')->on('users');
            $table->unsignedBigInteger('viaje_id')->nullable();
            $table->foreign('viaje_id')->references('id')->on('viajes');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
