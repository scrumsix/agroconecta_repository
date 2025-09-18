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
    Schema::create('employees', function (Blueprint $table) {
        $table->id(); // Crea una columna ID auto-incremental
        $table->string('first_name');
        $table->string('last_name');
        $table->string('email')->unique();
        $table->string('job_title')->nullable(); // 'nullable' significa que puede estar vacío
        $table->decimal('salary', 8, 2)->nullable();
        $table->timestamps(); // Crea las columnas created_at y updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
