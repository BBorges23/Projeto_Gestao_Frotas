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
        // Cria uma nova tabela chamada 'maintenances' para armazenar informações sobre manutenções
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id(); // Coluna de chave primária autoincremental

            $table->unsignedBigInteger('vehicle_id');// Chave estrangeira para a associação com a tabela 'vehicles'
            $table->foreign('vehicle_id')->references('id')->on('vehicles');// Define a chave estrangeira referenciando a coluna 'id' na tabela 'vehicles'

            $table->string('motive',250);// Coluna de string para o motivo da manutenção, com comprimento máximo de 250 caracteres
            $table->date('date_entry');// Coluna para armazenar a data de entrada para a manutenção
            $table->date('date_exit');// Coluna para armazenar a data de saída da manutenção
            $table->softDeletes();// Adiciona suporte a exclusão suave, mantendo registros marcados como excluídos em vez de removê-los fisicamente
            $table->boolean('is_active')->default(false);// Coluna booleana indicando se a manutenção está ativa, com valor padrão definido como falso
            $table->enum('state', ['PROCESSANDO ', 'CONCLUIDO', 'CANCELADO']);// Coluna de enumeração para representar o estado geral da manutenção, com opções predefinidas
            $table->text('comments');// Coluna de texto para armazenar comentários ou observações sobre a manutenção
            $table->timestamps();// Colunas para armazenar timestamps de criação e atualização da manutenção
        });
    }

    /**
     * Reverte as migrações.
     */
    public function down(): void
    {
        // Exclui a tabela 'maintenances' se a migração for revertida
        Schema::dropIfExists('maintenance');
    }
};
