<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Vehicle extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];

    /**
     * Define o relacionamento entre o veículo (Vehicle) e o modelo do carro (CarModel).
     */
    public function model(): BelongsTo
    {
        return $this->BelongsTo(Carmodel::class, 'carmodel_id')->withTrashed();
    }

    /**
     * Define o relacionamento entre o veículo (Vehicle) e as viagens (Travels).
     */
    public function travel(): HasMany
    {
        return $this->hasMany(Travel::class);
    }

    /**
     * Define o relacionamento entre o veículo (Vehicle) e as manutenções (Maintenance).
     */
    public function maintenance(): HasMany
    {
        return $this->hasMany(Maintenance::class);
    }

    /**
     * Define o relacionamento entre o veículo (Vehicle) e os motoristas (Driver) associados através das viagens.
     */
    public function driver(): BelongsToMany
    {
        return $this->belongsToMany(Driver::class, 'travels', 'vehicle_id', 'driver_id');
    }

}
