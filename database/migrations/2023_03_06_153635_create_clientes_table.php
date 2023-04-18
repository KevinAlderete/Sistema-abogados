<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->string('apellidos',100);
            $table->enum('genero',array('Masculino','Femenino'));
            $table->string('dni_ruc',15);
            $table->string('empresa',150)->nullable();
            $table->string('email',50)->nullable();
            $table->string('telefono',15)->nullable();
            $table->string('direccion',100)->nullable();
            $table->string('referencia',255)->nullable();
            $table->enum('estado_cliente',array('Activo','Inactivo'));
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
        Schema::dropIfExists('clientes');
    }
};
