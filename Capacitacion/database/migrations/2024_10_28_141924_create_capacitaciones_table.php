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
        Schema::create('capacitaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->string('duracion', 100);
            $table->string('cupo', 100);
            $table->string('url_inscripcion');
            $table->enum ('modalidad', ['virtual', 'presencial', 'hibrido'])->default('virtual');
            $table->enum ('estado', ['activo', 'pendiente','baja'])->default('pendiente');
            $table->unsignedBigInteger('user_id');//USUARIO
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capacitaciones');
    }
};
