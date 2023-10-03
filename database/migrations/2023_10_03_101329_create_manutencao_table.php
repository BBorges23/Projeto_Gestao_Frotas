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
        Schema::create('manutencao', function (Blueprint $table) {
            $table->id();
            $table->string('estado');
            $table->string('matricula',8);
            $table->string('motivo',150);
            $table->date('data_entrada');
            $table->date('data_saida');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manutencao');
    }
};
