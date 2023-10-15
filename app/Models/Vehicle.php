<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Vehicle extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function model(): BelongsTo
    {
        return $this->BelongsTo(Carmodel::class, 'carmodel_id');
    }

    public function travel(): HasMany
    {
        return $this->hasMany(Travel::class);
    }

    public function maintenance(): HasMany
    {
        return $this->hasMany(Maintenance::class);
    }

    public function driver(): BelongsToMany
    {
        return $this->belongsToMany(Driver::class, 'travels', 'vehicle_id', 'driver_id');
    }
}
