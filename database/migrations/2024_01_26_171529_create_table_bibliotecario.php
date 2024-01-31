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
        Schema::create('table_bibliotecario', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('ID_Usuario')->constrained('usuarios'); // Referencia a la columna 'ID_Usuario' en la tabla 'usuarios'
            $table->boolean('es_bibliotecario')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_bibliotecario');
    }
};
