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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('nif', '9')->unique();
            $table->string('email',100)->unique();
            $table->string('phone',50);
            $table->boolean('is_active');
            $table->boolean('is_working');
            $table->enum('condition', ['EX_COLABORADOR', 'FERIAS', 'BAIXA', 'ATIVO']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver');
    }
};
