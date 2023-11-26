<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Define uma nova migração usando uma classe anônima
return new class extends Migration
{
    /**
     * Executa as migrações.
     */
    public function up(): void
    {
        // Cria uma nova tabela chamada 'brands' para armazenar informações sobre marcas
        Schema::create('brands', function (Blueprint $table) {
            $table->id();// Coluna de chave primária autoincremental
            $table->string('name',50)->unique();// Coluna de string para o nome da marca, com restrição única e comprimento máximo de 50 caracteres
            $table->softDeletes();// Adiciona suporte a exclusão suave, mantendo registros marcados como excluídos em vez de removê-los fisicamente
            $table->timestamps();// Colunas para armazenar timestamps de criação e atualização da marca
        });
    }

    /**
     * Reverte as migrações.
     */
    public function down(): void
    {
        // Exclui a tabela 'brands' se a migração for revertida
        Schema::dropIfExists('brands');
    }
};
