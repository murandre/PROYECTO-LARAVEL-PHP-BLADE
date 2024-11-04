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
        Schema::create('rutinas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->string('dificultad');
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->unsignedBigInteger('entrenador_id');
            $table->foreign('entrenador_id')->references('id')->on('entrenadores')->onDelete('cascade');
            $table->timestamps(); // Añadir esta línea
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rutinas');
    }
};
