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
            $table->foreignId('user_id')->constrained('users'); // Referencia a la columna 'user_id' en la tabla 'users'
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
