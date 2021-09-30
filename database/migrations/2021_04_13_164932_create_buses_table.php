<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->string('chofer', 50);
            $table->string('placa', 15)->unique();
            $table->integer('capacidad');
            $table->integer('fila');
            $table->integer('gradas');
            $table->integer('gradas_posicion');
            $table->string('copiloto', 50);
            $table->string('atributos', 150)->nullable();
            $table->text('imagen')->nullable();
            $table->string('licencia',15 )->nullable();
            $table->string('licencia_copiloto',15 )->nullable();
            $table->string('marca',20)->nullable();
            $table->string('color', 20)->nullable();
            $table->integer('numerobus')->nullable();
            $table->string('tipo', 20);
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->foreign('usuario_id')->references('id')->on('users');
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
        Schema::dropIfExists('buses');
    }
}
