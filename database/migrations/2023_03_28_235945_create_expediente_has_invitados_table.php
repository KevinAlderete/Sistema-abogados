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
        Schema::create('expediente_has_invitados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_invitado')->constrained('invitado_conciliacions')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('id_expediente')->constrained('expedientes')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expediente_has_invitados');
    }
};
