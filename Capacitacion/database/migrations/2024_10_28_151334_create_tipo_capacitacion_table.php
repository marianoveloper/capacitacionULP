<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'mysql_capacitaciones'; // Usar la base de datos de capacitaciones
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tipo_capacitacion', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo',['interna','cerrada','publica']);
            $table->enmu('organizacionTipo',['propia','externa']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_capacitacion');
    }
};
