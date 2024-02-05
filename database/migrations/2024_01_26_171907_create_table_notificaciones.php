<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('table_notificaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users'); //Clave foránea para el usuasrio destino
            $table->foreignId('prestamo_id')->nullable()->constrained('table_prestamos'); //Clave foránea para el préstamo
            $table->timestamp('fecha_envio')->nullable(); // Fecha de envío
            $table->text('mensaje'); // Mensaje de la notificación
            $table->boolean('error_envio')->boolean(false); // Indicador de error al enviar
            $table->text('mensaje_error')->nullable(); // Mensaje de error en caso de falla
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_notificaciones');
    }
};
