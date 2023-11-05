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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();

            //chave estrangeira para models
            $table->unsignedBigInteger('carmodel_id');
            $table->foreign('carmodel_id')->references('id')->on('carmodels');

            $table->string('licence_plate',8)->unique();
            $table->year('year');
            $table->date('date_buy');
            $table->softDeletes();
            $table->boolean('is_driving');
            $table->enum('condition', ['DISPONIVEL','VENDIDO', 'PERDA_TOTAL','EM VIAGEM',]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
