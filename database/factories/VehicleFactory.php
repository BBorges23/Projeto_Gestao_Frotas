<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Classe para a criação de instâncias da model 'Vehicle' usando o Factory do Eloquent.
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define o estado padrão do modelo.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Gera valores aleatórios para ativo e dirigindo com uma probabilidade de 50%
        $isActive = $this->faker->boolean(50);
        $isDriving = $this->faker->boolean(50);

        // Se o veículo não estiver ativo, define 'is_driving' como falso
        if (!$isActive){
            $isDriving = '0';
        }

        return [
            'carmodel_id'=>fake()->numberBetween(1,25),// Gera um ID de modelo de carro aleatório
            'licence_plate' => fake()->regexify('^[A-Z]{2}-\d{2}-[A-Z]{2}$'), // Gera uma placa de veículo aleatória no formato desejado
            'year'=>fake()->year,// Gera um ano de fabricação aleatório
            'date_buy'=>fake()->dateTime(now()),// Gera uma data de compra aleatória
            'deleted_at'=> $isActive ? null : $this->faker->dateTimeThisDecade('-1 year'),// Define 'deleted_at' como nulo se o veículo estiver ativo, senão gera uma data de exclusão no último ano
            'is_driving'=>$isDriving,// Define se o veículo está em movimento com base no valor gerado aleatoriamente
            // Define o estado do veículo com base na ativação, se ativo e dirigindo, então 'EM VIAGEM', senão 'DISPONIVEL', se não ativo, então escolhe aleatoriamente entre ['VENDIDO','PERDA_TOTAL']
            'condition'=> $isActive ? ($isDriving ? 'EM VIAGEM': 'DISPONIVEL'): $this->faker->randomElement(['VENDIDO','PERDA_TOTAL'])
        ];
    }
}
