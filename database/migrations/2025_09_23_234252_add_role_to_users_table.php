<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Ejecuta las migraciones para añadir la columna.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Añadimos la columna 'role' después de la columna 'email'.
            // Por defecto, todo nuevo usuario será un 'cliente'.
            $table->string('role')->after('email')->default('cliente');
        });
    }

    /**
     * Reverse the migrations.
     * Revierte las migraciones para eliminar la columna.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Esto elimina la columna 'role' si necesitas revertir la migración.
            $table->dropColumn('role');
        });
    }
};