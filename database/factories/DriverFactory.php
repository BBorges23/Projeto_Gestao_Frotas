<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Classe para a criação de instâncias da model 'Driver' usando o Factory do Eloquent.
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 */
class DriverFactory extends Factory
{
    /**
     * Define o estado padrão do modelo.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Gera valores aleatórios para ativo e trabalhando com uma probabilidade de 50%
        $isActive = $this->faker->boolean(50);
        $isWorking = $this->faker->boolean(50);

        // Se o motorista não estiver ativo, define 'is_working' como falso
        if (!$isActive){
            $isWorking = '0';
        }

        return [
            'nif'=>fake()->numerify('#########'),// Gera um NIF aleatório
            'phone'=>fake()->phoneNumber,// Gera um número de telefone aleatório
            'deleted_at'=> $isActive ? null : $this->faker->dateTimeThisDecade('-1 year'),// Define 'deleted_at' como nulo se o motorista estiver ativo, senão gera uma data de exclusão no último ano
            'is_working'=> $isWorking,// Define se o motorista está trabalhando com base no valor gerado aleatoriamente
            // Define o estado do motorista com base na ativação, se ativo e trabalhando, então 'EM TRABALHO', senão escolhe aleatoriamente entre ['BAIXA','FERIAS','DISPONIVEL'], se não ativo, então 'EX_COLABORADOR'
            'condition'=> $isActive ? ($isWorking ? 'EM TRABALHO': $this->faker->randomElement(['BAIXA','FERIAS','DISPONIVEL'])) : 'EX_COLABORADOR'
        ];
    }
}
