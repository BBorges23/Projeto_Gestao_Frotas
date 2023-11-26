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
        // Cria uma nova tabela chamada 'password_reset_tokens'
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); // Coluna de string para o email, configurada como chave primária
            $table->string('token');// Coluna de string para o token de redefinição de senha
            $table->timestamp('created_at')->nullable();// Coluna de timestamp para a data de criação do token (pode ser nula)
        });
    }

    /**
     * Reverte as migrações.
     */
    public function down(): void
    {
        // Exclui a tabela 'password_reset_tokens' se a migração for revertida
        Schema::dropIfExists('password_reset_tokens');
    }
};
