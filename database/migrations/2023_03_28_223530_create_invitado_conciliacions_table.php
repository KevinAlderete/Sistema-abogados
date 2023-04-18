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
        Schema::create('invitado_conciliacions', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->string('empresa',150)->nullable();
            $table->string('dni_ruc',15);
            $table->string('email',50)->nullable();
            $table->string('telefono',15)->nullable();
            $table->string('direccion',100)->nullable();
            $table->string('referencia',255)->nullable();
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
        Schema::dropIfExists('invitado_conciliacions');
    }
};
