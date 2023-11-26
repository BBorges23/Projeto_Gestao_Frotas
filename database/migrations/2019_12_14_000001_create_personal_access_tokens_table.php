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
        // Cria uma nova tabela chamada 'personal_access_tokens' para armazenar tokens de acesso pessoal
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();// Coluna de chave primária autoincremental
            $table->morphs('tokenable');// Coluna polimórfica para identificar a entidade associada ao token
            $table->string('name');// Coluna de string para o nome do token
            $table->string('token', 64)->unique();// Coluna de string para o token de acesso, com restrição única
            $table->text('abilities')->nullable();// Coluna de texto para armazenar as habilidades (capacidades) do token, podendo ser nula
            $table->timestamp('last_used_at')->nullable();// Coluna de timestamp para armazenar a data e hora do último uso do token, podendo ser nula
            $table->timestamp('expires_at')->nullable();// Coluna de timestamp para armazenar a data e hora de expiração do token, podendo ser nula
            $table->timestamps();// Colunas para armazenar timestamps de criação e atualização do token
        });
    }

    /**
     * Reverte as migrações.
     */
    public function down(): void
    {
        // Exclui a tabela 'personal_access_tokens' se a migração for revertida
        Schema::dropIfExists('personal_access_tokens');
    }
};
