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
          Schema::create('tickets', function (Blueprint $table) {
              $table->id();
              $table->string('nombre');
              $table->enum('tipo', [1, 2, 3]);
              $table->enum('transporte', ['aéreo', 'terrestre', 'marítimo']);
              $table->string('producto');
              $table->string('pais_origen');
              $table->string('pais_destino');
              $table->enum('estado', ['nuevo', 'en_progreso', 'completado'])->default('nuevo');
              $table->foreignId('user_id')->constrained()->onDelete('cascade');
              $table->timestamps();
          });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
