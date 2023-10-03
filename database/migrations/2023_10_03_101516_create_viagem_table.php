<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('viagem', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('distancia');
            $table->string('ponto_origem',100);
            $table->string('ponto_destino',100);

            //chave estrangeira de motorista
            $table->foreignId('id_motorista')->constrained('motoristas');

            //chave estrangeira de veiculo
            $table->foreignId('id_viagem')->constrained('viagem');

            $table->double('tempo_medio_viagem');
            $table->boolean('activo');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viagem');
    }
};
