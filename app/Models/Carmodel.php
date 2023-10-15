<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Carmodel extends Model
{
    use HasFactory;

    protected $guarded = [];

    //protected $table='models';//car_models

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function vehicle(): HasMany
    {
        return $this->hasMany(Vehicle::class);
    }
}
