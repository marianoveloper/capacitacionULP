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
        Schema::create('meeting', function (Blueprint $table) {
            $table->id();
            $table->string('topic');//Tema de la reunion
            $table->text('descripcion')->nullable();
            $table->dateTime('start_time');//fecha y Hora de inicio
            $table->dateTime('end_time');//fecha y Hora de fin


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meeting');
    }
};
