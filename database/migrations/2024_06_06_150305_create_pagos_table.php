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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->decimal('monto', 8, 2);
            $table->timestamp('fecha_pago')->useCurrent();
            $table->string('metodo_pago');
            $table->boolean('confirmado')->default(false);
            $table->unsignedBigInteger('socio_id');
            $table->foreign('socio_id')->references('id')->on('socios')->onDelete('cascade');
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
        Schema::dropIfExists('pagos');
    }
};
