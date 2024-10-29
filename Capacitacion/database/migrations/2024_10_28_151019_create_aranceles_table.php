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
        Schema::create('aranceles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->decimal('precio', 8, 2);
            $table->boolean('estado')->default(1);
            $table->unsignedBigInteger('capacitacion_id');
            $table->foreign('capacitacion_id')->references('id')->on('capacitaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aranceles');
    }
};
