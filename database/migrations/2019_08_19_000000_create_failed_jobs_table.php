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
        // Cria uma nova tabela chamada 'failed_jobs' para armazenar informações sobre jobs (trabalhos) que falharam durante o processamento
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();// Coluna de chave primária autoincremental
            $table->string('uuid')->unique();// Coluna de string para um identificador único (UUID)
            $table->text('connection');// Coluna de texto para armazenar a conexão usada pelo job
            $table->text('queue');// Coluna de texto para armazenar a fila à qual o job pertence
            $table->longText('payload');// Coluna de texto longo para armazenar os dados do job
            $table->longText('exception');// Coluna de texto longo para armazenar informações sobre a exceção ocorrida no job
            $table->timestamp('failed_at')->useCurrent();// Coluna de timestamp para armazenar a data e hora em que o job falhou (usando o valor atual)
        });
    }

    /**
     * Reverte as migrações.
     */
    public function down(): void
    {
        // Exclui a tabela 'failed_jobs' se a migração for revertida
        Schema::dropIfExists('failed_jobs');
    }
};
