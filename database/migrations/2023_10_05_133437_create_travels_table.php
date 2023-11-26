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
        // Cria uma nova tabela chamada 'travels' para armazenar informações sobre viagens
        Schema::create('travels', function (Blueprint $table) {
            $table->id();// Coluna de chave primária autoincremental
            $table->unsignedBigInteger('vehicle_id');// Chave estrangeira para a associação com a tabela 'vehicles'
            $table->foreign('vehicle_id')->references('id')->on('vehicles');// Define a chave estrangeira referenciando a coluna 'id' na tabela 'vehicles'
            $table->unsignedBigInteger('driver_id');// Chave estrangeira para a associação com a tabela 'drivers'
            $table->foreign('driver_id')->references('id')->on('drivers');// Define a chave estrangeira referenciando a coluna 'id' na tabela 'drivers'
            $table->string('coords_origem', '50');// Coluna de string para coordenadas de origem da viagem, com comprimento máximo de 50 caracteres
            $table->string('coords_destino', '50');// Coluna de string para coordenadas de destino da viagem, com comprimento máximo de 50 caracteres
            $table->date('date_start');// Coluna para armazenar a data de início da viagem
            $table->date('date_end');// Coluna para armazenar a data de término da viagem
            $table->softDeletes(); // Adiciona suporte a exclusão suave, mantendo registros marcados como excluídos em vez de removê-los fisicamente
            $table->boolean('is_traveling')->default(false);// Coluna booleana indicando se a viagem está em andamento, com valor padrão definido como falso
            $table->enum('state', ['PROCESSANDO', 'CANCELADO', 'CONCLUIDO']);// Coluna de enumeração para representar o estado geral da viagem, com opções predefinidas
            $table->enum('driver_state', ['POR ACEITAR','ACEITE','PROBLEMAS','CONCLUIDO'] ); // Coluna de enumeração para representar o estado do motorista em relação à viagem, com opções predefinidas
            $table->text('comments');// Coluna de texto para armazenar comentários ou observações sobre a viagem
            $table->timestamps();// Colunas para armazenar timestamps de criação e atualização da viagem
        });
    }

    /**
     * Reverte as migrações.
     */
    public function down(): void
    {
        // Exclui a tabela 'travels' se a migração for revertida
        Schema::dropIfExists('travel');
    }
};
