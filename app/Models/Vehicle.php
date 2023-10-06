<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Vehicle extends Model
{
    use HasFactory;

//    public function driven_by(): BelongsTo {
//        return $this->BelongsTo(Driver::class);
//    }

    public function models(): HasOne
    {
        return $this->hasOne(CarModel::class);
    }

    public function travel(): HasMany
    {
        return $this->hasMany(Travel::class);
    }

    public function maintenance(): HasMany
    {
        return $this->hasMany(Maintenance::class);
    }
}
