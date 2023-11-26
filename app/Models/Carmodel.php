<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carmodel extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    //protected $table='models';//car_models

    /**
     * Define a relação entre o modelo de carro e sua marca associada.
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class)->withTrashed();
    }

    /**
     * Define a relação entre o modelo de carro e seus veículos associados.
     */
    public function vehicle(): HasMany
    {
        return $this->hasMany(Vehicle::class);
    }
}
