<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Ejecuta las migraciones.
     */
    public function up(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            // Aquí le decimos que cambie la columna 'salary'
            // para que acepte 10 dígitos en total y 2 decimales.
            $table->decimal('salary', 10, 2)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     * Revierte las migraciones.s
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            // Si necesitamos revertir, la devolvemos a su estado original (8, 2)
            $table->decimal('salary', 8, 2)->nullable()->change();
        });
    }
};