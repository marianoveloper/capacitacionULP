<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'mysql_aulas'; // Usar la base de datos de capacitaciones
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('aulas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('capacidad');
            $table->unsignedBigInteger('edificio_id');
            $table->foreign('edificio_id')->references('id')->on('edificios');
            $table->unsignedBigInteger('equipamiento_id')->references('id')->on('equipamientos');
            $table->enum('estado', ['activo', 'baja'])->default('activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aulas');
    }
};
