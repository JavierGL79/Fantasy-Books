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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique()->nullable(false);;
            $table->string('name')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->string('last_name_2')->nullable(); //opcional
            $table->string('email')->unique()->nullable(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('es_bibliotecario')->default(false)->nullable(false); // Campo para indicar si es un Bibliotecario
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
