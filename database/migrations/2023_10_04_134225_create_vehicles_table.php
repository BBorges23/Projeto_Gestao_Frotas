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
        // Cria uma nova tabela chamada 'vehicles' para armazenar informações sobre veículos
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();// Coluna de chave primária autoincremental

            // Chave estrangeira para a associação com a tabela 'carmodels'
            $table->unsignedBigInteger('carmodel_id');
            $table->foreign('carmodel_id')->references('id')->on('carmodels');

            $table->string('licence_plate',8)->unique(); // Coluna de string para a placa do veículo, com restrição única e comprimento de 8 caracteres
            $table->year('year');// Coluna para armazenar o ano de fabricação do veículo
            $table->date('date_buy'); // Coluna para armazenar a data de compra do veículo
            $table->softDeletes();// Adiciona suporte a exclusão suave, mantendo registros marcados como excluídos em vez de removê-los fisicamente
            $table->boolean('is_driving');// Coluna booleana indicando se o veículo está em movimento
            $table->enum('condition', ['DISPONIVEL','VENDIDO', 'PERDA_TOTAL','EM VIAGEM','EM MANUTENÇÃO']);// Coluna de enumeração para representar o estado atual do veículo, com opções predefinidas
            $table->timestamps();// Colunas para armazenar timestamps de criação e atualização do veículo
        });
    }

    /**
     * Reverte as migrações.
     */
    public function down(): void
    {
        // Exclui a tabela 'vehicles' se a migração for revertida
        Schema::dropIfExists('vehicles');
    }
};
