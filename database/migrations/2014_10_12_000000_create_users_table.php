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
        // Cria uma nova tabela chamada 'users'
        Schema::create('users', function (Blueprint $table) {
            $table->id(); //Chave primária autoincremental
            $table->string('name',100); //Coluna de string para o nome do utilizador com um comprimento máximo de 100 caracteres
            $table->string('email',100)->unique();  //Coluna de string para o email do utilizador com um comprimento máximo de 100 caracteres e restrição única
            $table->timestamp('email_verified_at')->nullable(); // Coluna de timestamp para verificação de email (pode ser nula)
            $table->string('password');// Coluna de string para a senha do utilizador
            $table->rememberToken(); // Coluna para o token de autenticação do utilizador
            $table->timestamps();// Timestamps para criado em e atualizado em
        });
    }

    /**
     * Reverte as migrações.
     */
    public function down(): void
    {
        // Exclui a tabela 'users' se a migração for revertida
        Schema::dropIfExists('users');
    }
};
