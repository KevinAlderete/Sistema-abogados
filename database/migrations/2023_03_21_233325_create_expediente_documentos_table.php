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
        Schema::create('expediente_documentos', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('tipo_documento',100);
            $table->string('n_acta',10);
            $table->string('folio',10);
            $table->enum('tipo_acta',array('Acuerdo total','Inasistencia de las partes','Inasistencia de una de las partes','Falta de acuerdo','Acuerdo parcial'))->nullable();
            $table->string('descripcion',255)->nullable();
            $table->string('documento',100);
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
        Schema::dropIfExists('expediente_documentos');
    }
};
