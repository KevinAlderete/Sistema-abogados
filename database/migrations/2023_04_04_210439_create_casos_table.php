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
        Schema::create('casos', function (Blueprint $table) {
            $table->id();
            $table->string('n_caso',100);
            $table->date('fecha_inicio');
            $table->date('fecha_final')->nullable();
            $table->string('descripcion',255)->nullable();
            $table->enum('estado',array('En proceso','Archivado'));
            $table->foreignId('id_cliente')->constrained('clientes')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('casos');
    }
};
