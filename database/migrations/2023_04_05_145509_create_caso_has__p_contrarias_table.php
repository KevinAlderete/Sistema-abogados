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
        Schema::create('caso_has__p_contrarias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_contraria')->constrained('parte_contrarias')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('id_caso')->constrained('casos')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caso_has__p_contrarias');
    }
};
