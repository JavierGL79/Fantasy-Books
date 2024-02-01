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
        Schema::create('table_libros', function (Blueprint $table) {
            $table->id();
            $table->string('autor')->nullable(false);
            $table->string('titulo')->nullable(false);
            $table->year('year')->nullable(false);
            $table->string('editorial')->nullable(false);
            $table->integer('stock')->nullable(false)->default(1);
            $table->text('foto')->nullable();
            $table->string('information')->nullable();
            //$table->unsignedBigInteger('prestamo_id')->nullable();
            //$table->foreign('prestamo_id')->references('ID_Prestamo')->on('prestamos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_libros');
    }
};
