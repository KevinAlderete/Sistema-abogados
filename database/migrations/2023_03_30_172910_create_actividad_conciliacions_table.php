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
        Schema::create('actividad_conciliacions', function (Blueprint $table) {
            $table->id();
            $table->string('titulo',100);
            $table->string('descripcion',255)->nullable();
            $table->string('direccion',255)->nullable();
            $table->string('fecha');
            $table->string('hora');
            $table->foreignId('id_expediente')->constrained('expedientes')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('actividad_conciliacions');
    }
};
