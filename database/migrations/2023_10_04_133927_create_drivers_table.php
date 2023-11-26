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
        // Cria uma nova tabela chamada 'drivers' para armazenar informações sobre motoristas
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();// Coluna de chave primária autoincremental
            $table->unsignedBigInteger('user_id');// Coluna de chave estrangeira para a associação com a tabela 'users'
            $table->foreign('user_id')->references('id')->on('users');// Define a chave estrangeira referenciando a coluna 'id' na tabela 'users'
            $table->string('nif', '9')->unique();// Coluna de string para o NIF (Número de Identificação Fiscal) do motorista, com restrição única e comprimento de 9 caracteres
            $table->string('phone',50);// Coluna de string para o número de telefone do motorista, com comprimento máximo de 50 caracteres
            $table->boolean('is_working')->default(true);// Coluna booleana indicando se o motorista está atualmente trabalhando, com valor padrão definido como verdadeiro
            $table->enum('condition', ['DISPONIVEL', 'EX_COLABORADOR', 'FERIAS', 'BAIXA','EM TRABALHO']);// Coluna de enumeração para representar o estado atual do motorista, com opções predefinidas
            $table->softDeletes();// Adiciona suporte a exclusão suave, mantendo registros marcados como excluídos em vez de removê-los fisicamente
            $table->timestamps();// Colunas para armazenar timestamps de criação e atualização do registro do motorista
        });
    }

    /**
     * Reverte as migrações.
     */
    public function down(): void
    {
        // Exclui a tabela 'drivers' se a migração for revertida
        Schema::dropIfExists('driver');
    }
};
