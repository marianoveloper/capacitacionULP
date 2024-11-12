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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_ini_inscripcion');
            $table->date('fecha_fin_inscripcion');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->dateTime('hora_inicio');
            $table->dateTime('hora_fin');
            $table->unsignedBigInteger('capacitacion_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('estado',['activo','pendiente','baja']);
            $table->foreign('capacitacion_id')->references('id')->on('capacitaciones')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
