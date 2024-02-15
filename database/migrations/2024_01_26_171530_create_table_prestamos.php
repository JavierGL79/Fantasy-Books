<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Define el valor predeterminado para la fecha de devolución
        $defaultDueDate = now()->addDays(3)->toDateTimeString();

        Schema::create('table_prestamos', function (Blueprint $table) use ($defaultDueDate) {
            $table->id();
            $table->timestamp('fecha_prestamo')->nullable();
            $table->timestamp('fecha_devolucion')->nullable()->default($defaultDueDate);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('libro_id');
            $table->foreign('libro_id')->references('id')->on('table_libros');
            $table->boolean('devuelto')->default(true);
            $table->boolean('ampliado')->default(false);

            $table->timestamps();
            $table->index('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_prestamos');
    }
};
