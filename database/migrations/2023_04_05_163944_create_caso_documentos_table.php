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
        Schema::create('caso_documentos', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('tipo_documento',100);
            $table->string('descripcion',255)->nullable();
            $table->string('documento',100);
            $table->foreignId('id_caso')->constrained('casos')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('caso_documentos');
    }
};
