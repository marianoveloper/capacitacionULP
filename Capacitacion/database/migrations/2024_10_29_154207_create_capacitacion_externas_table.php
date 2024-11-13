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
        Schema::create('capacitacion_externas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capacitacion_externas');
    }
};