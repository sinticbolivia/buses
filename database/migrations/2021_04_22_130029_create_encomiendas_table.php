<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncomiendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encomiendas', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo')->unique();
            $table->string('origen', 30); 
            $table->string('destino', 30);
            $table->datetime('fecha');
            $table->string('remitente', 60);
            $table->string('destinatario', 50);
            $table->integer('cantidad');
            $table->string('detalle', 100);
            $table->string('telefono', 12)->nullable();
            $table->string('estado', 20);
            $table->double('precio'); 
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->unsignedBigInteger('ruta_id')->nullable();
            $table->foreign('ruta_id')->references('id')->on('rutas');
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
        Schema::dropIfExists('encomiendas');
    }
}
