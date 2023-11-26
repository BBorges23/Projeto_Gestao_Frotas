<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Define uma nova migração usando uma classe anônimac
return new class extends Migration
{
    /**
     * Executa as migrações.
     */
    public function up(): void
    {
        // Cria uma nova tabela chamada 'carmodels' para armazenar informações sobre modelos de carros
        Schema::create('carmodels', function (Blueprint $table) {
            $table->id();// Coluna de chave primária autoincremental
            $table->string('name',50)->unique();// Coluna de string para o nome do modelo de carro, com restrição única e comprimento máximo de 50 caracteres
            $table->unsignedBigInteger('brand_id');// Coluna de chave estrangeira para a associação com a tabela 'brands'
            $table->foreign('brand_id')->references('id')->on('brands');// Define a chave estrangeira referenciando a coluna 'id' na tabela 'brands'
            $table->softDeletes();// Adiciona suporte a exclusão suave, mantendo registros marcados como excluídos em vez de removê-los fisicamente
            $table->timestamps();// Colunas para armazenar timestamps de criação e atualização do modelo de carro
        });
    }

    /**
     * Reverte as migrações.
     */
    public function down(): void
    {
        // Exclui a tabela 'carmodels' se a migração for revertida
        Schema::dropIfExists('carmodels');
    }
};
